<?php
include_once("Connect_DB.php");
include_once("PriceOfferingDataClass.php");
class PricingData{
	public $pricingnumber;
	public $pricingcase;
	public $notebookpricingnumber;
	public $POD;
	public $mycall;


	function __construct(){

		$this->mycall = ServerCommunications::getInstance();
		$this->POD=new Price_Offering_Data();
	}
 public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

  public function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }
   return $this;
  }

}




?>