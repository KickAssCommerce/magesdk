<?php

namespace KickAss\MageSDK\Models\Products;

use KickAss\MageSDK\Api\ApiException;
use KickAss\MageSDK\ConfigInterface;
use KickAss\MageSDK\Objects\Products\ProductsObjectInterface;
use KickAss\MageSDK\Objects\Products\StockItemObjectInterface;
use KickAss\MageSDK\Objects\Products\StockItemObject;
use KickAss\MageSDK\Models\Products\Stock\ViewInterface as StockViewInterface;
use KickAss\MageSDK\Models\Products\Stock\View as StockView;
use KickAss\MageSDK\V1\ProductsInterface;

class View implements ViewInterface
{
    protected $productsObject;
    protected $stockModel;
    protected $config;
    protected $storeId;
    protected $sku;
    /**
     * @var ProductsInterface
     */
    private $productApi;

    /**
     * ProductInfo constructor.
     * @param string $sku
     * @param int $storeId
     * @param ProductsInterface $productApi
     * @param ConfigInterface $config
     * @internal param $Product
     */
    public function __construct(string $sku, int $storeId, ProductsInterface $productApi, ConfigInterface $config)
    {
        $this->config = $config;

        $this->storeId = $storeId;
        $this->sku = $sku;
        $this->productApi = $productApi;
    }

    /**
     * @return ProductsObjectInterface
     * @throws ApiException
     */
    public function getProductsObject(): ProductsObjectInterface
    {
        if (!$this->productsObject) {
            $this->productsObject = $this->productApi->getBySku($this->sku, $this->storeId, false, false);
        }
        return $this->productsObject;
    }

    /**
     * @return StockItemObjectInterface
     * @throws \KickAss\MageSDK\Api\ApiException
     */
    public function getStockItemObject(): StockItemObjectInterface
    {
        return new StockItemObject($this->getProductsObject()->getStockItem());
    }

    /**
     * @return StockViewInterface
     * @throws \KickAss\MageSDK\Api\ApiException
     */
    public function getStockModel(): StockViewInterface
    {
        return new StockView($this->getStockItemObject(), $this->storeId, $this->config);
    }

    /**
     * get the datetime object of the moment the product was last updated
     * @return \DateTime
     * @throws ApiException
     */
    public function getUpdatedAt(): \DateTime
    {
        return new \DateTime($this->getProductsObject()->getUpdatedAt());
    }

    /**
     * get the datetime object of the moment the product was created
     * @return \DateTime
     * @throws ApiException
     */
    public function getCreatedAt(): \DateTime
    {
        return new \DateTime($this->getProductsObject()->getCreatedAt());
    }
}
