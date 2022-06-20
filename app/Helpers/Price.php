<?php

namespace App\Helpers;

class Price
{

    private $currency;
    
    public function __construct($amount , $currency)
    {
        $this->amount = $amount ;
        $this->currency = (new Currency())->setCurrency($currency);
    
    }

    

    public function getCurrency()
    {
        return $this->currency->getCurrency();
    }

    public function getAmount(){
        return $this->amount;
    }

}
