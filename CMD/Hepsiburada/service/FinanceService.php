<?php
namespace CMD\Hepsiburada\service;

use CMD\Hepsiburada\config\Credentials;
use CMD\Hepsiburada\config\Endpoints;
use CMD\Hepsiburada\models\requestmodels\finance\GetInvoiceRequestModel;

class FinanceService extends HepsiburadaBaseService
{
     /**
      * getInvoice
      *
      * @param  GetInvoiceRequestModel $getInvoiceRequest
      * @return HepsiburadaBaseResponseModel
      */
     public function getInvoice(GetInvoiceRequestModel $getInvoiceRequest)
     {
        $queryString = $this->generateQueryString($getInvoiceRequest);
        $url = $this->getUrl(Endpoints::finance,Endpoints::getInvoice,$queryString);
        $url = $this->replaceParameters(["@merchantid"=>$this->credentials->merchantId],$url);
        return $this->request("GET",$url);
     }
}
