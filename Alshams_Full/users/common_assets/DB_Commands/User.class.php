 <?php
session_start();
include_once("Connect_DB.php");
include_once("userTypes.class.php");

class User{

	public $FirstName;
	public $LastName;
	public $Gender;
	public $Street; // object
	public $apartment_no;
	public $UserType;
	public $UserName;
	public $Email;
	public $password;
	public $PhoneNumber;
	public $ConfirmPassword;
	public $DateofAccess;
	public $AcceptPolicy;
	public $Country; //object 
	public $City; //pbject
	public $userID;
	public $CountryCode;

    private $mycall;
	
    function __construct($id = ""){
		$this->mycall =  ServerCommunications::getInstance();

		if($id!= "")
		{
					$syntax = "SELECT * FROM `users` WHERE users.id ='$id' ";
					$Views = mysqli_query($this->mycall->start , $syntax) or die(mysqli_error());

					if($data = mysqli_fetch_array($Views))
					{
						/*user data*/
						$this->userID = $data["id"];
						$this->FirstName = $data["Fname"];
						$this->LastName = $data["Lname"];
						$this->Email = $data["email"];
						$this->UserName = $data["Username"];
						$this->DateofAccess = $data["DOA"];
						/* user type data*/
						$this->UserType= new userTypes($data["User_type_id"]); 

						// /* telephone */
						// $telephonato = new telephone(); // m3ish id bta3 el telephone , b3ml telephone gdid
						// $this->CountryCode = $telephonato->CountryCode;
						// $this->PhoneNumber = $telephonato->Phone_no;

						/* address*/
							// $addressantos = address::get_Address_Date($data["id"]);
							$addressantos = address::get_Address_Date($data["id"]);
							$this->Street = $addressantos[0];
							$this->City = $addressantos[1];
							$this->Country = $addressantos[2];

							// $addressantos_apartment_no= new address(); 
							// $this->apartment_no = $addressantos_apartment_no->name;
							// $countryType = $addressantos_apartment_no->type;
							// $parent_id = $addressantos_apartment_no->P_id;


					}
					
		}
			// mysqli_close($this->mycall);


	} // end of the constructor


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

public function login($UN , $PS){

			$A = ServerCommunications::getInstance();

			$this->username=$UN;
			$this->password=$PS;
		
			$logging_IN = "SELECT * FROM users WHERE users.Username = '$UN' AND users.password= '$PS'";
			$query = mysqli_query(  $A->start ,$logging_IN);

			$rows = mysqli_num_rows($query);
			$Da_row = mysqli_fetch_assoc($query);
			$userid=$Da_row["id"];
			$UTRA = $Da_row["User_type_id"];

			// mysqli_close($this->mycall);


		if ($rows ==1 ) {

			$current_user = new User($Da_row["id"]);

			$last = $current_user->FirstName;
			$First = $current_user->LastName;
			$id=$current_user->userID;

			$_SESSION["Identifier"] = $UTRA; // user type ID
			$_SESSION["userDetails"] = $current_user; // object of the user
			$_SESSION["userid"]=$id;
			$_SESSION["Nahme"] = $current_user->FirstName . " ".$current_user->LastName;



			if($UTRA == 2){ // customer

			header("location: ../../customer/home.php");

			}else if($UTRA == 1 ){ // admin


			header("location: ../../admin/admin.php");

			}else if($UTRA == 3 ){ // accounting sutff (lssa)

			header("location: ../../Accounting_stuff/home.php");

			}else if($UTRA == 4 ){ // Cost Controller

			header("location: ../../cost_controller/home.php");

			}else if($UTRA == 5 ){ // technical office
			header("location: ../../Technical_office/home.php");

			}else if($UTRA == 6 ){ // project manager

			header("location: ../../project_Manager/home.php");

			}else if($UTRA == 7 ){ // head of suppllies accounts

			header("location: ../../Head_of_the_supplier_accounts/home.php");

			}else if($UTRA == 8 ){ // head of customers accounts

			header("location: ../../Head_of_the_customer_Accounts/home.php");

			}else if($UTRA == 9 ){ // head of subcontract account

			header("location: ../../Head_of_subcontract_Accounts/home.php");

			}else if($UTRA == 10 ){ // head of audiance 

			header("location: ../../Head_of_auditing/home.php");

			}

			}
	
		} // end of login function


