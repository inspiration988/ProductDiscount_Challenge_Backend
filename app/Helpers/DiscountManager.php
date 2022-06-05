<?php
namespace App\Helpers ;

class DisscountManager {

    const Defualt_Currency = "EUR";
   
    public $product;
    public $category;

    public function __construct($product)
    {
        self::$product = $product;
        self::$category = new DiscountCategory;

    }

    public static function getFinalPrice(){
       if( self::$category->match(self::$product) > 0){
        self::$category->apply(self::$product);
       }
    }

    public static function getDisoucntAmount(){
            return  max (self::$category->match(self::$product));
     }

    
}