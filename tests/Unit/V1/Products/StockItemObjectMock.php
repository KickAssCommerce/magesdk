<?php

namespace Tests\MageSDK\V1\Products;

use KickAss\MageSDK\Objects\Products\StockItemObjectInterface;

/**
 * Magento V1 catalogProductRepositoryV1 API stock item object
 *
 * @package KickAss\MageSDK
 */
class StockItemObjectMock implements StockItemObjectInterface
{
    public function __construct($apiData)
    {
        $product = new ProductApiMock();

        foreach (get_object_vars($product->extension_attributes->stock_item) as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * returns an array of 3rd party added attributes
     * @return array
     */
    public function getExtensionAttributes() : array
    {
        // TODO: Implement getExtensionAttributes() method.
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        // TODO: Implement getId() method.
    }

    /**
     * @return int
     */
    public function getProductId() : int
    {
        // TODO: Implement getProductId() method.
    }

    /**
     * @return int
     */
    public function getStockId() : int
    {
        // TODO: Implement getStockId() method.
    }

    /**
     * @return float
     */
    public function getQty() : float
    {
        // TODO: Implement getQty() method.
    }

    /**
     * @return float
     */
    public function getMinQty() : float
    {
        // TODO: Implement getMinQty() method.
    }

    /**
     * @return float
     */
    public function getMinSaleQty() : float
    {
        // TODO: Implement getMinSaleQty() method.
    }

    /**
     * @return float
     */
    public function getMaxSaleQty() : float
    {
        // TODO: Implement getMaxSaleQty() method.
    }

    /**
     * @return boolean
     */
    public function isInStock() : bool
    {
        // TODO: Implement isInStock() method.
    }

    /**
     * @return boolean
     */
    public function isQtyDecimal() : bool
    {
        // TODO: Implement isQtyDecimal() method.
    }

    /**
     * @return boolean
     */
    public function isShowDefaultNotificationMessage() : bool
    {
        // TODO: Implement isShowDefaultNotificationMessage() method.
    }

    /**
     * @return boolean
     */
    public function isUseConfigMinQty() : bool
    {
        // TODO: Implement isUseConfigMinQty() method.
    }

    /**
     * @return boolean
     */
    public function isUseConfigMinSaleQty() : bool
    {
        // TODO: Implement isUseConfigMinSaleQty() method.
    }

    /**
     * @return boolean
     */
    public function isUseConfigMaxSaleQty() : bool
    {
        // TODO: Implement isUseConfigMaxSaleQty() method.
    }

    /**
     * @return boolean
     */
    public function isUseConfigBackorders() : bool
    {
        // TODO: Implement isUseConfigBackorders() method.
    }

    /**
     * @return int
     */
    public function getBackorders() : int
    {
        // TODO: Implement getBackorders() method.
    }

    /**
     * @return boolean
     */
    public function isUseConfigNotifyStockQty() : bool
    {
        // TODO: Implement isUseConfigNotifyStockQty() method.
    }

    /**
     * @return int
     */
    public function getNotifyStockQty() : int
    {
        // TODO: Implement getNotifyStockQty() method.
    }

    /**
     * @return int
     */
    public function getQtyIncrements() : int
    {
        // TODO: Implement getQtyIncrements() method.
    }

    /**
     * @return boolean
     */
    public function isUseConfigEnableQtyInc() : bool
    {
        // TODO: Implement isUseConfigEnableQtyInc() method.
    }

    /**
     * @return boolean
     */
    public function isManageStock() : bool
    {
        // TODO: Implement isManageStock() method.
    }

    /**
     * @return boolean
     */
    public function isUseConfigManageStock() : bool
    {
        // TODO: Implement isUseConfigManageStock() method.
    }

    /**
     * @return \DateTime
     */
    public function getLowStockDate() : \DateTime
    {
        // TODO: Implement getLowStockDate() method.
    }

    /**
     * @return boolean
     */
    public function isDecimalDivided() : bool
    {
        // TODO: Implement isDecimalDivided() method.
    }

    /**
     * @return int
     */
    public function getStockStatusChangedAuto() : int
    {
        // TODO: Implement getStockStatusChangedAuto() method.
    }

    /**
     * @return boolean
     */
    public function isEnableQtyIncrements() : bool
    {
        // TODO: Implement isEnableQtyIncrements() method.
    }
}