<?php
namespace App\Helpers\Discount\Rule;

use App\Helpers\Discount\DiscountAbstract;
use App\Helpers\Discount\DiscountInterface;
use App\Helpers\Product;

class DiscountCategory extends DiscountAbstract implements DiscountInterface {

    private string $discountCategory = "boots";
    protected float $discountPercent = 30;

    /**
     * @return bool
     */
    public function match(): bool
    {
        return (bool) ($this->product['category'] === $this->discountCategory);
    }


    /**
     * @return float
     */
    public function apply(): float
    {
        return (float) $this->product['price'] - (($this->discountPercent * $this->product['price']) / 100) ;
    }
}

