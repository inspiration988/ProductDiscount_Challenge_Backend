<?php
namespace App\Helpers\Discount;

use App\Helpers\Product;
use phpDocumentor\Reflection\Types\Boolean;

abstract  class DiscountAbstract {

    protected  $product = [];
    protected float $discountPercent = 0.0;

    /**
     * @param Product $product
     */
    public function __construct(Product $product){
        $this->product = $product;
    }

    /**
     * @return float
     */
    public function getPercent(): float
    {
        return $this->discountPercent;
    }


}
