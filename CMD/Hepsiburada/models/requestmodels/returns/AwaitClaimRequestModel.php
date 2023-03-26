<?php
namespace CMD\Hepsiburada\models\requestmodels\returns;

class AwaitClaimRequestModel
{
    /**
     * claimNumber
     *
     * @var string
     */
    public $claimNumber;
    /**
     * type
     *
     * @var string
     */
    public $type;
    /**
     * quantity
     *
     * @var integer
     */
    public $quantity;
    /**
     * status
     *
     * @var string
     */
    public $status;
    /**
     * customerId
     *
     * @var string
     */
    public $customerId;
    /**
     * customerName
     *
     * @var string
     */
    public $customerName;
    /**
     * orderNumber
     *
     * @var string
     */
    public $orderNumber;
    /**
     * explanation
     *
     * @var string
     */
    public $explanation;
    /**
     * claimDate
     *
     * @var string format 2020-08-26T08:49:21.684Z
     */
    public $claimDate;
    /**
     * orderDate format 2020-08-26T08:49:21.684Z
     *
     * @var string
     */
    public $orderDate;
    /**
     * line
     *
     * @var Line CMD\Hepsiburada\models\basemodels\returns\Line
     */
    public $line;
    /**
     * reports
     *
     * @var array of Reports
     */
    public $reports;
    /**
     * delivery
     *
     * @var Delivery CMD\Hepsiburada\models\basemodels\returns\Delivery
     */
    public $delivery;
}
