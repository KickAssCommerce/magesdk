<?php

namespace KickAss\MageSDK\Objects\Products;

use KickAss\MageSDK\Objects\ObjectTrait;

/**
 * Magento V1 catalogProductRepositoryV1 API stock item object
 *
 * @package KickAss\MageSDK
 */
class StockItemObject implements StockItemObjectInterface
{
    use ObjectTrait;
    
    protected $itemId;
    protected $productId;
    protected $stockId;
    protected $minQty;
    protected $minSaleQty;
    protected $maxSaleQty;
    protected $isInStock;
    protected $isQtyDecimal;
    protected $showDefaultNotificationMessage;
    protected $useConfigMinQty;
    protected $useConfigMinSaleQty;
    protected $useConfigMaxSaleQty;
    protected $useConfigBackorders;
    protected $useConfigNotifyStockQty;
    protected $notifyStockQty;
    protected $qtyIncrements;
    protected $useConfigEnableQtyInc;
    protected $enableQtyIncrements;
    protected $manageStock;
    protected $useConfigManageStock;
    protected $lowStockDate;
    protected $isDecimalDivided;
    protected $stockStatusChangedAuto;
    protected $qty;
    protected $backorders;

    /**
     * Converts V1 api data into a structured object
     * @param int $itemId
     * @param int $productId
     * @param int $stockId
     * @param int $qty
     * @param int $minQty
     * @param int $minSaleQty
     * @param int $maxSaleQty
     * @param bool $isInStock
     * @param bool $isQtyDecimal
     * @param bool $showDefaultNotificationMessage
     * @param bool $useConfigMinQty
     * @param bool $useConfigMinSaleQty
     * @param bool $useConfigMaxSaleQty
     * @param bool $useConfigBackorders
     * @param bool $backorders
     * @param bool $useConfigNotifyStockQty
     * @param int $notifyStockQty
     * @param int $qtyIncrements
     * @param bool $useConfigEnableQtyInc
     * @param bool $enableQtyIncrements
     * @param bool $manageStock
     * @param bool $useConfigManageStock
     * @param string $lowStockDate
     * @param bool $isDecimalDivided
     * @param int $stockStatusChangedAuto
     * @param array $extensionAttributes
     */
    public function __construct(
        int $itemId,
        int $productId,
        int $stockId,
        int $qty,
        int $minQty,
        int $minSaleQty,
        int $maxSaleQty,
        bool $isInStock,
        bool $isQtyDecimal,
        bool $showDefaultNotificationMessage,
        bool $useConfigMinQty,
        bool $useConfigMinSaleQty,
        bool $useConfigMaxSaleQty,
        bool $useConfigBackorders,
        bool $backorders,
        bool $useConfigNotifyStockQty,
        int $notifyStockQty,
        int $qtyIncrements,
        bool $useConfigEnableQtyInc,
        bool $enableQtyIncrements,
        bool $manageStock,
        bool $useConfigManageStock,
        string $lowStockDate,
        bool $isDecimalDivided,
        int $stockStatusChangedAuto,
        array $extensionAttributes
    )
    {
        $this->itemId = $itemId;
        $this->productId = $productId;
        $this->stockId = $stockId;
        $this->qty = $qty;
        $this->minQty = $minQty;
        $this->minSaleQty = $minSaleQty;
        $this->maxSaleQty = $maxSaleQty;
        $this->isInStock = $isInStock;
        $this->isQtyDecimal = $isQtyDecimal;
        $this->showDefaultNotificationMessage = $showDefaultNotificationMessage;
        $this->useConfigMinQty = $useConfigMinQty;
        $this->useConfigMinSaleQty = $useConfigMinSaleQty;
        $this->useConfigMaxSaleQty = $useConfigMaxSaleQty;
        $this->useConfigBackorders = $useConfigBackorders;
        $this->backorders = $backorders;
        $this->useConfigNotifyStockQty = $useConfigNotifyStockQty;
        $this->notifyStockQty = $notifyStockQty;
        $this->qtyIncrements = $qtyIncrements;
        $this->useConfigEnableQtyInc = $useConfigEnableQtyInc;
        $this->enableQtyIncrements = $enableQtyIncrements;
        $this->manageStock = $manageStock;
        $this->useConfigManageStock = $useConfigManageStock;
        $this->lowStockDate = $lowStockDate;
        $this->isDecimalDivided = $isDecimalDivided;
        $this->stockStatusChangedAuto = $stockStatusChangedAuto;
        $this->extensionAttributes = $extensionAttributes;
    }

    /**
     * @return int
     */
    public function getItemId(): int
    {
        return $this->itemId;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @return int
     */
    public function getStockId(): int
    {
        return $this->stockId;
    }

    /**
     * @return int
     */
    public function getMinQty(): int
    {
        return $this->minQty;
    }

    /**
     * @return int
     */
    public function getMinSaleQty(): int
    {
        return $this->minSaleQty;
    }

    /**
     * @return int
     */
    public function getMaxSaleQty(): int
    {
        return $this->maxSaleQty;
    }

    /**
     * @return boolean
     */
    public function isInStock(): bool
    {
        return $this->isInStock;
    }

    /**
     * @return boolean
     */
    public function isQtyDecimal(): bool
    {
        return $this->isQtyDecimal;
    }

    /**
     * @return boolean
     */
    public function isShowDefaultNotificationMessage(): bool
    {
        return $this->showDefaultNotificationMessage;
    }

    /**
     * @return boolean
     */
    public function isUseConfigMinQty(): bool
    {
        return $this->useConfigMinQty;
    }

    /**
     * @return boolean
     */
    public function isUseConfigMinSaleQty(): bool
    {
        return $this->useConfigMinSaleQty;
    }

    /**
     * @return boolean
     */
    public function isUseConfigMaxSaleQty(): bool
    {
        return $this->useConfigMaxSaleQty;
    }

    /**
     * @return boolean
     */
    public function isUseConfigBackorders(): bool
    {
        return $this->useConfigBackorders;
    }

    /**
     * @return boolean
     */
    public function isUseConfigNotifyStockQty(): bool
    {
        return $this->useConfigNotifyStockQty;
    }

    /**
     * @return int
     */
    public function getNotifyStockQty(): int
    {
        return $this->notifyStockQty;
    }

    /**
     * @return int
     */
    public function getQtyIncrements(): int
    {
        return $this->qtyIncrements;
    }

    /**
     * @return boolean
     */
    public function isUseConfigEnableQtyInc(): bool
    {
        return $this->useConfigEnableQtyInc;
    }

    /**
     * @return boolean
     */
    public function isEnableQtyIncrements(): bool
    {
        return $this->enableQtyIncrements;
    }

    /**
     * @return boolean
     */
    public function isManageStock(): bool
    {
        return $this->manageStock;
    }

    /**
     * @return boolean
     */
    public function isUseConfigManageStock(): bool
    {
        return $this->useConfigManageStock;
    }

    /**
     * @return string
     */
    public function getLowStockDate(): string
    {
        return $this->lowStockDate;
    }

    /**
     * @return boolean
     */
    public function isDecimalDivided(): bool
    {
        return $this->isDecimalDivided;
    }

    /**
     * @return int
     */
    public function getStockStatusChangedAuto(): int
    {
        return $this->stockStatusChangedAuto;
    }

    /**
     * @return int
     */
    public function getQty(): int
    {
        return $this->qty;
    }

    /**
     * @return boolean
     */
    public function isBackorders(): bool
    {
        return $this->backorders;
    }
}
