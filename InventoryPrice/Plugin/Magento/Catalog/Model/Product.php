<?php

namespace Iqmosaic\InventoryPrice\Plugin\Magento\Catalog\Model;

use Magento\Catalog\Api\Data\ProductInterface;

use Iqmosaic\InventoryPrice\Model\ResourceModel\InventoryPrice as Resource;
use Iqmosaic\InventoryPrice\Api\Data\InventoryPriceInterfaceFactory;

class Product
{
    protected $resource;

    protected $inventoryPrice;

    public function __construct(
        Resource $resource,
        InventoryPriceInterfaceFactory $inventoryPrice
    ) {
        $this->resource = $resource;
        $this->inventoryPrice = $inventoryPrice;
    }

    public function aroundGetPrice(
        ProductInterface $subject,
        \Closure $proceed
    ) {
        $sku = $subject->getSku();

        $inventoryPrice = $this->inventoryPrice->create();
        $this->resource->load($inventoryPrice, $sku);

//        $result = $proceed();
        return $inventoryPrice->getPrice();
    }
}