<?php

namespace KickAss\MageSDK\V1;

use KickAss\MageSDK\Api\Client;
use KickAss\MageSDK\Api\ApiException;
use KickAss\MageSDK\Objects\Products\ProductsObject;
use KickAss\MageSDK\Objects\Products\ProductsObjectInterface;
use KickAss\MageSDK\Objects\Products\StockItemObject;

/**
 * Magento V1 catalogProductRepositoryV1 API
 *
 * @package KickAss\MageSDK
 */
class Products extends AbstractEndpoint implements ProductsInterface
{
    protected $path = 'products';
    protected $sku;
    protected $editMode;
    protected $storeId;
    protected $forceReload;

    /**
     * Retrieve a product by SKU
     * @param string $sku
     * @param int $storeId
     * @param bool $editMode
     * @param bool $forceReload
     * @return ProductsObjectInterface
     * @throws ApiException
     */
    public function getBySku(string $sku, int $storeId, bool $editMode, bool $forceReload): ProductsObjectInterface
    {
        $this->sku = $sku;
        $this->editMode = $editMode;
        $this->storeId = $storeId;
        $this->forceReload = $forceReload;

        $client = new Client($this->getConfig(), 'GET', $this->getPath() . '/' . $this->sku, [
            'editMode' => $this->editMode,
            'storeId' => $this->storeId,
            'forceReload' => $this->forceReload,
        ], []);

        $response = $client->executeCall();
        $variables = $response['body'];

        $stockItem = new StockItemObject(
            $variables->extension_attributes->stock_item->item_id,
            $variables->extension_attributes->stock_item->product_id,
            $variables->extension_attributes->stock_item->stock_id,
            $variables->extension_attributes->stock_item->qty,
            $variables->extension_attributes->stock_item->min_qty,
            $variables->extension_attributes->stock_item->min_sale_qty,
            $variables->extension_attributes->stock_item->max_sale_qty,
            $variables->extension_attributes->stock_item->is_in_stock,
            $variables->extension_attributes->stock_item->is_qty_decimal,
            $variables->extension_attributes->stock_item->show_default_notification_message,
            $variables->extension_attributes->stock_item->use_config_min_qty,
            $variables->extension_attributes->stock_item->use_config_min_sale_qty,
            $variables->extension_attributes->stock_item->use_config_max_sale_qty,
            $variables->extension_attributes->stock_item->use_config_backorders,
            $variables->extension_attributes->stock_item->backorders,
            $variables->extension_attributes->stock_item->use_config_notify_stock_qty,
            $variables->extension_attributes->stock_item->notify_stock_qty,
            $variables->extension_attributes->stock_item->qty_increments,
            $variables->extension_attributes->stock_item->use_config_enable_qty_inc,
            $variables->extension_attributes->stock_item->enable_qty_increments,
            $variables->extension_attributes->stock_item->manage_stock,
            $variables->extension_attributes->stock_item->use_config_manage_stock,
            $variables->extension_attributes->stock_item->low_stock_date,
            $variables->extension_attributes->stock_item->is_decimal_divided,
            $variables->extension_attributes->stock_item->stock_status_changed_auto,
            (array)$variables->extension_attributes->stock_item->extension_attributes
        );

        return new ProductsObject(
            $variables->id,
            $variables->sku,
            $variables->name,
            $variables->attribute_set_id,
            (float)$variables->price,
            $variables->status,
            $variables->visibility,
            $variables->type_id,
            $variables->created_at,
            $variables->updated_at,
            (float)$variables->weight,
            $stockItem,
            (array)$variables->extension_attributes->bundle_product_options,
            (array)$variables->extension_attributes->downloadable_product_links,
            (array)$variables->extension_attributes->downloadable_product_samples,
            (array)$variables->extension_attributes->giftcard_amounts,
            (array)$variables->extension_attributes->configurable_product_options,
            (array)$variables->extension_attributes->product_links,
            (array)$variables->options,
            (array)$variables->media_gallery_entries,
            (array)$variables->tier_prices,
            (array)$variables->custom_attributes,
            (array)$variables->extension_attributes
        );
    }
}
