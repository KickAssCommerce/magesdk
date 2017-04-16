<?php

namespace KickAss\MageSDK\Objects\Products\Bundle;

use KickAss\MageSDK\Objects\ObjectTrait;

/**
 * Magento V1 catalogProductRepositoryV1 API bundle option product links object
 *
 * @package KickAss\MageSDK
 */
class ProductLinkObject implements ProductLinkObjectInterface
{
    use ObjectTrait;

    protected $apiData;
    protected $id;
    protected $sku;
    protected $qty;
    protected $position;
    protected $default;
    protected $price;
    protected $priceType;
    protected $canChangeQuantity;

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
    public function __construct(
        string $id,
        string $sku,
        float $qty,
        int $position,
        bool $default,
        float $price,
        int $priceType,
        bool $canChangeQuantity,
        array $extensionAttributes
    )
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->qty = $qty;
        $this->position = $position;
        $this->default = $default;
        $this->price = $price;
        $this->priceType = $priceType;
        $this->canChangeQuantity = $canChangeQuantity;
        $this->extensionAttribues = $extensionAttributes;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @return float
     */
    public function getQty(): float
    {
        return (float)$this->qty;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return (int)$this->position;
    }

    /**
     * @return bool
     */
    public function getDefault(): bool
    {
        return (bool)$this->default;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return (float)$this->price;
    }

    /**
     * @return int
     */
    public function getPriceType(): int
    {
        return (int)$this->priceType;
    }

    /**
     * @return bool
     */
    public function getCanChangeQuantity(): bool
    {
        return (bool)$this->canChangeQuantity;
    }
}
