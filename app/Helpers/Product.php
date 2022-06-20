<?php

namespace App\Helpers;

class Product
{

    protected $property;
    protected $price;

    public function __construct(array $property)
    {
        $this->property = $property;
    }

    public function getPrice()
    {
        if (is_null($this->price)) {
            $this->price = new Price($this->property['price'], $this->property['currency'] ?? Currency::getDefaultCurrency());
        }
        return $this->price;
    }

    public function setPrice()
    {
        /**
          @todo
         */
    }

    public function getAttribute($name){
        return $this->property[$name]?? null ;
        
    }

    public function getAttributes(){
        return $this->property;
    }
}
