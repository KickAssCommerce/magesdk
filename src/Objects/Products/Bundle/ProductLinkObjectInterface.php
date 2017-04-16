<?php

namespace KickAss\MageSDK\Objects\Products\Bundle;

/**
 * Magento V1 catalogProductRepositoryV1 API bundle option product links object
 *
 * @package KickAss\MageSDK
 */
interface ProductLinkObjectInterface
{
    /**
     * Converts V1 api data into a structured object
     * @param string $id
     * @param string $sku
     * @param float $qty
     * @param int $position
     * @param bool $default
     * @param float $price
     * @param int $priceType
     * @param bool $canChangeQuantity
     * @param array $extensionAttributes
     */
    public function __construct(string $id, string $sku, float $qty, int $position, bool $default, float $price, int $priceType, bool $canChangeQuantity, array $extensionAttributes);

    /**
     * @return string
     */
    public function getId() : string;

    /**
     * @return string
     */
    public function getSku() : string;

    /**
     * @return float
     */
    public function getQty() : float;

    /**
     * @return int
     */
    public function getPosition() : int;

    /**
     * @return bool
     */
    public function getDefault() : bool;

    /**
     * @return float
     */
    public function getPrice() : float;

    /**
     * @return int
     */
    public function getPriceType() : int;

    /**
     * @return bool
     */
    public function getCanChangeQuantity() : bool;
}