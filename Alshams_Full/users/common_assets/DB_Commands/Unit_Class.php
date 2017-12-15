<?php

include_once ("Connect_DB.php");

class Unit 
{
	
	public $UnitName;

	private $mycall;

    function __construct($id=""){

    	$this->mycall = ServerCommunications::getInstance();

    	if($id != "")
    	{
    		$sql = "SELECT * From unit where id = '$id'";
    		$result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));
			if($row = mysqli_fetch_array($result))
			{
				$this->UnitName=$row['name'];
			}
    	}
    }

	public function _setUnitName($name){

		$this->UnitName = $name;
	}

	public function _getUnitName(){

		return $this->UnitName;
	}
}

?>