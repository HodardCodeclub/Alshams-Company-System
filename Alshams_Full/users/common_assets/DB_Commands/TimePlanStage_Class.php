<?php

include_once ("Connect_DB.php");

class TimePlanStage 
{
	
	private $Id;
	private $From;
	private $To;
	private $Description;
	private $StageName;

	private $mycall;
	
    function __construct($id = ""){

    	$this->mycall = ServerCommunications::getInstance();

    	if($id != "")    // nafs el fekra haygeb awel wa7da bas
    	{
    		$sql = "SELECT * From timeplan_stage where id = '$id' ";
    		$result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));
			if($row = mysqli_fetch_array($result))
			{
				$this->Id=$row['id'];
				$this->From=$row['Duration_From'];
				$this->To=$row['Duration_To'];
				$this->Description=$row['Description'];

				$StageId=$row['stage'];
				$sql2 = "SELECT name From stages where id = '$StageId' ";
    		    $result2=mysqli_query($this->mycall->start,$sql2) or die(mysqli_error($this->mycall->start));
				
				if($row2 = mysqli_fetch_array($result2))
				{
					$this->StageName = $row2['name'];
				}


			}
    	}

    }

	public function _setDurationFrom($Dfrom){

		$this->From = $Dfrom;
	}

	public function _getDurationFrom(){

		return $this->From;
	}

	public function _setDurationTo($Dto){

		$this->To = $Dto;
	}

	public function _getDurationTo(){

		return $this->To;
	}

	public function _setStageDesc($SDesc){

		$this->Description = $SDesc;
	}

	public function _getStageDesc(){

		return $this->Description;
	}

	public function _setStageName($name){

		$this->StageName = $name;
	}

	public function _getStageName()
	{
		return $this->StageName;
	}
	
	public function _getStageNameId($name)
	{

	  $sql="SELECT id FROM stages WHERE name ='$name'";
      $result=mysqli_query($this->mycall->start,$sql);

    if ($row=mysqli_fetch_array($result))
    {
      $this->Id = $row[0];     
    }

      return $this->Id;
	
	}
}

?>