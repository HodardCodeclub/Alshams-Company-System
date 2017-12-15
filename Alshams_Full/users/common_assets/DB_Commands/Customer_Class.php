<?php
include_once ("User.class.php");
include_once ("Connect_DB.php");
include_once ("Project_class.php");
include_once("Iaccess.php");

class Customer extends User implements Iaccess{

   
        public $mycall;
        

		function __construct($id =""){
			$this->mycall = ServerCommunications::getInstance();			
					if($id != "")
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
						// echo "user ID is : ". $data["id"];
						$addressantos = address::get_Address_Date($data["id"]);
						$this->Street = $addressantos[0];
						$this->City = $addressantos[1];
						$this->Country = $addressantos[2];
						// echo "<br/>from customer constructor , country is: ". $this->Street->name;

						// $addressantos_apartment_no= new address(); 
						// $this->apartment_no = $addressantos_apartment_no->name;
						// $countryType = $addressantos_apartment_no->type;
						// $parent_id = $addressantos_apartment_no->P_id;
						
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


 function ApplyProject(Project $project,$City,$Country,$Street,$District)
{


    $projectname=$project->__get("ProjectName");
	$landarea=$project->__get("LandArea");	
	$projecttype=$project->__get("ProjectType");
	$descr=$project->__get("ProjectDescription");


		$useridd=$_SESSION["userid"];




			$country_row = new address($Country);
			$country_row->type = "country";
			$country_row->p_id = $country_row->id;
			$countryID= $country_row->id;

			// echo "country ID: ". $countryID;


			$syntaxantos1 = "SELECT id FROM `address` WHERE address.id ='$country_row->id' ";
			$V1 = mysqli_query($this->mycall->start , $syntaxantos1) or die(mysqli_error($this->mycall->start));
			if($data = mysqli_fetch_array($V1))
			{
				// skip the insertion because it's found
			}else{


		$syntaxyz1="INSERT INTO address(name,type,user_id,pid)VALUES('$country_row->name', '$country_row->type','$useridd','$country_row->p_id')";

		 $order3 = mysqli_query($this->mycall->start , $syntaxyz1)  or die(mysqli_error($this->mycall->start));


		} // end of else (country)

		/*city*/

			$city_row = new address($City);
			$city_row->type = "city";
			$city_row->p_id = $countryID;
			$cityID= $city_row->id;
	
					// echo "city ID: ". $cityID;

			$syntaxantos2 = "SELECT id FROM `address` WHERE address.id ='$cityID' ";
			$V2 = mysqli_query($this->mycall->start , $syntaxantos2) or die(mysqli_error($this->mycall->start));
			if($data = mysqli_fetch_array($V2))
			{
				// skip the insertion because it's found
			}else{
					
					$syntaxyz2="INSERT INTO address(name,type,user_id,pid)VALUES('$city_row->name', '$city_row->type','$useridd','$city_row->p_id' )";

					 $order4 = mysqli_query($this->mycall->start , $syntaxyz2)  or die(mysqli_error($this->mycall->start));


				} // end of else (country)

	
		/*street*/

			$street_row = new address();
			$street_row->type = "street name";
			$street_row->p_id = $cityID;
			$street_row->name= $Street;

					 // echo "street type: ". $street_row->type;

			$syntaxantos3 = "SELECT id FROM `address` WHERE address.name = '$street_row->name' ";
			$V3 = mysqli_query($this->mycall->start , $syntaxantos3) or die(mysqli_error($this->mycall->start));
			if($data = mysqli_fetch_array($V3))
			{
				// skip the insertion because it's found
			}else{

				  $syntaxyz3="INSERT INTO address(name,type,user_id,pid)VALUES('$street_row->name', '$street_row->type','$useridd','$street_row->p_id')";
				  $order5 = mysqli_query($this->mycall->start , $syntaxyz3)or die(mysqli_error($this->mycall->start));
			}

			//land
			// echo "address: ". $street_row->name;
			$ST = address::search_Street_or_apartment($street_row->name);
		 	$apartmentNo_row = new address();
			$apartmentNo_row->type = "Land";
			$apartmentNo_row->p_id = $ST->id;
			$apartmentNo_row->name = $District;


		$syntaxyz4="INSERT INTO address(name,type,user_id,pid)VALUES('$apartmentNo_row->name', '$apartmentNo_row->type','$useridd','$apartmentNo_row->p_id' )";

		 $order6 = mysqli_query($this->mycall->start , $syntaxyz4)  or die(mysqli_error($this->mycall->start));


     $sql="INSERT INTO project(Name, type, LandArea, Description, users_id , LandAddress)values('$projectname','$projecttype','$landarea', '$descr', '$useridd', '$ST->id')";
     	mysqli_query($this->mycall->start , $sql);


}



public function Register($FN, $LN, $GN, $UserType="", $UserName, $Email, $Pass, $PhoneNum, $ConfirmPass,$Country,$City, $Street, $ApartmentNo, $CountryCode){

	$mycall = ServerCommunications::getInstance();
		/* for table users*/
			$this->userID = $this->Generate_Random_key();
			$this->UserName = $UserName;
			$this->Password = $Pass;
			$this->Email = $Email;
			$this->DateofAccess=date_create()->format('Y-m-d H:i:s');
			$this->UserType = $UserType;
			$this->FirstName = $FN;
			$this->LastName = $LN;
			$this->Gender = $GN;

		/* for table telephone */
			$this->PhoneNumber = $PhoneNum;
			$this->CountryCode=$CountryCode;

		/*for table address*/
		$this->Street = $Street;
		$this->apartment_no = $ApartmentNo;
		
		/* for confirmation*/
			$this->ConfirmPassword = $ConfirmPass;
			

		$syntax1="INSERT INTO users(id,Username,password,email,DOA,User_type_id,Fname,Lname,Gender)VALUES('$this->userID','$this->UserName', '$this->Password','$this->Email', '$this->DateofAccess', '$this->UserType', '$this->FirstName', '$this->LastName', '$this->Gender')"; 

		$order1  = mysqli_query($this->mycall->start , $syntax1) or die(mysqli_error($this->mycall->start));


		$syntax2="INSERT INTO telephone(CountryCode,Phone_no,user_id)VALUES('$this->CountryCode','$this->PhoneNumber','$this->userID')";

			$order2 = mysqli_query($this->mycall->start , $syntax2) or die(mysqli_error($this->mycall->start));

		/* =======================================address======================================*/
		/*country*/

			$country_row = new address($Country);
			$country_row->type = "country";
			$country_row->p_id = $country_row->id;
			$countryID= $country_row->id;



			$syntaxantos1 = "SELECT id FROM `address` WHERE address.id ='$country_row->id' ";
			$V1 = mysqli_query($this->mycall->start , $syntaxantos1) or die(mysqli_error($this->mycall->start));
			if($data = mysqli_fetch_array($V1))
			{
				// skip the insertion because it's found
			}else{


		$syntaxyz1="INSERT INTO address(name,type,user_id,pid)VALUES('$country_row->name', '$country_row->type','$this->userID','$country_row->p_id' )";

		 $order3 = mysqli_query($this->mycall->start , $syntaxyz1)  or die(mysqli_error($this->mycall->start));


		} // end of else (country)

		/*city*/

			$city_row = new address($City);
			$city_row->type = "city";
			$city_row->p_id = $countryID;
			$cityID= $city_row->id;
	
			$syntaxantos2 = "SELECT id FROM `address` WHERE address.id ='$cityID' ";
			$V2 = mysqli_query($this->mycall->start , $syntaxantos2) or die(mysqli_error($this->mycall->start));
			if($data = mysqli_fetch_array($V2))
			{
				// skip the insertion because it's found
			}else{
					
					$syntaxyz2="INSERT INTO address(name,type,user_id,pid)VALUES('$city_row->name', '$city_row->type','$this->userID','$city_row->p_id' )";

					 $order4 = mysqli_query($this->mycall->start , $syntaxyz2)  or die(mysqli_error($this->mycall->start));


				} // end of else (country)


	
		/*street*/

			$street_row = new address();
			$street_row->type = "street name";
			$street_row->p_id = $cityID;
			$street_row->name= $this->Street;


			$syntaxantos3 = "SELECT id FROM `address` WHERE address.name ='$street_row->name' ";
			$V3 = mysqli_query($this->mycall->start , $syntaxantos3) or die(mysqli_error($this->mycall->start));
			if($data = mysqli_fetch_array($V3))
			{
				// skip the insertion because it's found
			}else{

				$syntaxyz3="INSERT INTO address(name,type,user_id,pid)VALUES('$street_row->name', '$street_row->type','$this->userID','$street_row->p_id')";

				 $order5 = mysqli_query($this->mycall->start , $syntaxyz3)  or die(mysqli_error($this->mycall->start));


			}

		/*apartment*/

			$ST = address::search_Street_or_apartment($street_row->name);
		 	$apartmentNo_row = new address();
			$apartmentNo_row->type = "Apartment number";
			$apartmentNo_row->p_id = $ST->id;
			$apartmentNo_row->name = $ApartmentNo;


		$syntaxyz4="INSERT INTO address(name,type,user_id,pid)VALUES('$apartmentNo_row->name', '$apartmentNo_row->type','$this->userID','$apartmentNo_row->p_id' )";

		 $order6 = mysqli_query($this->mycall->start , $syntaxyz4)  or die(mysqli_error($this->mycall->start));


			// mysqli_close($this->mycall);

	} // end of Register function


}

?>
