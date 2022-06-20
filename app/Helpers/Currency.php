<?php

namespace App\Helpers;

class Currency
{

    private  static $defult_curency = "EUR";
    protected $currency = null;

    public  function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }
    public  function getCurrency()
    {
        return  $this->currency;
    }

    public static function getDefaultCurrency(){
        return self::$defult_curency;
    }
}
