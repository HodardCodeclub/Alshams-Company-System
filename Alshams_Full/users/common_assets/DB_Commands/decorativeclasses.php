<?php

abstract class Amount{
	public $value;
	function __construct($newvalue){
		$this->value=$newvalue;

	}


    public function getvalue()
    {
    	return $this->value;
    }

    abstract function calculate();
}

class AmountTax extends Amount{

		function __construct($newvalue){
		$this->value=$newvalue;
	}

     function calculate()
    {
return "";

    }

}

abstract class valueDecorator extends Amount{
	    function getvalue(){
	    	return $this->value;
	    }
}


 class Value_With_IntegratedWorksTax extends valueDecorator
 {
 	protected $amount;

 		function __construct(Amount $newamount)
	{
		$this->amount=$newamount;

    }
    function getvalue()
    {
    	$this->amount->getvalue();

    }
    function calculate()
    {
    	$result=($this->amount->value*7)/100;
    	return $result;
    }

 }
  class Value_With_AdditionalItemTax extends valueDecorator
 {
 	protected $amount;
 		function __construct(Amount $newamount)
	{
		$this->amount=$newamount;

    }
    function getvalue()
    {
    	$this->v=$this->amount->getvalue();

    }
    function calculate()
    {

    	$result=($this->amount->value*10)/100;
    	return $result;
    }

 }


   class Value_With_InsuranceItemTax extends valueDecorator
 {
 	protected $amount;
 		function __construct(Amount $newamount)
	{
		$this->amount=$newamount;

    }
    function getvalue()
    {
    	$this->amount->getvalue();

    }
    function calculate()
    {

    	$result=($this->amount->value*2.8)/100;
    	return $result;
    }

 }

// $amount=new AmountTax(5);
// $amount1=new AmountTax(5);
// $amount2=new AmountTax(5);

// $amount=new Value_With_AdditionalItemTax($amount);
// echo $amount->calculate();

// $amount1=new Value_With_InsuranceItemTax($amount1);
// echo $amount1->calculate();

// $amount2=new Value_With_IntegratedWorksTax($amount2);
// echo $amount2->calculate();


?>