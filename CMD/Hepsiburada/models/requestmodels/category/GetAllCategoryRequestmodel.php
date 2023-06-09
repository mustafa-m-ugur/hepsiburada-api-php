<?php

namespace CMD\Hepsiburada\models\requestmodels\category;

use CMD\Hepsiburada\models\requestmodels\BaseGetRequestModel;

class GetAllCategoryRequestmodel extends BaseGetRequestModel
{
    /**
     * categoryId
     *
     * @var integer
     */
    public $categoryId;
    /**
     * name
     *
     * @var string
     */
    public $name;
    /**
     * parentCategoryId
     *
     * @var integer
     */
    public $parentCategoryId;
    /**
     * paths
     *
     * @var string
     */
    public $paths;
    /**
     * leaf
     *
     * @var boolean bu kategoride ürün açılıp açılamayacağı
     */
    public $leaf;
    /**
     * status
     *
     * @var string
     */
    public $status;
    /**
     * available
     *
     * @var boolean
     */
    public $available;

}
