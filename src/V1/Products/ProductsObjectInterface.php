<?php

namespace KickAss\MageSDK\V1\Products;

/**
 * Magento V1 catalogProductRepositoryV1 API products object
 *
 * @package KickAss\MageSDK
 */
interface ProductsObjectInterface
{
    /**
     * @return \stdClass
     */
    public function getStockItem() : \stdClass;

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
     * @return int
     */
    public function getWeight() : float;

    /**
     * @return array
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
     * @return mixed
     */
    public function getExtensionAttributes() : array;

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
