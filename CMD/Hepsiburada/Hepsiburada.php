<?php

namespace CMD\Hepsiburada;

use CMD\Hepsiburada\service\OrderService;
use CMD\Hepsiburada\service\ListingService;
use CMD\Hepsiburada\service\ProductService;
use CMD\Hepsiburada\service\CategoryService;
use CMD\Hepsiburada\service\ReturnService;
use CMD\Hepsiburada\service\FinanceService;
use CMD\Hepsiburada\config\Credentials;

class Hepsiburada
{
    public $category;
    public $product;
    public $listing;
    public $order;
    public $return;
    public $finance;
    public $username;
    public $password;
    public $merchantId;
    public $isTestStage;

    public function __construct($username, $password, $merchantId, $isTestStage = true)
    {
        $credentials = new Credentials();
        $credentials->username = $username;
        $credentials->password = $password;
        $credentials->merchantId = $merchantId;
        $this->category = new CategoryService($isTestStage, $credentials);
        $this->product = new ProductService($isTestStage, $credentials);
        $this->order = new OrderService($isTestStage, $credentials);
        $this->listing = new ListingService($isTestStage, $credentials);
        $this->return = new ReturnService($isTestStage, $credentials);
        $this->finance = new FinanceService($isTestStage, $credentials);
    }

}
