<?php 
include_once("User.class.php");
include_once("Connect_DB.php");
include_once("Ireport.php");
include_once("Project_Class.php");



class project_Manager extends user{

	public $project_Manager_user; // object of user class 
  public $mycall;


   function __construct($id=""){


    $this->mycall = ServerCommunications::getInstance();

		if($id !="")
		{
			
			$this->project_Manager_user = new users($id);
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

//   function ViewReport($reportname)
//   {
//   //           $name = "%".$reportname."%";

//   //   $sql="SELECT sql_statement FROM report where name LIKE '$name'";
//   //   $result=mysqli_query($this->mycall->start,$sql);

//   //     if (!$result) {
//   //   die('Invalid query: ' . mysqli_error($this->mycall->start));
//   // }

//   //           if($row = mysqli_fetch_array($result))
//   //       {
//   //         $statement=$row['sql_statement'];          
//   //       }

//   //       $sql1='"',$statement,'"';
//   //       $result1=mysqli_query($this->mycall->start,$sql1);

//   //           if($row1 = mysqli_fetch_array($result1))
//   //       {
//   //         $TimePlanStages[]= new $row['sql_statement'];          
//   //       }


// }
Static function allstages()
{
            $mycall = ServerCommunications::getInstance();

  $sql="SELECT * from timeplan_stage";
  $result = mysqli_query($mycall->start , $sql) or die(mysqli_error($mycall->start));
          while($row = mysqli_fetch_array($result))
          {
            $stages[]=new Timeplan_stage($row['idTimePlan_Stage']);
          }
          return $stages;
}

static function ViewProjectState($projectname)
{
          $mycall = ServerCommunications::getInstance();
          $TimePlanStages[]=new Timeplan_stage();

  $name="%".$projectname."%";
    $sql1="SELECT id FROM project WHERE Name LIKE '$name'";
    $result1=mysqli_query($mycall->start,$sql1);
    $id=0;
    while($row1 = $result1->fetch_assoc()){
      $id=$row1['id'];
    }
  $sql="SELECT * FROM project,timeplan,timeplan_stage where project.id='$id' AND  project.id=timeplan.Project_id AND timeplan_stage.TimePlan_id=timeplan.idTimePlan";

      $result=mysqli_query($mycall->start,$sql);

       if (!$result) {
    die('Invalid query: ' . mysqli_error($mycall->start));
   }
               while($row = mysqli_fetch_array($result))
        {
           $TimePlanStages[]=new Timeplan_stage($row['idTimePlan_Stage']); 
        }
        return $TimePlanStages;

}

} // end of project_Manager class



/* have timeplan + stage*/
class Timeplan_stage
{

    public $id;
    public $duration; // array
    public $Description;
    public $from;
    public $to;
    public $stage;
    public $num; // they don't have it schema (bs done 3ndy) w array of 2 variables
    private $mycall;
    private $timeplanid;

   function __construct($id=""){

      $this->mycall = ServerCommunications::getInstance();

    if($id !="")
    {
        $syntax = "SELECT * FROM `timeplan_stage` WHERE timeplan_stage.idTimePlan_Stage ='$id' ";
        $Views = mysqli_query($this->mycall->start , $syntax) or die(mysqli_error($this->mycall->start));
        if($data = mysqli_fetch_array($Views))
          {
            $this->id = $data["idTimePlan_Stage"];
            $this->from = $data["Duration_From"];
            $this->to = $data["Duration_To"];
            $this->Description = $data["Description"];
            $this->duration = $this->calculate_duration($this->from,$this->to);
            $this->num=$data["stage"];
            $this->stage = new stages($data["stage"]);
            $this->timeplanid=$data["TimePlan_id"];

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


  /* ordered by the nearly finished projects */
  static function select_stage($stage_number)
  {

        $mycall = ServerCommunications::getInstance();
        $Stage_Project;

        $syntax = "SELECT * FROM `timeplan_stage` WHERE timeplan_stage.stage = '$stage_number' ORDER BY DATE(Duration_To) DESC";
        $Views = mysqli_query($mycall->start , $syntax);
        $i = 0;

        // if nothing inside the table , echo sth else

        while ($data = mysqli_fetch_array($Views)) {
        $Stage_Project[$i] = new Timeplan_stage($data["idTimePlan_Stage"]);
        $i++;

        }
  
      // mysqli_close($mycall);
      return $Stage_Project;

  }



    function calculate_duration($from,$to)
  {
     $diff = abs(strtotime($from) - strtotime($to));
     $years = floor($diff / (365*60*60*24));
     $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
     $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
     $soka =  $years." years," .$months. " months," .$days. " days";
     return $soka;  
  }

} // end of timeplan_stage class



class stages{

    public $id;
    public $name;
    public $mycall;

    function __construct($id = ""){

        $this->mycall = ServerCommunications::getInstance();

    if($id!= "")
    {
          $syntax = "SELECT * FROM `stages` WHERE stages.id ='$id' ";
          $Views = mysqli_query($this->mycall->start , $syntax) or die(mysqli_error());

          if($data = mysqli_fetch_array($Views))
          {
            $this->id = $data["id"];
            $this->name = $data["name"];
          }
          
    }
  }


  static function get_AllStages()
  {
    $mycall = ServerCommunications::getInstance();
    $syntax = "SELECT * FROM stages ";
    $Views = mysqli_query($mycall->start , $syntax);
    $T_stages;
    $i =0;
    while ($row = mysqli_fetch_array($Views)) {
      
      $T_stages[$i] = new stages($row["id"]);
      $i++;

    }
    return $T_stages;
  } //end of get_allstages function

}

 // end of stages class
// $manager=new project_Manager();
// $array=$manager::allstages();
//  for($i=0;$i<sizeof($array);$i++)
//  {
//    echo $array[$i]->Description;
// }

// $array=new Timeplan_stage(1);
// echo $array->stage->name;
?>