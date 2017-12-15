<?php
include_once("Connect_DB.php");

class userTypes{

	public $id;
	public $userType_name;
	private $ArrayOfPAges;
	private $mycall;


	function __construct($id="")
	{
		$this->mycall = ServerCommunications::getInstance();
		if($id !="")
		{
			$syntax = "SELECT * FROM `usertype` WHERE usertype.id ='$id' ";
			$Views = mysqli_query($this->mycall->start , $syntax);

			if($data = mysqli_fetch_array($Views))
			{
				$this->id = $data["id"];
				$this->userType_name = $data["name"];
				$syntax = "SELECT * FROM `accessability` WHERE accessability.usertype_id = '$this->id' ";
				$Views = mysqli_query($this->mycall->start , $syntax);
				$URL_pages;
				$i = 0;
				while ($data = mysqli_fetch_array($Views))
				{
				$URL_pages[$i] = new pagesURLs($data["url_id"]);
				$i++;
				}
			}
		}
	
	// mysqli_close($this->mycall);

		
	} // end of constructor


	static function getAlluserTypes()
	{
			$mycall = ServerCommunications::getInstance();

				$syntax = "SELECT id, name FROM `usertype`"; // not complete anyway
				$Views = mysqli_query($mycall->start , $syntax);
				$AlluserTypes;
				$i = 0;
				while ($data = mysqli_fetch_array($Views))
				{
				$AlluserTypes[$i] = new userTypes($data["id"]);
				$i++;
				}
		// mysqli_close($mycall);
		return $AlluserTypes;
	} // end of all get alll url names function


} // end of userType class


class pagesURLs{

	public $ID;
	public $friendly_name;
	public $physicalAddress;
	public $Page_id;
	protected $mycall;

	private $ArrayOfPageContent;

	function __construct($id="")
	{
		$this->mycall = ServerCommunications::getInstance();

		if($id !="")
		{
			$syntax = "SELECT * FROM `url` WHERE url.id ='$id' "; // wrong anyway
			$Views = mysqli_query($this->mycall->start , $syntax) or die(mysqli_error());

			if($data = mysqli_fetch_array($Views))
			{
					$this->id = $data["id"];
					$this->friendly_name = $data["Friendly_Name"];
					$this->physicalAddress = $data["Physical_Address"];
					$this->Page_id  = $data["Page_id"];

					/* still we have to get the page content in the array*/
			}
		}

		// mysqli_close($this->mycall);

	} // end of constructor

	static function getAllURLnames()
	{
			$mycall = ServerCommunications::getInstance();

				$syntax = "SELECT id, Friendly_Name FROM `url`"; // not complete anyway
				$Views = mysqli_query($mycall->start , $syntax);
				$AllFriendlyNames;
				$i = 0;
				while ($data = mysqli_fetch_array($Views))
				{
				$AllFriendlyNames[$i] = new pagesURLs($data["id"]);
				$i++;
				}
		// mysqli_close($mycall);
		return $AllFriendlyNames;
	} // end of all get alll url names function



	} // end of Pages url class




?>