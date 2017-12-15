<?php

include_once ("Connect_DB.php");
include_once ("User.class.php");
include_once ("CostEstimate.class.php");
include_once ("TimePlan_Class.php");


class TechnicalOffice extends User
{
	
	private $mycall;
	
    function __construct(){
		$this->mycall = ServerCommunications::getInstance();
	}


	///Function Assign Cost Estimate, TimePlan, ProjectPlan, Demodulator

	public function AssignCostEstimate($CostEstObj){

		$pname = $CostEstObj->_getProject()->_getProjectName();	
        $pid = $CostEstObj->_getProject()->_getProjectId($pname);
        $sql = "INSERT INTO CostEstimate(Project_id) Values ('$pid')";
        mysqli_query($this->mycall->start,$sql);

        $sql1 = "SELECT id FROM CostEstimate WHERE Project_id = '$pid'";
        $result = mysqli_query($this->mycall->start,$sql1);

       	if($row=mysqli_fetch_array($result))
       		$CostId = $row[0];

        $NoOfItems = $CostEstObj->_getNumberOfItems();
   
		for($i = 0; $i < count($NoOfItems); $i++){

			    $Item = $CostEstObj->_getItems($i);
	        $pInNo = $Item->_getPriceInNumber();
	        $pWritten = $Item->_getPriceWritten();
	        $quan = $Item->_getQuantity();
	        $totalP = $Item->_getTotalPrice();
	        $workState = $Item->_getWorkStatement();

	        $UName = $Item->_getUnit()->_getUnitName();
       		$sql2 = "SELECT id FROM unit WHERE name = '$UName'";
       		$output = mysqli_query($this->mycall->start,$sql2);
       		
       		if($row1 = mysqli_fetch_array($output))
       			$UId = $row1[0];
      
       		$sql3 = "INSERT INTO costestimate_item(CostEstimate_id, price_in_no, price_written, quantity, total_price, Unit_id, work_statement) Values ('$CostId', '$pInNo', '$pWritten', '$quan', '$totalP', '$UId','$workState')";
      
       		mysqli_query($this->mycall->start,$sql3);
		}
       
	}


  public function AssignTimePlan($TimePlanObj){

      $pname = $TimePlanObj->_getTimePlanProject()->_getProjectName();  
      $pid = $TimePlanObj->_getTimePlanProject()->_getProjectId($pname);
      $GracePer = $TimePlanObj->_getGracePeriod();
      $sql = "INSERT INTO timeplan(Project_id, GracePeriod) Values ('$pid', '$GracePer')";
      mysqli_query($this->mycall->start,$sql);

      $sql1 = "SELECT idTimePlan FROM timeplan WHERE Project_id = '$pid'";
        $result = mysqli_query($this->mycall->start,$sql1);

        if($row=mysqli_fetch_array($result))
          $TimePlanId = $row[0];
        

      $NumberOfStages = $TimePlanObj->_getNumberOfTimePlanStages(); 

     for($i=0; $i< count($NumberOfStages); $i++){
      $Stage = $TimePlanObj->_getTimePlanStage($i);
        $TimePDesc = $Stage->_getStageDesc();
        $TimePFrom = $Stage->_getDurationFrom();
        $TimePTo = $Stage->_getDurationTo();
        $stageName = $Stage->_getStageName();
        $TimeStageId = $Stage->_getStageNameId($stageName);


       $sql3 = "INSERT INTO timeplan_stage(Description, Duration_From, Duration_To, stage, TimePlan_id) Values ('$TimePDesc', '$TimePFrom', '$TimePTo', '$TimeStageId', '$TimePlanId')";
      
          mysqli_query($this->mycall->start,$sql3);

     }
     
  }
  



