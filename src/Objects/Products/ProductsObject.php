<?php

namespace KickAss\MageSDK\Objects\Products;

use KickAss\MageSDK\Objects\ObjectTrait;

/**
 * Magento V1 catalogProductRepositoryV1 API products object
 *
 * @package KickAss\MageSDK
 */
class ProductsObject implements ProductsObjectInterface
{
    use ObjectTrait;

    protected $stock_item;
    protected $id;
    protected $sku;
    protected $name;
    protected $attribute_set_id;
    protected $price;
    protected $status;
    protected $visibility;
    protected $type_id;
    protected $created_at;
    protected $updated_at;
    protected $weight;
    protected $bundle_product_options;
    protected $downloadable_product_links;
    protected $downloadable_product_samples;
    protected $giftcard_amounts;
    protected $configurable_product_options;
    protected $extension_attributes;
    protected $product_links;
    protected $options;
    protected $media_gallery_entries;
    protected $tier_prices;
    protected $custom_attributes;

    /**
     * Converts V1 api data into a structured object
     *
     * @param \stdClass $apiData
     */
    public function __construct(\stdClass $apiData)
    {
        $this->id = (int)$apiData->id;
        $this->sku = (string)$apiData->sku;
        $this->name = (string)$apiData->name;
        $this->attribute_set_id = (int)$apiData->attribute_set_id;
        $this->price = (float)$apiData->price;
        $this->status = (int)$apiData->status;
        $this->visibility = (int)$apiData->visibility;
        $this->type_id = (string)$apiData->type_id;
        $this->created_at = (string)$apiData->created_at;
        $this->updated_at = (string)$apiData->updated_at;
        $this->weight = $apiData->weight ?? 0;

        $this->stock_item = $apiData->extension_attributes->stock_item;
        $this->bundle_product_options = $apiData->extension_attributes->bundle_product_options ?? [];
        $this->downloadable_product_links = $apiData->extension_attributes->downloadable_product_links ?? [];
        $this->downloadable_product_samples = $apiData->extension_attributes->downloadable_product_samples ?? [];
        $this->giftcard_amounts = $apiData->extension_attributes->giftcard_amounts ?? [];
        $this->configurable_product_options = $apiData->extension_attributes->configurable_product_options ?? [];

        $this->extension_attributes = $apiData->extension_attributes;

        $this->product_links = (array)$apiData->product_links;
        $this->options = (array)$apiData->options;
        $this->media_gallery_entries = (array)$apiData->media_gallery_entries;
        $this->tier_prices = (array)$apiData->tier_prices;
        $this->custom_attributes = (array)$apiData->custom_attributes;
    }

