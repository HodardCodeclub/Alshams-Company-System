<?php

include_once ("Connect_DB.php");
include_once ("Project_Class.php");
include_once ("TimePlanStage_Class.php");
include_once ("project_Manager.class.php");


class TimePlan 
{
	
	private $Id;
	private $GracePeriod;
	private $ProjectObj;
	private $TimePlanStage;
	private $mycall;

	
    function __construct($id=""){

    	$this->mycall = ServerCommunications::getInstance();
    	
    	$this->TimePlanStage[] = new Timeplan_stage();
    	$this->ProjectObj=new Project();

    	if($id != "")
    	{
    		$sql = "SELECT * FROM timeplan where idTimePlan = '$id'";
    		$result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));
			if($row = mysqli_fetch_array($result))
			{
				$this->Id=$row['idTimePlan'];
				$this->GracePeriod=$row['GracePeriod'];
				$this->ProjectObj = new Project($row['Project_id']);
			}

			$sql1= "SELECT * FROM timeplan_stage where TimePlan_id = '$id'";
			$result1=mysqli_query($this->mycall->start,$sql1) or die(mysqli_error($this->mycall->start));
			$i=0;
			while($row1 = mysqli_fetch_array($result1))
			{
				$this->TimePlanStage[$i] = new Timeplan_stage($row1['idTimePlan_Stage']);
				$i++;
			}

    }
}
// static function selectalltimeplans()
// {



// }

	public function _setGracePeriod($period){

		$this->GracePeriod = $period;
	}

	public function _getGracePeriod(){

		return $this->GracePeriod;
	}

	public function _setTimePlanProject($ProjObj){
		$this->ProjectObj = $ProjObj;
	}

	public function _getTimePlanProject(){

		return $this->ProjectObj;

	}

	public function _setTimePlanStage($TimePStage,$index){

		$this->TimePlanStage[$index] = $TimePStage;
	}

	public function _getTimePlanStage($index){

		return $this->TimePlanStage[$index];
	}

	public function _getNumberOfTimePlanStages(){

		return $this->TimePlanStage;
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
// $h=new TimePlan(1);
// echo $h->__get("ProjectObj")->__get("Id");

?>