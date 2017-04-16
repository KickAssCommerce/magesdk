<?php

namespace KickAss\MageSDK\Objects\Products\Bundle;

use KickAss\MageSDK\Objects\ObjectTrait;

/**
 * Magento V1 catalogProductRepositoryV1 API bundle option object
 *
 * @package KickAss\MageSDK
 */
class OptionObject implements OptionObjectInterface
{
    use ObjectTrait;

    protected $optionId;
    protected $sku;
    protected $required;
    protected $type;
    protected $position;
    protected $productLinks;

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
    public function __construct(
        int $optionId,
        string $sku,
        bool $required,
        string $type,
        int $position,
        array $productLinks,
        array $extensionAttributes
    )
    {
        $this->optionId = $optionId;
        $this->sku = $sku;
        $this->required = $required;
        $this->type = $type;
        $this->position = $position;
        $this->productLinks = $productLinks;
        $this->extensionAttributes = $extensionAttributes;
    }

    /**
     * @return int
     */
    public function getOptionId(): int
    {
        return (int)$this->optionId;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return (int)$this->sku;
    }

    /**
     * @return bool
     */
    public function getRequired(): bool
    {
        return (bool)$this->required;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return (int)$this->position;
    }

    /**
     * @return ProductLinkObjectInterface[]
     */
    public function getProductLinks(): array
    {
        return array_map(function($item) {
            return new ProductLinkObject($item->id, $item->sku, $item->option_id,
                $item->qty, $item->position, $item->is_default, $item->price,
                $item->price_type, $item->can_change_qty,
                $item->extension_attributes);
        }, $this->productLinks);
    }
}
