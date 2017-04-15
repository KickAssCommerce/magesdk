<?php

namespace Tests\MageSDK\V1\Products;

use KickAss\MageSDK\V1\ObjectTrait;
use KickAss\MageSDK\V1\Products\ProductsObjectInterface;
use KickAss\MageSDK\V1\Products\StockItemObject;

/**
 * Magento V1 catalogProductRepositoryV1 API products object
 *
 * @package KickAss\MageSDK
 */
class ProductsObjectMock implements ProductsObjectInterface
{
    use ObjectTrait;

    protected $stock_item;
    protected $id;
    protected $sku;
    protected $name;
    protected $attribute_set_id;
    protected $price;
    protected $status;
    protected $visibility;
    protected $type_id;
    protected $created_at;
    protected $updated_at;
    protected $weight;
    protected $bundle_product_options;
    protected $downloadable_product_links;
    protected $downloadable_product_samples;
    protected $giftcard_amounts;
    protected $configurable_product_options;
    protected $extension_attributes;
    protected $product_links;
    protected $options;
    protected $media_gallery_entries;
    protected $tier_prices;
    protected $custom_attributes;

    /**
     * Converts V1 api data into a structured object
     *
     * @param \stdClass $apiData
     */
    public function __construct($apiData)
    {
        $this->id = 1;
        $this->sku = '24-MB01';
        $this->name = 'Duffle bag';
        $this->attribute_set_id = 1;
        $this->price = 50.95;
        $this->status = 1;
        $this->visibility = 2;
        $this->type_id = 'simple';
        $this->created_at = '2016-02-01';
        $this->updated_at = (new \DateTime('now'))->format('Y-m-d');
        $this->weight = 0.9;

        $this->stock_item = new StockItemObjectMock(new \stdClass());
        $this->bundle_product_options = [];
        $this->downloadable_product_links = [];
        $this->downloadable_product_samples = [];
        $this->giftcard_amounts = [];
        $this->configurable_product_options = [];

        $this->extension_attributes = [];

        $this->product_links = [];
        $this->options = [];
        $this->media_gallery_entries = [];
        $this->tier_prices = [];
        $this->custom_attributes = [];
    }

    /**
     * @return int
     */
    public function getAttributeSetId(): int
    {
        return $this->attribute_set_id;
    }

    /**
     * @return array
     */
    public function getBundleProductOptions(): array
    {
        return $this->bundle_product_options;
    }

    /**
     * @return array
     */
    public function getConfigurableProductOptions(): array
    {
        return $this->configurable_product_options;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @return array
     */
    public function getCustomAttributes(): array
    {
        return $this->custom_attributes;
    }

    /**
     * @return array
     */
    public function getDownloadableProductLinks(): array
    {
        return $this->downloadable_product_links;
    }

    /**
     * @return array
     */
    public function getDownloadableProductSamples(): array
    {
        return $this->downloadable_product_samples;
    }

    /**
     * @return array
     */
    public function getExtensionAttributes(): array
    {
        return $this->extension_attributes;
    }

    /**
     * @return array
     */
    public function getGiftcardAmounts(): array
    {
        return $this->giftcard_amounts;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getMediaGalleryEntries(): array
    {
        return $this->media_gallery_entries;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return array
     */
    public function getProductLinks(): array
    {
        return $this->product_links;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function getTierPrices(): array
    {
        return $this->tier_prices;
    }

    /**
     * @return string
     */
    public function getTypeId(): string
    {
        return $this->type_id;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @return int
     */
    public function getVisibility(): int
    {
        return $this->visibility;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @return StockItemObject
     */
    public function getStockItem(): StockItemObject
    {
        return $this->stock_item;
    }
}