<?php

namespace App\Helpers;

use App\Helpers\Discount\DiscountManager;
use App\Helpers\Discount\Rule\DiscountCategory;
use App\Helpers\Discount\Rule\DiscountSku;
use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $discountManager = new DiscountManager($this);
        $discountManager->addRule([
            DiscountCategory::class ,
            DiscountSku::class
        ]);


        return [
            'sku' => $this['sku'],
            'category' => $this['category'],
            'name' => $this['name'],
            'price' => [
                'original' => $this['price'] ,
                'final' => $discountManager->getFinalPrice() ,
                'discount_percentage' => $discountManager->getMaxPercent() ,
                'currency' => DiscountManager::Defualt_Currency
            ]

        ];
    }


}
