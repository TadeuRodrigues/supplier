<?php

namespace Iqmosaic\InventoryPrice\Pricing;

use Magento\Framework\Pricing\Adjustment\AdjustmentInterface;
use Magento\Framework\Pricing\SaleableInterface;

use Magento\Framework\Pricing\PriceCurrencyInterface;

class Adjustment implements AdjustmentInterface
{
    const ADJUSTMENT_CODE = "supplier";

    /**
     * Sort order
     *
     * @var int|null
     */
    protected $sortOrder;

    /**
     * @var PriceCurrencyInterface
     */
    protected $priceCurrency;

    public function __construct(
        PriceCurrencyInterface $priceCurrency,
        $sortOrder = null
    )
    {
        $this->priceCurrency = $priceCurrency;
        $this->sortOrder = $sortOrder;
    }

    public function getAdjustmentCode()
    {
        return self::ADJUSTMENT_CODE;
    }

    public function isIncludedInBasePrice()
    {
        // TODO: Implement isIncludedInBasePrice() method.
    }

    public function isIncludedInDisplayPrice()
    {
        return true;
    }

    public function extractAdjustment($amount, SaleableInterface $saleableItem, $context = [])
    {
        return 0;
    }

    public function applyAdjustment($amount, SaleableInterface $saleableItem, $context = [])
    {
        $cont = $context;
        return 1000;
    }

    public function isExcludedWith($adjustmentCode)
    {
        return (($adjustmentCode == self::ADJUSTMENT_CODE) ||
            ($adjustmentCode == \Magento\Tax\Pricing\Adjustment::ADJUSTMENT_CODE));
    }

    public function getSortOrder()
    {
        return $this->sortOrder;
    }
}