    /**
     * @return \stdClass
     */
    public function getStockItem(): \stdClass
    {
        return $this->stock_item;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAttributeSetId(): int
    {
        return $this->attribute_set_id;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getVisibility(): int
    {
        return $this->visibility;
    }

    /**
     * @return string
     */
    public function getTypeId(): string
    {
        return $this->type_id;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @return array
     */
    public function getBundleProductOptions(): array
    {
        return $this->bundle_product_options;
    }

    /**
     * @return array
     */
    public function getDownloadableProductLinks(): array
    {
        return $this->downloadable_product_links;
    }

    /**
     * @return array
     */
    public function getDownloadableProductSamples(): array
    {
        return $this->downloadable_product_samples;
    }

    /**
     * @return array
     */
    public function getGiftcardAmounts(): array
    {
        return $this->giftcard_amounts;
    }

    /**
     * @return array
     */
    public function getConfigurableProductOptions(): array
    {
        return $this->configurable_product_options;
    }

    /**
     * @return mixed
     */
    public function getExtensionAttributes(): array
    {
        return $this->extension_attributes;
    }

    /**
     * @return array
     */
    public function getProductLinks(): array
    {
        return $this->product_links;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return array
     */
    public function getMediaGalleryEntries(): array
    {
        return $this->media_gallery_entries;
    }

    /**
     * @return array
     */
    public function getTierPrices(): array
    {
        return $this->tier_prices;
    }

    /**
     * @return array
     */
    public function getCustomAttributes(): array
    {
        return $this->custom_attributes;
    }
}
/**
    {
        "id": 0,
  "sku": "string",
  "name": "string",
  "attribute_set_id": 0,
  "price": 0,
  "status": 0,
  "visibility": 0,
  "type_id": "string",
  "created_at": "string",
  "updated_at": "string",
  "weight": 0,
  "extension_attributes": {
    "bundle_product_options": [
      {
          "option_id": 0,
        "title": "string",
        "required": true,
        "type": "string",
        "position": 0,
        "sku": "string",
        "product_links": [
          {
              "id": "string",
            "sku": "string",
            "option_id": 0,
            "qty": 0,
            "position": 0,
            "is_default": true,
            "price": 0,
            "price_type": 0,
            "can_change_quantity": 0,
            "extension_attributes": {}
          }
        ],
        "extension_attributes": {}
      }
    ],
    "downloadable_product_links": [
      {
          "id": 0,
        "title": "string",
        "sort_order": 0,
        "is_shareable": 0,
        "price": 0,
        "number_of_downloads": 0,
        "link_type": "string",
        "link_file": "string",
        "link_file_content": {
          "file_data": "string",
          "name": "string",
          "extension_attributes": {}
        },
        "link_url": "string",
        "sample_type": "string",
        "sample_file": "string",
        "sample_file_content": {
          "file_data": "string",
          "name": "string",
          "extension_attributes": {}
        },
        "sample_url": "string",
        "extension_attributes": {}
      }
    ],
    "downloadable_product_samples": [
      {
          "id": 0,
        "title": "string",
        "sort_order": 0,
        "sample_type": "string",
        "sample_file": "string",
        "sample_file_content": {
          "file_data": "string",
          "name": "string",
          "extension_attributes": {}
        },
        "sample_url": "string",
        "extension_attributes": {}
      }
    ],
    "giftcard_amounts": [
      {
          "attribute_id": 0,
        "website_id": 0,
        "value": 0,
        "website_value": 0,
        "extension_attributes": {}
      }
    ],
    "configurable_product_options": [
      {
          "id": 0,
        "attribute_id": "string",
        "label": "string",
        "position": 0,
        "is_use_default": true,
        "values": [
          {
              "value_index": 0,
            "extension_attributes": {}
          }
        ],
        "extension_attributes": {},
        "product_id": 0
      }
    ],
    "configurable_product_links": [
            0
        ]
  },
  "product_links": [
    {
        "sku": "string",
      "link_type": "string",
      "linked_product_sku": "string",
      "linked_product_type": "string",
      "position": 0,
      "extension_attributes": {
        "qty": 0
      }
    }
  ],
  "options": [
    {
        "product_sku": "string",
      "option_id": 0,
      "title": "string",
      "type": "string",
      "sort_order": 0,
      "is_require": true,
      "price": 0,
      "price_type": "string",
      "sku": "string",
      "file_extension": "string",
      "max_characters": 0,
      "image_size_x": 0,
      "image_size_y": 0,
      "values": [
        {
            "title": "string",
          "sort_order": 0,
          "price": 0,
          "price_type": "string",
          "sku": "string",
          "option_type_id": 0
        }
      ],
      "extension_attributes": {}
    }
  ],
  "media_gallery_entries": [
    {
        "id": 0,
      "media_type": "string",
      "label": "string",
      "position": 0,
      "disabled": true,
      "types": [
        "string"
    ],
      "file": "string",
      "content": {
        "base64_encoded_data": "string",
        "type": "string",
        "name": "string"
      },
      "extension_attributes": {
        "video_content": {
            "media_type": "string",
          "video_provider": "string",
          "video_url": "string",
          "video_title": "string",
          "video_description": "string",
          "video_metadata": "string"
        }
      }
    }
  ],
  "tier_prices": [
    {
        "customer_group_id": 0,
      "qty": 0,
      "value": 0,
      "extension_attributes": {}
    }
  ],
  "custom_attributes": [
    {
        "attribute_code": "string",
      "value": "string"
    }
  ]
}**/
