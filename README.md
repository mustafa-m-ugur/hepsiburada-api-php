# hepsiburada-api-php

Hepsiburada PHP Entegrasyonu

### License

- See [ChangeLog](https://github.com/mustafa-m-ugur/hepsiburada-api-php/blob/main/LICENSE)

## Setup

```php
composer require mustafa-m-ugur/hepsiburada-api-php
```

## Client

```php
use CMD\Hepsiburada\Hepsiburada;

$isTeststage = true;
$hepsiburada  = new Hepsiburada('xxxxxxxx','xxxxxxx','xxxxxx',$isTestStage);
```

## Listing & Product

```php

use CMD\Hepsiburada\Hepsiburada;

$isTeststage = true;
$hepsiburada  = new Hepsiburada('xxxxxxxx','xxxxxxx','xxxxxx',$isTestStage);

/**
 *
 * @description Satıcı Listing Bilgilerini Çekme.
 *
 */

$getParams = new BaseGetRequestModel();
$getParams->offset=3;
$getParams->limit=10;
$hepsiburada->listing->getList($getParams);



/**
 *
 * @description Listing Bilgilerini Güncelleme.
 *
 */

$listing = new UpdateListingRequestModel();
$listing->MerchantSku="BUTIK429-368";
$listing->HepsiburadaSku="HBV000004Q1JJ";
$listing->ProductName="Lorem Ipsum DM1101";
$listing->Price=288.97;
$listing->AvailableStock=9;
$listing->DispatchTime=3;
$listing->MaximumPurchasableQuantity=0;
$listing->CargoCompany1="x cargo";
$listing->CargoCompany2="y cargo";
$listing->CargoCompany3="z cargo";

$listOfListings[] =$listing;

$listing2  = new UpdateListingRequestModel();
$listing2->MerchantSku="loremipsum";
$listing2->HepsiburadaSku="HBV000006IY7A";
$listing2->ProductName="Lorem Ipsum DM1101";
$listing2->Price=288.97;
$listing2->AvailableStock=9;
$listing2->DispatchTime=3;
$listing2->MaximumPurchasableQuantity=0;
$listing2->CargoCompany1="x cargo";
$listing2->CargoCompany2="y cargo";
$listing2->CargoCompany3="z cargo";

$listOfListings[] =$listing;

$hepsiburada->listing->updateListing($listOfListings);


/**
 *
 * @description Güncelleme işleminin gerçekleşip gerçekleşmediğini kontrol etme.
 *
 */

$uploadAttemptId="16fd99f5-5bb3-43a5-8658-8cbb8b8ef5b2";
$hepsiburada->listing->checkUpdateAttempt($uploadAttemptId);


/**
 *
 * @description Listing silme.
 *
 */


$hepsiburadaSku="16fd99f5-5bb3-43a5-8658-8cbb8b8ef5b2";
$merchantSku="16fd99f5-5bb3-43a5-8658-8cbb8b8ef5b2";
$hepsiburada->listing->deleteListing($hepsiburadaSku,$merchantSku);


/**
 *
 * @description Listing Aktif/Deaktif etme.
 *
 */

$hepsiburadaSku="16fd99f5-5bb3-43a5-8658-8cbb8b8ef5b2";
$hepsiburada->listing->activeListing($hepsiburadaSku);
$hepsiburada->listing->deactiveListing($hepsiburadaSku);

/**
 *
 * @description Ürün Oluşturma.
 *
 */

$productList = [];
$product1 = new HepsiburadaProductModel();
$product1->categoryId = 18021982;
$product1->merchant = Credentials::merchantId;
$product1attributes = new Attributes();
$product1attributes->Barcode= "1234567891234";
$product1attributes->GarantiSuresi= 24;
$product1attributes->Image1= "https://productimages.hepsiburada.net/s/27/552/10194862145586.jpg";
$product1attributes->Image2= "https://productimages.hepsiburada.net/s/27/552/10194862145586.jpg";
$product1attributes->Image3= "https://productimages.hepsiburada.net/s/27/552/10194862145586.jpg";
$product1attributes->Image4= "https://productimages.hepsiburada.net/s/27/552/10194862145586.jpg";
$product1attributes->Image5= "https://productimages.hepsiburada.net/s/27/552/10194862145586.jpg";
$product1attributes->Marka= "Nike";
$product1attributes->UrunAciklamasi="Duis enim duis magna ex veniam elit id Lorem cillum minim nisi id aliquip. Laboris magna id est et deserunt adipisicing tempor eu ea officia ipsum deserunt. Irure occaecat sit aliquip elit ipsum sint dolore quis est amet aute pariatur cupidatat fugiat. Cillum pariatur pariatur occaecat sint. Aliqua qui in exercitation nulla aliquip id ipsum aliquip ad ut exce";
$product1attributes->UrunAdi= "Roth Tyler";
$product1attributes->VaryantGroupID= "Hepsiburada0";
$product1attributes->ebatlar_variant_property= "Büyük Ebat";
$product1attributes->kg= "1";
$product1attributes->merchantSku= "SAMPLE-SKU-INT-0";
$product1attributes->renk_variant_property= "Siyah";
$product1attributes->tax_vat_rate= "5";

$product1->attributes  =$product1attributes;

$productList[]=$product1;

$hepsiburada->product->createProduct($productList);


/**
 *
 * @description Ürün bilgisinin gönderilip gönderilmediğini kontrol etme.
 *
 */

$baseGet = new BaseGetRequestModel();
$baseGet->page=0;
$baseGet->size=100;
$hepsiburada->product->checkProductsAreCreated($baseGet);


/**
 *
 * @description Ürün Durumunu Sorgulama.
 *
 */

$requestStatusList = [
        new ProdoductStatusesRequestModel(
            "00d0e72c-9b77-43e8-a795-4e51c6abe1a9",
            [
            "TEST21"  ,"SONTEST"
            ]
            ),
        new ProdoductStatusesRequestModel(
            "ac2a8cdd-5608-433e-8922-14c8a3db9de3",
            [
                "CAN-SKU-1"
            ]
        )
    ];
    $hepsiburada->product->checkProductStatus($requestStatusList);


/**
 *
 * @description Statü bazlı ürün bilgisi gönderme.
 *
 */

    $request = new GetProductInfoViaStatusRequestModel();
    $request->merchantId=Credentials::merchantId;
    $request->taskStatus=false;
    $request->productStatus=ProductStatus::WAITING;
    $hepsiburada->product->getProductInfoViaStatus($request);



```

## Category

```php

use CMD\Hepsiburada\Hepsiburada;

$isTeststage = true;
$hepsiburada  = new Hepsiburada('xxxxxxxx','xxxxxxx','xxxxxx',$isTestStage);

/**
 *
 * @description Tüm Kategori Bilgilerini getirme.
 *
 */

    $getAllCategoryRequest = new GetAllCategoryRequestmodel();
    $getAllCategoryRequest->leaf = true;
    $getAllCategoryRequest->status = CategoryStatus::active;
    $getAllCategoryRequest->available =true;
    $getAllCategoryRequest->page=0;
    $getAllCategoryRequest->size =500;
    $hepsiburada->category->getAllCategories($getAllCategoryRequest);

/**
 *
 * @description Kategori Özelliklerini getirme.
 *
 */

    $categoryID = "123456";
    $hepsiburada->category->getCategoryAttributes($categoryID);

/**
 *
 * @description Kategori Özellik değerlerini getirme.
 *
 */

$categoryID = "123456";
$hepsiburada->category->getCategoryAttributes($categoryID);

```

## Order

```php
use CMD\Hepsiburada\Hepsiburada;

$isTeststage = true;
$hepsiburada  = new Hepsiburada('xxxxxxxx','xxxxxxx','xxxxxx',$isTestStage);

/**
 *
 * @description Sipariş Bilgilerini Çekme.
 *
 */

$getParams = new BaseGetRequestModel();
$getParams->offset=3;
$getParams->limit=10;
$getParams->beginDate=date("Y-m-d H:i", strtotime("-5 day"));
$getParams->endDate=date("Y-m-d H:i");
$hepsiburada->order->getOrderList($getParams);



/**
 *
 * @description Sipariş için değişiklik yapılabilecek kargo firmalarını listeleme.
 *
 */

$orderlineid="123456789";
$hepsiburada->order->getOrderChangeableCargoCompanies($orderlineid);


/**
 *
 * @description Sipariş kargo firmasını değiştirme.
 *
 */

$cargoCompanyShortCode ="PK";
$hepsiburada->order->changeOrderCargoCompany($orderlineid,$cargoCompanyShortCode);


/**
 *
 * @description Paket için değişiklik yapılabilecek kargo firmalarını listele.
 *
 */

$packageNumber="123456789";
$hepsiburada->order->getPackageChangeableCargoList($packageNumber);



/**
 *
 * @description Paket Kargo firması değiştirme.
 *
 */

$packageNumber="123456789";
$cargoCompanyShortCode ="PK";
$hepsiburada->order->changePackageCargoCompany($packageNumber,$cargoCompanyShortCode);

/**
 *
 * @description Aynı pakete konabillecek ürünleri listele.
 *
 */
 
    $lineitemid="123456789";
    $hepsiburada->order->getPackageableWith($lineitemid);
    
 /**
 *
 * @description Kalemleri paketleme.
 *
 */
 
$packageRequest  = new PackageItemsRequestModel();
$packageRequest->parcelQuantity=2;
$packageRequest->deci=10;
$packageRequest->lineItemRequests = [
    new PackageLine("471e7231-f9b5-460b-9a56-983ef737b3e0","1"),
    new PackageLine("b0a5eec2-acb7-4162-8e60-a28d56e5a314","1"),
];
$hepsiburada->order->packageItems($packageRequest);
 
 
 /**
 *
 * @description Paket Bozma.
 *
 */
 
$packageNumber="123456";
$hepsiburada->order->unpackageItems($packageNumber);
 
 
 /**
 *
 * @description Bozulmuş paketleri listeleme.
 *
 */
 
 $getParams = new BaseGetRequestModel();
$getParams->offset=10;
$getParams->limit=10;
$getParams->beginDate=date("Y-m-d H:i", strtotime("-5 day"));
$getParams->endDate=date("Y-m-d H:i");

$hepsiburada->order->packageList($getParams);
 
 
 /**
 *
 * @description Paket bilgilerini listeleme.
 *
 */
 
 $orderNumber="123456";
$hepsiburada->order->getOrderDetail($orderNumber);
 
 
 /**
 *
 * @description Paket kargo bilgilerini getirme.
 *
 */
 
$packageNumber="123456";
$hepsiburada->order->getPackageCargoCompany($packageNumber);
 
 /**
 *
 * @description Sipariş bilgilerini getirme.
 *
 */
 
$orderNumber="123456";
$hepsiburada->order->getOrderDetail($orderNumber);
 
 
 /**
 *
 * @description Sipariş Kampanya bilgilerini getirme.
 *
 */
 
$orderNumber="123456";
$hepsiburada->order->getCamping($orderNumber);
 
 /**
 *
 * @description Fatura link gönderme.
 *
 */
 
$packageNumber="123456";
$invoiceLink = "https://youwebsite.pdf";
$hepsiburada->order->sendInvoice($packageNumber,$invoiceLink);
 
 /**
 *
 * @description Hepsiburada Kargo etiketi oluşturma.
 *
 */
 
$packageNumber="123456";
$hepsiburada->order->getHepsiburadaCargoLabel($packageNumber,HepsiburadaLabelType::Base64zpl);
 
 
 /**
 *
 * @description Kalem iptal bilgisi gönderme.
 * her bir iptal işlemi para cezasına tabidir.
 *
 */
 
$packageNumber="123456";
$hepsiburada->order->cancelOrderItem($packageNumber,CancelReason::OUT_OF_STOCK);
 
 /**
 *
 * @description Teslim edildi bilgisi gönder.
 *
 */
 
$packageNumber="123456";
$request = new SendDeliveryStatusRequestModel();
$request->receivedDate ="2020-05-10T11:30:30.230Z";
$request->receivedBy="John Doe";
$request->digitalCodes=["xyz123", "t468", "8513", "zyxdfg"];
$hepsiburada->order->sendDeliveredStatus($packageNumber,$request);
 

```



