<?php

namespace KickAss\MageSDK\V1;

use KickAss\MageSDK\Api\Client;
use KickAss\MageSDK\Api\ApiException;
use KickAss\MageSDK\V1\Products\ProductsObject;
use KickAss\MageSDK\V1\Products\ProductsObjectInterface;

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

        return new ProductsObject($response['body']);
    }
}
