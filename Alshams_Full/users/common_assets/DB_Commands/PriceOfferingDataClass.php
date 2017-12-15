<?php
include_once("Connect_DB.php");
class Price_Offering_Data{


	private $priceOfferingNumber;
	private $priceOfferingCase;
	private $priceOfferingNotebook;
	private $numberpayments;
	private $quantityPerEach;
	public $mycall;



	function __construct(){

		$this->mycall = ServerCommunications::getInstance();
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