    public function AssignProjectPlan($ProjectPlanObj){
    
    	$this->mycall = ServerCommunications::getInstance();
       $Proname = $ProjectPlanObj->_getprojectplan()->_getProjectName();
       $pid = $ProjectPlanObj->_getprojectplan()->_getProjectId($Proname);
       $projectManager = $ProjectPlanObj->_getprojectManager();
       $Storekeeper = $ProjectPlanObj->_getStorekeeper();
       $LocAccountant = $ProjectPlanObj->_getLocAccountant();
       $implementationEng = $ProjectPlanObj->_getimplementationEng();
       $No_of_civil_Eng = $ProjectPlanObj->_getNo_of_civil_Eng();
       $No_of_Arctictects = $ProjectPlanObj->_getNo_of_Arctictects();
       $No_of_electricals = $ProjectPlanObj->_getNo_of_electricals();
       $No_of_Mechanicals = $ProjectPlanObj->_getNo_of_Mechanicals();
       $sql = "INSERT INTO projectplan(Project_id, Project_Manager, Store_keeper, Location_Accountant, Implementation_Engineer, no_of_civil_engineers, no_of_architects, no_of_electricals ,no_of_mechanicals) Values ('$pid', '$projectManager', '$Storekeeper', '$LocAccountant', '$implementationEng', '$No_of_civil_Eng', '$No_of_Arctictects', '$No_of_electricals', '$No_of_Mechanicals')";
        mysqli_query($this->mycall->start,$sql);
       	
       	$sql2 = "SELECT id FROM projectplan WHERE Project_id = '$pid'";
        $result = mysqli_query($this->mycall->start,$sql2);

        if($row=mysqli_fetch_array($result))
          $Projectplanid = $row[0];

}



static function getProject_invoice($ID)
{

  $mycall = ServerCommunications::getInstance();
  $userData;
  $array_of_items;
  $project_data;
  $array_of_returned_data;
  $i=0;
  
  // user  data
  $syntax1 = "SELECT id, users_id FROM project WHERE id = '$ID' ";
  $requests1 = mysqli_query($mycall->start , $syntax1);
  if($data = mysqli_fetch_array($requests1))
  {
    $userData = new Customer($data["users_id"]);
    $array_of_returned_data[0] = $userData;
    $project_data = new project($data["id"]);
    $array_of_returned_data[1] = $project_data;
  }

  // duration of assigned cost estimate
    $syntax44 = "SELECT * FROM `assigned_cost_statement` WHERE Project_id = $ID ";
    $requests44 = mysqli_query($mycall->start , $syntax44);
    if($data = mysqli_fetch_array($requests44))
    {
      $array_of_returned_data[3] = $data["start_date"];
      $array_of_returned_data[4] = $data["end_date"];
    }


  // array of items
  $syntax2 = "SELECT id FROM `costestimate_item` WHERE CostEstimate_id = $ID ";
  $requests2 = mysqli_query($mycall->start , $syntax2);
    


    $i=5;
    while($data = mysqli_fetch_array($requests2))
    {
    $array_of_returned_data[$i] = new Item($data['id']);
    // echo "<br/>answer is: " . $array_of_returned_data[$i]->WorkStatement;
    $i++; 
    }


return $array_of_returned_data;
}


} //end of the class

	

 // $addresssa = address::get_Address_Date(1);

// $testCase = TechnicalOffice::getProject_invoice(7);

// echo count($testCase);
// // user is now activate ^_^ 
//  echo "<br/>email:". $testCase[0]->Email ;
 // echo "<br/>Street:". $testCase[0]->Street->name;

// echo $testCase[1]->ProjectType->Name;

// //items are ready
//  for($i=5; $i<count($testCase); $i++)
// {
//    echo "<br/>item number is:" .$testCase[$i]->id;
// } 


//  $addresssa = address::get_Address_Date(1);
//   echo "count: ". count($addresssa);
// echo "<br/>street name: ". $addresssa[0]->name;

// echo "<br/>city b2a wnby : ". $addresssa[1]->name;

// echo "<br/>elcountry allah y5alik : ". $addresssa[2]->name;


?>