		static function get_URL_pages($uTyp)
		{

				$mycall = ServerCommunications::getInstance();

				$syntax = "SELECT * FROM `accessability` WHERE accessability.usertype_id = '$uTyp' ";

				$Views = mysqli_query($mycall->start , $syntax);
					$URL_pages;
				$i = 0;
				while ($data = mysqli_fetch_array($Views))
				{
				$URL_pages[$i] = new pagesURLs($data["url_id"]);
				$i++;
				}
		// mysqli_close($mycall);
		return $URL_pages;

				
		}


	public function Generate_Random_key($length = 10){

		$charater = "123456789";
		$length = strlen($charater);
		$randomString = '';
		for($i=0;$i< $length ; $i++)
		{
			$randomString .= $charater[rand(0,$length-1)];
		}
		return $randomString;
	}



}	// end of the class


/*_________________________________class  address  ________________________________*/

class address{

	public $id;
	public $name;
	public $type;
	public $P_id;

    function __construct($id = ""){

    	$this->mycall = ServerCommunications::getInstance();;

	if($id!="")
	{
		$syntax = "SELECT * FROM address WHERE address.id = '$id'"; //i'll only select land area or place name
		$Views = mysqli_query($this->mycall->start , $syntax) or die(mysqli_error());

					if($data = mysqli_fetch_array($Views))
					{
						$this->id= $data["id"];
						$this->name= $data["name"];
						$this->P_id= $data["pid"];
						$this->type = $data["type"];
					}
	} // ./ if condetion


	// mysqli_close($this->mycall->start);

}
 
 // street , country , city
 static function get_Address_Date($userID)
 {
 	 $mycall = ServerCommunications::getInstance();;
 	$array_of_Address;
 	
 	$parent;
 	$child;

 	//street
 	$syntax1 = "SELECT * FROM address WHERE address.user_id = $userID AND (pid = 2 OR pid = 3)";
	$Views1 = mysqli_query($mycall->start , $syntax1) or die(mysqli_error());

	if($data = mysqli_fetch_array($Views1))
	{
		$array_of_Address[0] = new address($data['id']);
 		$parent = $data["pid"];
 		// echo "parent is: " . $data["pid"];
	}else{
		$array_of_Address[0] = new address($data['id']);
		$parent= 2;
	}
	// echo "parent:". $parent;
 	//country
 	$syntax2 = "SELECT * FROM address WHERE address.id = $parent ";
	$Views2 = mysqli_query($mycall->start , $syntax2) or die(mysqli_error($mycall->start));

	if($data = mysqli_fetch_array($Views2))
	{
		$array_of_Address[1] = new address($data['id']);
 		$child = $data["pid"];
	}


 		// city
 	 	$syntax3 = "SELECT * FROM address WHERE address.id = $child";
		$Views3 = mysqli_query($mycall->start , $syntax3) or die(mysqli_error());

	if($data = mysqli_fetch_array($Views3))
	{
		$array_of_Address[2] = new address($data['id']);
 		$child = $data["pid"];
	}

 	return $array_of_Address;
 }



static function search_Street_or_apartment($search_name)
{
		$mycall = ServerCommunications::getInstance();
		$hazzo;
		$syntax = "SELECT id FROM `address` WHERE address.name ='$search_name' ";
		$Views = mysqli_query($mycall->start , $syntax) or die(mysqli_error($mycall));
		if($data = mysqli_fetch_array($Views))
		{
				$hazzo = new address($data["id"]);
		}

	// mysqli_close($mycall);
	return $hazzo;
}

} // end of the class


/*_________________________________class Telephone   ________________________________*/

class telephone{

	public $id;
	public $CountryCode;
	public $Phone_no;

    function __construct($id = ""){

    			$this->mycall = ServerCommunications::getInstance();

				if($id!="")
				{
					$Syntax3 = "SELECT * FROM `telephone` WHERE telephone.id  ='$id'";
					$Views = mysqli_query($this->mycall->start , $syntax3) or die(mysqli_error());

								if($data = mysqli_fetch_array($Views))
								{
									$this->id= $data["id"];
									$this->CountryCode= $data["CountryCode"];
									$this->Phone_no= $data["Phone_no"];
								}
				} // ./ if condetion

		// mysqli_close($this->mycall);

		} // end of constructor


