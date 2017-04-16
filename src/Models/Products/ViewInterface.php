<?php

namespace KickAss\MageSDK\Models\Products;

use KickAss\MageSDK\Api\ApiException;
use KickAss\MageSDK\ConfigInterface;
use KickAss\MageSDK\Models\Products\Stock\ViewInterface as StockViewInterface;
use KickAss\MageSDK\Objects\Products\ProductsObjectInterface;
use KickAss\MageSDK\Objects\Products\StockItemObjectInterface;
use KickAss\MageSDK\V1\ProductsInterface;

interface ViewInterface
{

    /**
     * ProductInfo constructor.
     * @param string $sku
     * @param int $storeId
     * @param ProductsInterface $productApi
     * @param ConfigInterface $config
     * @internal param $Product
     */
    public function __construct(string $sku, int $storeId, ProductsInterface $productApi, ConfigInterface $config);

    /**
     * @return ProductsObjectInterface
     */
    public function getProductsObject(): ProductsObjectInterface;

    /**
     * @return StockItemObjectInterface
     */
    public function getStockItemObject(): StockItemObjectInterface;

    /**
     * @return StockViewInterface
     */
    public function getStockModel(): StockViewInterface;

    /**
     * get the datetime object of the moment the product was last updated
     * @return \DateTime
     * @throws ApiException
     */
    public function getUpdatedAt(): \DateTime;

    /**
     * get the datetime object of the moment the product was created
     * @return \DateTime
     * @throws ApiException
     */
    public function getCreatedAt(): \DateTime;
}
