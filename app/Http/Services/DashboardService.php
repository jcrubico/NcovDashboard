<?php
/**
 * DashboardService.php
 * @author Jhonn Carlo Valderama Rubico
 * @created 04.25.2020
 * @version 1.0
 */
namespace App\Http\Services;

use App\Http\Library\RedisLibrary;

class DashboardService
{
    /**
     * GuzzleLibrary instance
     * @var GuzzleLibrary $oGuzzle
     */
    private $aData;

    /**
     * DashboardService dashboard.
     */
    public function __construct()
    {
        $aGetCache = RedisLibrary::get('covid.data');
        $this->aData = $aGetCache;
        if (empty($aGetCache) === true) {
            $this->aData = file_get_contents(env('COVID_API_LINK'));
            RedisLibrary::set('covid.data', $this->aData, true);
        }
    }

    /**
     * Get all covid data from the API.
     * @return array
     */
    public function getAllCountries() : array
    {
        $aData = json_decode($this->aData, true);
        $aKeys = array_keys($aData);
        $aResult = [];
        foreach ($aKeys as $iKey => $sValue) {
            $sEncodedData = base64_encode(serialize($iKey));
            $aResult[] = array('id' => $sEncodedData, 'text' => $sValue);
        }
        $sWorld = '*World*';
        array_unshift($aResult, array('id' => base64_encode(serialize($sWorld)), 'text' => $sWorld));
        return $aResult;
    }

    /**
     * Get country per total case
     * @param array $aParams
     * @return array
     */
    public function getPerCountryTotalCases(array $aParams) : array
    {
        $aResult = $this->getPerCountryCases($aParams);
        if (isset($aResult['code']) === true) {
            return $aResult;
        }
        $aReturn = array();
        $aEndData = end($aResult);
        $aReturn['total_confirmed'] = $aEndData['confirmed'];
        $aReturn['total_deaths'] = $aEndData['deaths'];
        $aReturn['total_recovered'] = $aEndData['recovered'];
        $aReturn['total_active'] = $aReturn['total_confirmed'] - ($aReturn['total_recovered'] + $aReturn['total_deaths']);
        return $aReturn;
    }


    /**
     * Get country per case
     * @param array $aParams
     * @return array
     */
    public function getPerCountryCases(array $aParams) : array
    {
        $aValidate = $this->validateCountryNo($aParams);
        if (isset($aValidate['code']) === true) {
            return $aValidate;
        }
        $aJsonDecoded = json_decode($this->aData, true);
        $sParamCountryNo = $aParams['country_no'];
        if ($sParamCountryNo === 'czo3OiIqV29ybGQqIjs=' || empty($sParamCountryNo) === true) {
            return $this->getWorldCases($aJsonDecoded);
        }
        foreach ($aJsonDecoded[$aValidate['text']] as $iKey => $aValue) {
            $aJsonDecoded[$aValidate['text']][$iKey]['date'] = date('F d, Y', strtotime($aValue['date']));
            $aJsonDecoded[$aValidate['text']][$iKey]['active_cases'] = $aValue['confirmed'] - ($aValue['recovered'] + $aValue['deaths']);
        }
        return $aJsonDecoded[$aValidate['text']];
    }

    /**
     * Get world cases
     * @param array $aParams
     * @return array
     */
    private function getWorldCases(array $aParams) : array
    {
        $aResult = array();
        foreach ($aParams as $sKey => $aValue) {
            foreach ($aValue as $iKeySub => $aValueSub) {
                @$aResult[$iKeySub]['date'] = date('F d, Y', strtotime($aValueSub['date']));
                @$aResult[$iKeySub]['confirmed'] += $aValueSub['confirmed'];
                @$aResult[$iKeySub]['deaths'] += $aValueSub['deaths'];
                @$aResult[$iKeySub]['recovered'] += $aValueSub['recovered'];
                @$aResult[$iKeySub]['active_cases'] += $aValueSub['confirmed'] - ($aValueSub['recovered'] + $aValueSub['deaths']);
            }
        }
        return $aResult;
    }

    /**
     * Validate the country number
     * @param array $aParams
     * @return array
     */
    private function validateCountryNo(array $aParams) : array
    {
        $sCountryNo = $aParams['country_no'];
        $aCountryList = $this->getAllCountries();
        if (empty($sCountryNo) === true) {
            return $aCountryList;
        }
        foreach ($aCountryList as $iKey => $aValue) {
            if ($sCountryNo === $aValue['id']) {
                return $aValue;
            }
        }
        return array(
            'msg'  => sprintf('The country_no you\'ve entered is invalid. Please check the parameter.'),
            'code' => 401
        );
    }
}