	static function get_Telephone_data($userID)
	{
				$mycall = ServerCommunications::getInstance();
				$telephoneOBJ;
				$syntax2 = "SELECT * FROM `telephone` WHERE telephone.user_id = '$userID' ";
				$UTV = mysqli_query( $mycall->start ,$syntax2) or die(mysqli_error($mycall->start));
				if($data = mysqli_fetch_array($UTV))
				{
					$telephoneOBJ = new telephone($data["id"]);
				}
				// echo $telephoneOBJ->Phone_no;
			return $telephoneOBJ;
	}

} // end of the class





// class HashMap{

// 	private $MapTable;


// static public function HashText($text){

// 	$MapTable = array(
//     "A" => "jkhgf",
//     "B" => "ufty",
//     "C" => "rtse",
//     "D" => "ojjg",
//     "E" => "@%&%#78",
//     "F" => "lkjyfgtf",
//     "G" => "jgrdr",
//     "H" => "jkg6r5",
//     "I" => "ljgsqry",
//     "J" => "jkgrdwzx",
//     "K" => "nyufes",
//     "L" => "peeeeeeeep",
//     "M" => "weeeeeee",
//     "N" => "jkjkjk",
//     "O" => "wokokok",
//     "P" => "#$#%$^%",
//     "Q" => "loaaaaa",
//     "R" => "hyhyhyhyh",
//     "S" => "hoohohoh",
//     "T" => "hahaa",
//     "U" => "huhh",
//     "V" => "^$%^%^&^%",
//     "W" => "%^*^(",
//     "X" => "$#@^%$^",
//     "Y" => "[]{}",
//     "Z" => "nhgjuyk",
//     " " => "0i8,m",
//     "0" => "dasdas",
//     "1" => "?????",
//     "2" => "PIOJJV",
//     "3" => "CGT%$",
//     "4" => "^&U^&",
//     "5" => "^UB%Y%V",
//     "6" => "^BYG",
//     "7" => "^&YT%$#",
//     "8" => "bthyh67b",
//     "9" => "5458b54y",
//     "a" => "te5",
//     "b" => "pofffff",
//     "c" => "popopopopo",
//     "d" => "mnmnmnmn",
//     "e" => "ftftfftf",
//     "f" => "tetetetete",
//     "g" => "wewwew",
//     "h" => "drddr",
//     "i" => "brobro2",
//     "j" => "kajja",
//     "k" => "lilla",
//     "l" => "mazzika",
//     "m" => "rotana",
//     "n" => "fox",
//     "o" => "mbcmfdsax",
//     "p" => "mbcdion",
//     "q" => "mbcafsd2",
//     "r" => "mbfaw",
//     "s" => "jbtdx",
//     "t" => "jhgsehb",
//     "u" => "121212121",
//     "v" => "548421",
//     "w" => "lolsda",
//     "x" => "(wadsd",
//     "y" => "hjftrsbvsxz",
//     "z" => "456877(***77" );


//     $length = strlen($text);
//     $mydata;
//     // echo $MapTable['A'];

//      // $A = str_replace($text, $MapTable['0'] , $text);

//     // echo $A;
//     for ($i = 0; $i < $length; $i++) {
//          str_replace($text[$i] , $MapTable['A'] , $text); 
//          // $mydata .= $text[$i]; 
//          echo "<br/>values:" . $text[$i];    
// }
//         // return $mydata;

// }

// } // end of hash class


// $HM = new hashmap();
// $result = $HM->HashText("a");
// // echo $result;

// $addresssa = new address();
// echo "helow";
//  $addresssa = address::get_Address_Date(1);
//  // echo "count: ". count($addresssa);
// // echo "<br/>street name: ". $addresssa[0]->name;

// echo "<br/>city b2a wnby : ". $addresssa[1]->name;

// echo "<br/>elcountry allah y5alik : ". $addresssa[2]->name;


?>