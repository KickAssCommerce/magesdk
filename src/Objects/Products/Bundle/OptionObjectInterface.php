<?php

namespace KickAss\MageSDK\Objects\Products\Bundle;

/**
 * Magento V1 catalogProductRepositoryV1 API bundle option object
 *
 * @package KickAss\MageSDK
 */
interface OptionObjectInterface
{
    /**
     * Converts V1 api data into a structured object
     * @param int $optionId
     * @param string $sku
     * @param bool $required
     * @param string $type
     * @param int $position
     * @param ProductLinkObjectInterface[] $productLinks
     * @param array $extensionAttributes
     */
    public function __construct(int $optionId, string $sku, bool $required, string $type, int $position, array $productLinks, array $extensionAttributes);

    /**
     * @return int
     */
    public function getOptionId() : int;

    /**
     * @return string
     */
    public function getSku() : string;

    /**
     * @return bool
     */
    public function getRequired() : bool;

    /**
     * @return string
     */
    public function getType() : string;

    /**
     * @return int
     */
    public function getPosition() : int;

    /**
     * @return ProductLinkObjectInterface[]
     */
    public function getProductLinks() : array;
}