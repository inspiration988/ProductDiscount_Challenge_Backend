<?php
namespace App\Helpers\Discount;

use App\Helpers\Product;
use phpDocumentor\Reflection\Types\Boolean;

interface DiscountInterface {

    /**
     * check if rule is matched or not
     * @return bool
     */
    public  function match() : bool;

    /**
     * applied rule on product price
     * @return float
     */
    public  function apply() : float;

    }
