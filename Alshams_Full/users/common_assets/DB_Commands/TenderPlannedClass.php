<?php

include_once("Connect_DB.php");
class TenderData{
	private $tendernumber;
	private $owner;
	private $tendercase;
	private $tenderdescription;
	public $mycall;



			    function __construct($id=""){
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