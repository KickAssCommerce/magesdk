<?php

namespace KickAss\MageSDK\Objects\Products;

use KickAss\MageSDK\Objects\Products\Bundle\OptionObject;

/**
 * Magento V1 catalogProductRepositoryV1 API products object
 *
 * @package KickAss\MageSDK
 */
interface ProductsObjectInterface
{
    /**
     * Converts V1 api data into a structured object
     *
     * @param int $id
     * @param string $sku
     * @param string $name
     * @param int $attributeSetId
     * @param float $price
     * @param int $status
     * @param int $visibility
     * @param string $typeId
     * @param string $createdAt
     * @param string $updatedAt
     * @param float $weight
     * @param StockItemObjectInterface $stockItem
     * @param array $bundleBroductOptions
     * @param array $downloadableProductLinks
     * @param array $downloadableProductSamples
     * @param array $giftcardAmounts
     * @param array $configurableProductOptions
     * @param array $productLinks
     * @param array $options
     * @param array $mediaGalleryEntries
     * @param array $tierPrices
     * @param array $customAttributes
     * @param array $extensionAttributes
     * @internal param \stdClass $apiData
     */
    public function __construct(int $id, string $sku, string $name, int $attributeSetId,
                                float $price, int $status, int $visibility, string $typeId, string $createdAt,
                                string $updatedAt, float $weight, StockItemObjectInterface $stockItem,
                                array $bundleBroductOptions, array $downloadableProductLinks,
                                array $downloadableProductSamples, array $giftcardAmounts, array $configurableProductOptions,
                                array $productLinks, array $options, array $mediaGalleryEntries,
                                array $tierPrices, array $customAttributes, array $extensionAttributes);

    /**
     * @return StockItemObjectInterface
     */
    public function getStockItem() : StockItemObjectInterface;

    /**
     * @return int
     */
    public function getId() : int;

    /**
     * @return string
     */
    public function getSku() : string;

    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @return int
     */
    public function getAttributeSetId() : int;

    /**
     * @return float
     */
    public function getPrice() : float;

    /**
     * @return int
     */
    public function getStatus() : int;

    /**
     * @return int
     */
    public function getVisibility() : int;

    /**
     * @return string
     */
    public function getTypeId() : string;

    /**
     * @return string
     */
    public function getCreatedAt() : string;

    /**
     * @return string
     */
    public function getUpdatedAt() : string;

    /**
     * @return float
     */
    public function getWeight() : float;

    /**
     * @return OptionObject[]
     */
    public function getBundleProductOptions() : array;

    /**
     * @return array
     */
    public function getDownloadableProductLinks() : array;

    /**
     * @return array
     */
    public function getDownloadableProductSamples() : array;

    /**
     * @return array
     */
    public function getGiftcardAmounts() : array;

    /**
     * @return array
     */
    public function getConfigurableProductOptions() : array;

    /**
     * @return array
     */
    public function getProductLinks() : array;

    /**
     * @return array
     */
    public function getOptions() : array;

    /**
     * @return array
     */
    public function getMediaGalleryEntries() : array;

    /**
     * @return array
     */
    public function getTierPrices() : array;

    /**
     * @return array
     */
    public function getCustomAttributes() : array;
}