<?php
namespace CMD\Hepsiburada\models\requestmodels\order;

class PackageItemsRequestModel
{
      /**
       * parcelQuantity
       *
       * @var integer
       */
      public $parcelQuantity;
      /**
       * deci
       *
       * @var integer
       */
      public $deci;
      /**
       * lineItemRequests
       *
       * @var array of  CMD\Hepsiburada\models\requestmodels\order\PackageLine
       */
      public $lineItemRequests;
}
