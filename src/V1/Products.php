<?php

namespace Sandermangel\MageSDK\V1;

use Sandermangel\MageSDK\Api\Client;
use Sandermangel\MageSDK\Api\ApiException;
use Sandermangel\MageSDK\V1\Products\ProductsObject;
use Sandermangel\MageSDK\V1\Products\ProductsObjectInterface;

/**
 * Magento V1 catalogProductRepositoryV1 API
 *
 * @package Sandermangel\MageSDK
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
    public function getBySku(string $sku, $storeId = 0, $editMode = false, $forceReload = false): ProductsObjectInterface
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
