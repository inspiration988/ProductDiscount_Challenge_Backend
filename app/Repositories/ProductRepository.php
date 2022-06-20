<?php

namespace App\Repositories;

use App\Helpers\Product;

/**
 * Class ProductRepository
 * @package App\Repositories
 * @version April 19, 2022, 3:11 pm +03
*/

class ProductRepository
{

    /**
     * convert json data to collection
     */
    public function __construct()
    {
        $jsonData =  json_decode(file_get_contents(storage_path() . "/product.json"), true);
        $this->collection = collect();
        foreach($jsonData['products'] as $productDetail){
                $product = new Product($productDetail);
                $this->collection->push($product);
        }
       

    }

    /**
     * filter products less than custom amount
     * @param int $requestedPrice
     * @return $this
     */
    public function lessThan(int $requestedPrice)
    {

        $this->collection = $this->collection->filter(function ($item ) use ($requestedPrice) {

            return ( $item->getPrice()->getAmount() < (int)$requestedPrice);
        });

        return $this;
    }



    /**
     * @return \Illuminate\Support\Collection
     */
    public function getCollection(){
       
        return $this->collection;
    }


}
