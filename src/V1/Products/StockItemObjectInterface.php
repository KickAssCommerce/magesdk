<?php

namespace KickAss\MageSDK\V1\Products;

/**
 * Magento V1 catalogProductRepositoryV1 API stock item object
 *
 * @package KickAss\MageSDK
 */
interface StockItemObjectInterface
{
    /**
     * returns an array of 3rd party added attributes
     * @return array
     */
    public function getExtensionAttributes() : array;

    /**
     * @return int
     */
    public function getId() : int;

    /**
     * @return int
     */
    public function getProductId() : int;

    /**
     * @return int
     */
    public function getStockId() : int;

    /**
     * @return float
     */
    public function getQty() : float;

    /**
     * @return float
     */
    public function getMinQty() : float;

    /**
     * @return float
     */
    public function getMinSaleQty() : float;

    /**
     * @return float
     */
    public function getMaxSaleQty() : float;

    /**
     * @return boolean
     */
    public function isInStock() : bool;

    /**
     * @return boolean
     */
    public function isQtyDecimal() : bool;

    /**
     * @return boolean
     */
    public function isShowDefaultNotificationMessage() : bool;

    /**
     * @return boolean
     */
    public function isUseConfigMinQty() : bool;

    /**
     * @return boolean
     */
    public function isUseConfigMinSaleQty() : bool;

    /**
     * @return boolean
     */
    public function isUseConfigMaxSaleQty() : bool;

    /**
     * @return boolean
     */
    public function isUseConfigBackorders() : bool;

    /**
     * @return int
     */
    public function getBackorders() : int;

    /**
     * @return boolean
     */
    public function isUseConfigNotifyStockQty() : bool;

    /**
     * @return int
     */
    public function getNotifyStockQty() : int;

    /**
     * @return int
     */
    public function getQtyIncrements() : int;

    /**
     * @return boolean
     */
    public function isUseConfigEnableQtyInc() : bool;

    /**
     * @return boolean
     */
    public function isManageStock() : bool;

    /**
     * @return boolean
     */
    public function isUseConfigManageStock() : bool;

    /**
     * @return \DateTime
     */
    public function getLowStockDate() : \DateTime;

    /**
     * @return boolean
     */
    public function isDecimalDivided() : bool;

    /**
     * @return int
     */
    public function getStockStatusChangedAuto() : int;

    /**
     * @return boolean
     */
    public function isEnableQtyIncrements() : bool;
}
