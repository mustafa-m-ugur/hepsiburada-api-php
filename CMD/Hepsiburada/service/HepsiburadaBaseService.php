<?php

namespace CMD\Hepsiburada\service;

use GuzzleHttp\Client;
use CMD\Hepsiburada\config\Endpoints;
use CMD\Hepsiburada\config\Credentials;
use GuzzleHttp\Exception\RequestException;
use CMD\Hepsiburada\models\basemodels\HepsiburadaBaseResponseModel;
use Exception;

class HepsiburadaBaseService
{
    protected $client;
    protected $isTestStage;
    protected $credentials;
    protected $this_base_url;

    public function __construct($isTestStage, Credentials $credentials)
    {
        $this->credentials = $credentials;
        $this->isTestStage = $isTestStage;
        $base_url = $isTestStage ? Endpoints::test_base_url : Endpoints::prod_base_url;
        $this->this_base_url = $isTestStage ? Endpoints::test_base_url : Endpoints::prod_base_url;
        $header = $this->getHeader($base_url);
        $this->client = new Client($header);
    }

    /**
     * generating url
     * @return string
     */
    public function getUrl($subdomain, $endpoint, $queryString = null)
    {
        $url = "https://{$subdomain}.{$this->this_base_url}{$endpoint}";
        return $queryString != null ? $url . "?" . $queryString : $url;
    }

    public function replaceParameters($param4replace, $url)
    {
        foreach ($param4replace as $key => $value) {
            $url = str_replace($key, $value, $url);
        }
        return $url;
    }

    /**
     * generating url without supplier id
     * @return string
     */
    public function getUrlWithoutSuppliers($endpoint)
    {
        return "https://$endpoint";
    }

    protected function getHeader($base_url)
    {
        return [
            'base_uri' => $base_url,
            'headers' => [
                "Authorization" => 'Basic ' . base64_encode($this->credentials->username . ":" . $this->credentials->password),
                "User-Agent" => $this->credentials->username . " - " . "SelfIntegration",
                "Content-Type" => "application/json",
                "Accept" => "application/json"
            ]
        ];
    }

    public function request($method, $uri = '', array $options = [])
    {
        $baseresponse = new HepsiburadaBaseResponseModel();
        $_response = null;
        try {
            $_response = $this->client->request($method, $uri, $options);
            $baseresponse->status = true;
            $baseresponse->statusCode = $_response->getStatusCode();
            $baseresponse->response = \json_decode($_response->getBody()->getContents());
        } catch (RequestException $e) {
            $baseresponse->status = false;
            $baseresponse->statusCode = $e->getCode();
            $baseresponse->errorMessage = $e->getMessage();
            if ($e->hasResponse()) {
                $baseresponse->response = $e->getResponse()->getBody();
            }

        } finally {
            ///GuzzleHttp\Client
            $baseresponse->client = $this->client;
        }
        return $baseresponse;
    }

    protected function generateQueryString($unknownmodel)
    {
        $querystringParameters = [];
        foreach ($unknownmodel as $key => $value) {
            if ($value != null) {
                $querystringParameters[$key] = $value;
            }
        }
        return '?' . http_build_query($querystringParameters);
    }

}
