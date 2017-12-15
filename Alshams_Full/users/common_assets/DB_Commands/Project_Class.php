<?php
include_once("Connect_DB.php");
include_once("Customer_Class.php");
include_once("User.class.php");
include_once("ProjectType_Class.php");
include_once("CostEstimate.class.php");

 
class project{
    
    public $Id;
    public $LandArea;
    public $LandAddress;
    public $ProjectType;    
    public $ProjectDescription;
    public $ProjectName;
    public $CustomerObj; 
  
    public $mycall;
  
    function __construct($id = ""){

    $this->mycall = ServerCommunications::getInstance();
    $this->LandAddress=new address();
    
    if($id != "")
    {
        $sql = "SELECT * FROM project where id='$id'";

        $result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));

        if($row = mysqli_fetch_array($result))
        {
          $this->Id=$row['id'];
          $this->LandArea=$row['LandArea'];
          $this->LandAddress->id=$row['LandAddress'];
          $this->ProjectType = new ProjectType($row['type']);
          $this->ProjectDescription=$row['Description'];
          $this->ProjectName=$row['Name'];
          $this->CustomerObj = new Customer($row['users_id']);

        }

    }
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

    public function _setPLandArea($area){

      $this->LandArea = $area;
    }

    public function _getPLandArea()
    {
      return $this->LandArea;
    }

    public function _setPLandAddress($address)
    {
      $this->LandAddress = $address;
    }

    public function _getPLandAddress()
    {
      return $this->LandAddress;
    }

    public function _setProjectType($type){

      $this->ProjectType;
    }

    public function _getProjectType()
    {
       return $this->ProjectType;
    }

    public function _setPDescription($describ){

      $this->ProjectDescription = $describ;
    }

    public function _getPDescription(){
      return $this->ProjectDescription;
    }

    public function _setProjectName($name){
      $this->ProjectName = $name;
    }

    public function _getProjectName(){
      return $this->ProjectName;
    }

    public function _setProjectId($id)
    {
      $this->Id = $id;
    }
    public function _getProjectId($PName){


      $sql="SELECT id FROM Project WHERE Name ='$PName'";
      $result=mysqli_query($this->mycall->start,$sql);
$Id=0;
    if ($row=mysqli_fetch_array($result))
    {
      $Id = $row[0];     
    }

      return $Id;
      
    }


static function get_project_names(){

        $mycall = ServerCommunications::getInstance();
        $sql = "SELECT id,name FROM project";
        $result=mysqli_query($mycall->start,$sql);
        $projects;
        $i=0;
        while($data = mysqli_fetch_array($result))
        {
          $projects[$i] = new project();
          $projects[$i]->Id = $data['id'];
          $projects[$i]->ProjectName=$data['name'];
          $i++;
        }
        return $projects;

    } // end of get project names function






} // end of the class 



// $project=new Project(10);
// echo $project->ProjectType->__get("id");
// echo $project->__get("ProjectName");
// echo $project->__get("LandArea");
// echo $project->__get("ProjectDescription");
// echo $project->__get("CustomerObj")->__get("userID");






// $fds =  project::get_project_names();
// echo $fds[0]->ProjectName;
// echo $fds[1]->ProjectName;





?>
