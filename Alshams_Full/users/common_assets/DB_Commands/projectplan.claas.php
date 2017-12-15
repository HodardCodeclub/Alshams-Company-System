<?php 
	include_once("Connect_DB.php");
    include_once("Project_Class.php");
    include_once("Project_Class.php");
class projectplan{

	private $id;
	private $projectManager;
	private $Storekeeper;
	private $LocAccountant;
	private $implementationEng;
	
	private $No_of_civil_Eng;
	private $No_of_Arctictects;
	private $No_of_electricals;
	private $No_of_Mechanicals;
	private $projectobj;
	private $mycall;


	function __construct($id="")
	{
		$mycall = ServerCommunications::getInstance();
	    $projectobj = new project();
		$Items[] = new Item();
	}
// end of constructor
/*public function __get($property) {
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
*/	

  public function _setprojectManager($projectManager){

		$this->projectManager = $projectManager;
	}

	public function _getprojectManager(){

		return $this->projectManager;
	}
	  public function _setStorekeeper($Storekeeper){

		$this->Storekeeper = $Storekeeper;
	}

	public function _getStorekeeper(){

		return $this->Storekeeper;
	}
	  public function _setLocAccountant($LocAccountant){

		$this->LocAccountant = $LocAccountant;
	}

	public function _getLocAccountant(){

		return $this->LocAccountant;
	}
	  public function _setimplementationEng($implementationEng){

		$this->implementationEng = $implementationEng;
	}

	public function _getimplementationEng(){

		return $this->implementationEng;
	}
	  public function _setNo_of_civil_Eng($No_of_civil_Eng){

		$this->No_of_civil_Eng = $No_of_civil_Eng;
	}

	public function _getNo_of_civil_Eng(){

		return $this->No_of_civil_Eng;
	}
	  public function _setNo_of_Arctictects($No_of_Arctictects){

		$this->No_of_Arctictects = $No_of_Arctictects;
	}

	public function _getNo_of_Arctictects(){

		return $this->No_of_Arctictects;
	}
	public function _setNo_of_electricals($No_of_electricals){

		$this->No_of_electricals = $No_of_electricals;
	}

	public function _getNo_of_electricals(){

		return $this->No_of_electricals;
	}
	public function _setNo_of_Mechanicals($No_of_Mechanicals){

		$this->No_of_Mechanicals = $No_of_Mechanicals;
	}

	public function _getNo_of_Mechanicals(){

		return $this->No_of_Mechanicals;
	}
	public function _setprojectplan($projectobj){

		$this->projectobj = $projectobj;
	}

	public function _getprojectplan(){

		return $this->projectobj;
	}
	
} // end of projectplan class


?>