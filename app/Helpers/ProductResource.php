<?php

namespace App\Helpers;

use App\Helpers\Discount\DiscountManager;
use App\Helpers\Discount\Rule\DiscountCategory;
use App\Helpers\Discount\Rule\DiscountSku;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'sku' => $this->getAttribute('sku'),
            'category' => $this->getAttribute('category'),
            'name' => $this->getAttribute('name'),
            'price' => [
                'original' => $this->getPrice()->getAmount() ,
                'final' => $discountManager->getFinalPrice() ,
                'discount_percentage' => $discountManager->getMaxPercent() ,
                'currency' => $this->getPrice()->getCurrency()
            ]

        ];
    }

   

}
