<?php

namespace Tests\MageSDK\V1\Products;

use Sandermangel\MageSDK\V1\AbstractObject;
use Sandermangel\MageSDK\V1\Products\StockItemObject;

/**
 * Magento V1 catalogProductRepositoryV1 API products object
 *
 * @package Sandermangel\MageSDK
 */
class ProductsObjectMock extends AbstractObject
{
    /**
     * @var StockItemObject
     */
    protected $stock_item;

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
     * @return StockItemObject
     */
    public function getStockItem(): StockItemObject
    {
        return $this->stock_item;
    }
}