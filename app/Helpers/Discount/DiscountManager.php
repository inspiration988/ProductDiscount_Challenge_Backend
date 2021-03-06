<?php
namespace App\Helpers\Discount ;

use App\Helpers\Discount\Rule\DiscountCategory;
use App\Helpers\Product;
use App\Helpers\ProductResource;

class DiscountManager {

    
    protected ProductResource|Product $product;
   

    protected array $_rules = [];

    protected ?float $_finalPrice = null;
    protected ?float $_maxPercent = null;


    /**
     * @param $product
     */
    public function __construct($product)
    {
     
       $this->product = $product;
      
    }

    /**
     * calculate final price after appling discount
     * @return null
     */
    public function getFinalPrice(){

        $this->_calculate();
        return $this->_finalPrice;
    }

    /**
     * calculate max discount
     * @return null
     */
    public function getMaxPercent(){
        $this->_calculate();
        return $this->_maxPercent;
    }

    /**
     * take rules as array and if rule is match for product apply discount
     * @return void
     */
    private function _calculate(){
        // Prevent Multi calculate

        if($this->_finalPrice == null){
            
            $this->_finalPrice = $this->product->getPrice()->getAmount();

            if(count($this->_rules)){
                $this->_maxPercent = 0.0;
                foreach ($this->_rules as $rule){
                    /**
                     * @var $rule DiscountCategory
                     */
                    $ruleClass = new $rule($this->product);
                    if(($ruleClass->match()) &&  ($this->_maxPercent < $ruleClass->getPercent())){
                            $this->_finalPrice = $ruleClass->apply();
                            $this->_maxPercent = $ruleClass->getPercent();   
                    }
                }
            }

        }
    }

    /**
     * add each class discount rule in array
     * @param $discountRuleClassName
     * @return $this
     */
    public function addRule($discountRuleClassName)
    {
        if(is_array($discountRuleClassName)){
            $this->_rules = array_merge($this->_rules,  $discountRuleClassName);
        }else{
            $this->_rules[] = $discountRuleClassName;
        }
        return $this;
    }


}
