<?php
/**
 * Created by PhpStorm.
 * User: sander
 * Date: 16-4-17
 * Time: 16:51
 */
namespace KickAss\MageSDK\Objects\Products;


/**
 * Magento V1 catalogProductRepositoryV1 API stock item object
 *
 * @package KickAss\MageSDK
 */
interface StockItemObjectInterface
{
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
    public function __construct(int $itemId, int $productId, int $stockId, int $qty, int $minQty,
                                int $minSaleQty, int $maxSaleQty, bool $isInStock, bool $isQtyDecimal,
                                bool $showDefaultNotificationMessage, bool $useConfigMinQty,
                                bool $useConfigMinSaleQty, bool $useConfigMaxSaleQty, bool $useConfigBackorders,
                                bool $backorders, bool $useConfigNotifyStockQty, int $notifyStockQty,
                                int $qtyIncrements, bool $useConfigEnableQtyInc, bool $enableQtyIncrements,
                                bool $manageStock, bool $useConfigManageStock, string $lowStockDate,
                                bool $isDecimalDivided, int $stockStatusChangedAuto, array $extensionAttributes);

    /**
     * @return int
     */
    public function getItemId() : int;

    /**
     * @return int
     */
    public function getProductId() : int;

    /**
     * @return int
     */
    public function getStockId() : int;

    /**
     * @return int
     */
    public function getMinQty() : int;

    /**
     * @return int
     */
    public function getMinSaleQty() : int;

    /**
     * @return int
     */
    public function getMaxSaleQty() : int;

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
    public function isEnableQtyIncrements() : bool;

    /**
     * @return boolean
     */
    public function isManageStock() : bool;

    /**
     * @return boolean
     */
    public function isUseConfigManageStock() : bool;

    /**
     * @return string
     */
    public function getLowStockDate() : string;

    /**
     * @return boolean
     */
    public function isDecimalDivided() : bool;

    /**
     * @return int
     */
    public function getStockStatusChangedAuto() : int;

    /**
     * @return int
     */
    public function getQty() : int;

    /**
     * @return boolean
     */
    public function isBackorders() : bool;
}