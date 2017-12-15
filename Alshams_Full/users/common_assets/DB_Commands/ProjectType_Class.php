<?php

include_once ("Connect_DB.php");

class ProjectType  
{
	public  $id;
	public $Name;

	private $mycall;
	
	function __construct($id = "")
	{
		$this->mycall = ServerCommunications::getInstance();

		if($id != "")
		{
			$sql = "SELECT * From project_type where id='$id'";
			$result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));
			if($row = mysqli_fetch_array($result))
			{
				$this->id=$row['id'];
				$this->Name=$row['name'];
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

	public function _setId($id)
	{
		$this->id = $id;
	}

	public function _getId($typename)
	{
	  $sql="SELECT id FROM project_type WHERE name ='$typename'";
      $result=mysqli_query($this->mycall->start,$sql);

    if ($row=mysqli_fetch_array($result))
    {
      $this->id = $row[0];     
    }
		return $this->id;
	}

	public function _setName($name)
	{
		$this->Name = $name;
	}

	public function _getName()
	{
		return $this->Name;
	}

	static function alltypes()
	{
		$mycall = ServerCommunications::getInstance();
		$sql="SELECT * from project_type";
		$array;
		$result=mysqli_query($mycall->start,$sql) or die(mysqli_error($mycall->start));
		$i=0;
		   while($row=mysqli_fetch_array($result))
    {
    	    $array[$i]=new ProjectType($row['id']);
    	    // echo $array[$i]->Name;
    	    $i++;
    }

      return $array;

	}


}


// $ABC = ProjectType::alltypes();


?>