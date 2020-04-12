<?php
/**
 * GuzzleLibrary.php
 * @author Jhonn Carlo Valderama Rubico
 * @created 12.28.2019
 * @version 1.0
 */
namespace App\Http\Library;

use GuzzleHttp\Client;

class GuzzleLibrary
{
    /**
     * Guzzle instance.
     * @var GuzzleHttp\Client $oGuzzleInstance
     */ 
    private $oGuzzleInstance;

    /**
     * HTTP method.
     * @var string $sHTTPMethod
     */
    private $sHTTPMethod;

    /** 
     * API endpoint.
     * @param string $sEndPoint
     */
    private $sEndpoint;

    /** 
     * Form fields.
     * @param array $aSubmitFields
     */
    private $aSubmitFields;

    /**
     * Set the base uri and instance of guzzle client.
     * @param string $sBaseUri
     * @param double $dTimeout
     */
    public function __construct($sBaseUri, $dTimeout)
    {
        $this->oGuzzleInstance = new Client([
            'base_uri' => $sBaseUri,
            'timeout'  => $dTimeout
        ]);
    }

    /**
     * Set the HTTP method and endpoint
     * @param string $sHTTPMethod
     * @param string $sEndpoint
     * @param array $aSubmitFields
     */
    public function setInformationRequest($sHTTPMethod, $sEndpoint, $aSubmitFields = array())
    {
        $this->sHTTPMethod = $sHTTPMethod;
        $this->sEndpoint = $sEndpoint;
        $this->aSubmitFields = $aSubmitFields;
    }

    /**
     * Send request to the api.
     * @return object
     */
    public function sendRequest()
    {
        $aHasPostFields = ['POST', "PUT", "DELETE"];
        if (in_array($this->sHTTPMethod, $aHasPostFields) === true) {
            return $this->oGuzzleInstance->request($this->sHTTPMethod, $this->sEndpoint, $this->aSubmitFields);
        }
        return $this->oGuzzleInstance->request($this->sHTTPMethod, $this->sEndpoint);
    }
}
