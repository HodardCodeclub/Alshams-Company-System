<?php

include_once ("Connect_DB.php");
include_once ("Unit_Class.php");


class Item 
{
	public $id;
	public $ItemNo;    //not in database
	public $WorkStatement;
	public $Quantity;
	public $PriceInNumber;
	public $PriceWritten;
	public $TotalPrice;
	public $UnitObj;

	private $mycall;
		
    function __construct($id = ""){

    	$this->mycall = ServerCommunications::getInstance();
    	$UnitObj = new Unit();

    	if($id != "")    //hena moshkla hatrg3 bas awel item tela2eh
    	{
    		$sql = "SELECT * FROM costestimate_item WHERE id = '$id'";
    		$result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));
			if($row = mysqli_fetch_array($result))
			{
				$this->WorkStatement=$row['work_statement'];
				$this->Quantity=$row['quantity'];
				$this->PriceInNumber=$row['price_in_no'];
				$this->PriceWritten=$row['price_written'];
				$this->TotalPrice=$row['total_price'];
				$this->id = $row['id'];
				$this->UnitObj= new Unit($row['Unit_id']);
				// echo "<br/>item number  in constructor is:" .$this->id;
			}
    	}		
	}

	public function _setItemNo($itemNo){
		$this->ItemNo = $itemNo;
	}

	public function _getItemNo(){
		return $this->ItemNo;
	}

	public function _setWorkStatement($workState){

		$this->WorkStatment = $workState;
	}

	public function _getWorkStatement(){

		return $this->WorkStatment;
	}

	public function _setQuantity($quantity){

		$this->Quantity = $quantity;
	}

	public function _getQuantity(){

		return $this->Quantity;
	}

	public function _setPriceInNumber($priceNo){

		$this->PriceInNumber = $priceNo;
	}

	public function _getPriceInNumber(){

		return $this->PriceInNumber;
	}

	public function _setPriceWritten($priceWritt){

		$this->PriceWritten = $priceWritt;
	}

	public function _getPriceWritten(){

		return $this->PriceWritten;
	}

	public function _setTotalPrice($totalPrice){

		$this->TotalPrice = $totalPrice;
	}

	public function _getTotalPrice()
	{
		return $this->TotalPrice;
	}


  	public function _setUnit($unit){

  		$this->UnitObj = $unit;
  	}

  	public function _getUnit(){

  		return $this->UnitObj;
  	}
}

 // $testCase = new Item(7);

 // echo "result:".$testCase->id;
?>