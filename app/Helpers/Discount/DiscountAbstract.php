<?php
namespace App\Helpers\Discount;


use App\Helpers\ProductResource;
use phpDocumentor\Reflection\Types\Boolean;
use App\Helpers\Product;

abstract  class DiscountAbstract {

    protected  $product = [];
    protected float $discountPercent = 0.0;

    /**
     * @param Product $product
     */
    public function __construct(ProductResource|Product $product){
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
