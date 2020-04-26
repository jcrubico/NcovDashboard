<?php
/**
 * DashboardController.php
 * @author Jhonn Carlo Valderama Rubico
 * @created 04.12.2020
 * @version 1.0
 */
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\DashboardService;

class DashboardController extends Controller
{
    /**
     * DashboardService instance
     * @var DashboardService $oDashboardService
     */
    private $oDashboardService;

    /**
     * DashboardController dashboard.
     */
    public function __construct()
    {
        $this->oDashboardService = new DashboardService();
    }

    /**
     * Get all countries
     * @return object
     */
    public function getCountryList() : object
    {
        $aResponse = $this->oDashboardService->getAllCountries();
        return response()->json($aResponse);
    }

    /**
     * Get data per country
     * @param Request $oRequest
     * @return object
     */
    public function getCountryCases(Request $oRequest) : object
    {
        $aParams = array(
            'country_no' => $oRequest->get('country_no')
        );
        $aResponse = $this->oDashboardService->getPerCountryCases($aParams);
        return response()->json($aResponse);
    }

    /**
     * Get total data per country
     * @param Request $oRequest
     * @return object
     */
    public function getCountryTotalCases(Request $oRequest) : object
    {
        $aParams = array(
            'country_no' => $oRequest->get('country_no')
        );
        $aResponse = $this->oDashboardService->getPerCountryTotalCases($aParams);
        return response()->json($aResponse);
    }

    /**
     * Covid 19 index page.
     * @return object
     */
    public function index() : object
    {
        return view('dashboard.index');
    }
}
