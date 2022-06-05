<?php

namespace App\Repositories;


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
        $this->collection = collect($jsonData['products']);

    }

    /**
     * filter products less than custom amount
     * @param int $requestedPrice
     * @return $this
     */
    public function lessThan(int $requestedPrice)
    {

        $this->collection = $this->collection->filter(function ($item ) use ($requestedPrice) {

            return ( $item['price'] < (int)$requestedPrice);
        });

        return $this;
    }

    /**
     * filter products equal to custom filed
     * @param array $filters
     * @return $this
     */
    public function equal(array $filters = [])
    {

       if(!empty($filters)){
           foreach($filters as $key=>$value){
            $this->collection = $this->collection->where($key , $value);
           }
       }

        return $this ;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getCollection(){
        return $this->collection;
    }
}
