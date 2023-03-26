<?php
namespace CMD\Hepsiburada\models\requestmodels\finance;

use CMD\Hepsiburada\models\requestmodels\BaseGetRequestModel;

class  GetInvoiceRequestModel extends BaseGetRequestModel
{
    /**
     * transactiontypes
     *
     * @var string combined with CMD\Hepsiburada\models\basemodels\HepsiburadaTypes\InvoiveTransactionType
     * seperated with , For eg. transactiontypes=Commission,Retur
     */
    public $transactiontypes;
    /**
     * allowance
     *
     * @var string  CMD\Hepsiburada\models\basemodels\HepsiburadaTypes\InvoiceAllowance;
     */
    public $allowance;
}
