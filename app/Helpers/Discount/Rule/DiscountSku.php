<?php
namespace App\Helpers\Discount\Rule;

use App\Helpers\Discount\DiscountAbstract;
use App\Helpers\Discount\DiscountInterface;
use App\Helpers\Product;

class DiscountSku extends DiscountAbstract implements DiscountInterface {

    private string $discountSku= "000003";
    protected float $discountPercent = 15;

    /**
     * @return bool
     */
    public function match(): bool
    {
        return (bool) ($this->product['sku'] === $this->discountSku);
    }

    /**
     * @return float
     */
    public function apply(): float
    {
        return (float) $this->product['price'] - (($this->discountPercent * $this->product['price']) / 100) ;
    }
}

