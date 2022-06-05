<?php

namespace Tests\Unit;

use App\Helpers\Discount\DiscountManager;
use App\Helpers\Discount\Rule\DiscountCategory;
use App\Helpers\Discount\Rule\DiscountSku;
use App\Helpers\Product;
use PHPUnit\Framework\TestCase;

class CalculateDiscountTest extends TestCase
{

    /**
     * test to check discount amount is correct or not
     * @return void
     */
    public function test_calculate_final_price()
    {
        $product = [
            'sku' => '000003',
            'price' => 71000,
            'category' => 'boots',
            'name' => 'Ashlington leather ankle boots'
        ];
        $product = new Product($product);

        $discountManager = new DiscountManager($product);
        $discountManager->addRule([DiscountCategory::class, DiscountSku::class]);
        $finalPrice = $discountManager->getFinalPrice();

        $this->assertEquals(49700 , $finalPrice);
    }

    /**
     * test to check max discount amount
     * @return void
     */
    public function test_calculate_max_discount_percentage()
    {
        $product = [
            'sku' => '000003',
            'price' => 71000,
            'category' => 'boots',
            'name' => 'Ashlington leather ankle boots'
        ];
        $product = new Product($product);

        $discountManager = new DiscountManager($product);
        $discountManager->addRule([DiscountCategory::class, DiscountSku::class]);
        $maxDiscount = $discountManager->getMaxPercent();

        $this->assertEquals(30 , $maxDiscount);

    }



}
