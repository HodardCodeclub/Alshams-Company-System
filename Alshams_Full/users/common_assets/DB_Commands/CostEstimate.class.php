<?php

include_once("Connect_DB.php");
include_once ("Item_Class.php");
include_once("Project_Class.php");

class CostEstimate{
   
    public $ProjectObj;
    public $Items;
    private $mycall;
	
    function __construct($id=""){
    
    $this->mycall = ServerCommunications::getInstance();
		
		$ProjectObj = new Project();
		$Items[] = new Item();

		if($id != "")
		{
			$sql = "SELECT * From costestimate where id = $id";
			$result = mysqli_query($this->mycall->start,$sql);

			if($row=mysqli_fetch_array($result)){

			 echo "project ID: ". $row['Project_id'];
			 $this->ProjectObj->_setProjectId($row['Project_id']);  //hena ana ba2a ma3aya project id aro7 ageb object men class project malyan bel constructor wala zay mana 3amla
			}

			$sql2 = "SELECT * FROM costestimate_item,costestimate where costestimate.id = costestimate_item.CostEstimate_id and costestimate.id = '$id'";
			$result2 = mysqli_query($this->mycall->start,$sql2);
			$i=0;
			while($row2= mysqli_fetch_array($result2))
			{
	
				// $this->$Items[$i]->ItemNo=$row2['id'];   ///missing in database wala dah el autoincrement?
				$this->$Items[$i]->_setWorkStatement($row2['work_statement']);
				$this->$Items[$i]->_setQuantity($row2['quantity']);
				$this->$Items[$i]->_setPriceInNumber($row2['price_in_no']);
				$this->$Items[$i]->_setPriceWritten($row2['price_written']);
				$this->$Items[$i]->_setTotalPrice($row2['total_price']);
				$this->$Items[$i]->_setUnit($row2['Unit_id']);
				$i++;

			}
		}
	}


	public function _setProject($ProjObj){
		$this->ProjectObj = $ProjObj;

	}

	public function _getProject(){
		return $this->ProjectObj;
	}

	public function _setItems($items,$index){

		$this->Items[$index] = $items;
	}

	public function _getItems($index){

		return $this->Items[$index];
	}

	public function _getNumberOfItems()
	{
		return $this->Items;
	}

}
?>