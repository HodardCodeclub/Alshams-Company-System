<?php 
	include_once('Connect_DB.php');
	include_once('User.class.php');
	include_once('Iaccess.php');
	include_once('Ireport.php');
	include_once('Report.php');

class Admin extends user implements Iaccess , Ireport {

		private $mycall;

		function __construct($ID="")
		{
			$this->mycall = ServerCommunications::getInstance();

					if($ID!= "")
						{
							new user($ID);
						}
		// mysqli_close($this->mycall->start);
		}

 public function Register($FN, $LN, $GN, $UserType, $UserName, $Email, $Pass, $PhoneNum, $ConfirmPass,$Country,$City, $Street, $ApartmentNo, $CountryCode){

			$this->mycall = ServerCommunications::getInstance();

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

	} // end of add user function


function AddURL($Physical_Address ,$FriendlyName, $Users_permisions_type/*as array*/)
{

				$this->mycall = ServerCommunications::getInstance();

				$insert_URL = "INSERT INTO `url` (Physical_Address, Friendly_Name) VALUES ('$Physical_Address', '$FriendlyName')";
				$UID2 = mysqli_query( $this->mycall->start ,$insert_URL);
					$URLID = mysqli_insert_id($this->mycall->start);	


				/*part of the users*/
				$length = strlen($Users_permisions_type);
				$selected_user = '';
				for($i=0;$i< $length ; $i++)
					{
						$selected_user = $Users_permisions_type[$i];
						$insert_user_permission = "INSERT INTO `accessability` ( `userType_id` , `URL_id` ) VALUES ('$selected_user'  , '$URLID'  ) ";
						$YGA = mysqli_query( $this->mycall->start ,$insert_user_permission);
					}

			// mysqli_close($this->mycall);

} // end of Add url Function


function add_user_type($type_name)
{


				$this->mycall = ServerCommunications::getInstance();
				$InsertingOne = "INSERT INTO usertype(usertype.name ) VALUES ( '$type_name' )";
				$UID = mysqli_query( $this->mycall->start ,$InsertingOne);
				// mysqli_close($this->mycall);
}

		
			function delete_User($username)
			{

				$this->mycall = ServerCommunications::getInstance();
				$SADFS = "DELETE FROM users WHERE users.username='$username'";
				$ExecuteQuery = mysqli_query( $this->mycall->start ,$SADFS);
				// mysqli_close($this->mycall);
			}
	 		


			function delete_user_type($userTypeName)
			{
				$this->mycall = ServerCommunications::getInstance();
				$SADFS = "DELETE FROM usertype WHERE usertype.name='$userTypeName' ";
				$ExecuteQuery = mysqli_query( $this->mycall->start ,$SADFS);


			}




static function viewMarksheet()
{

				$mycall = ServerCommunications::getInstance();
				$syntax = "SELECT * FROM `users`";
				$Views = mysqli_query($mycall->start , $syntax);
				$Allusers;
				$i = 0;
				while ($data = mysqli_fetch_array($Views)) {	
						$Allusers[$i] = new user($data["id"]);
						$i++;
				}

			// mysqli_close($mycall);
			return $Allusers;
}



function edit_Accont_data($email,$username)
{
				session_start();

				$this->mycall = ServerCommunications::getInstance();

				$ID = $_SESSION["updating_ID"];
				$syntax = " UPDATE `users` SET `email` = '$email' ,  `Username` = '$username'  WHERE `users`.`id` = $ID;";
				$AS = mysqli_query( $this->mycall->start ,$syntax);


				// mysqli_close($this->mycall);


}
static function edit_User_type($new_type)
{

	$mycall = ServerCommunications::getInstance();
	$ID = $_SESSION["updating_ID"];

	$syntax = " UPDATE `users` SET `User_type_id` = '$new_type' WHERE `users`.`id` = $ID;";
	$AS = mysqli_query( $mycall->start ,$syntax);




}

function edit_password($old_password,$new_password,$confirm_password)
{	

								session_start();

				$this->mycall = ServerCommunications::getInstance();
				$ID = $_SESSION["updating_ID"];

				if($new_password == $confirm_password){					
				$syntax = " UPDATE `users` SET `password` = '$new_password'  WHERE `users`.`id` = $ID;";
				$AS = mysqli_query( $this->mycall->start ,$syntax);
				}

				// mysqli_close($this->mycall);

}
function edit_user_data($DOB ="",$Fname,$Lname)
{
												session_start();

				$this->mycall = ServerCommunications::getInstance();
				$ID = $_SESSION["updating_ID"];

				$syntax = " UPDATE `users` SET `Fname` = '$Fname' ,  `Lname` = '$Lname'  WHERE `users`.`id` = $ID;";
				$AS = mysqli_query( $this->mycall->start ,$syntax);
				// mysqli_close($this->mycall);
}


static function edit_phone($country_code,$phone_number)
{	

									session_start();

				$mycall = ServerCommunications::getInstance();
				// echo "sir yes sir.!!";
				$ID = $_SESSION["updating_ID"];

				$syntax = " UPDATE `telephone` SET `CountryCode` = '$country_code' ,  `Phone_no` = '$phone_number'  WHERE `telephone`.`user_id` = $ID;";
				$AS = mysqli_query( $mycall->start ,$syntax);

				// mysqli_close($this->mycall);


}


/*working on it now */
static function update_permissions($USRType , $type_url)
{
		$mycall = ServerCommunications::getInstance();
		//1) delete old permissions all.		
		$delete_syntax = "DELETE FROM accessability WHERE usertype_id = '$USRType' ";
		mysqli_query($mycall->start , $delete_syntax);

	    //3)add the new permissions to this user
		for($i=0; $i< strlen($type_url); $i++)
		{
		  $array_of_pages =$type_url[$i];
		  $insertion = "INSERT INTO accessability ( userType_id , url_id ) VALUES ( $USRType , $array_of_pages )";
		 $yoga =  mysqli_query($mycall->start , $insertion);
		}



} // end of update_permissions

static function add_project_stage($project_name)
{


				$mycall = ServerCommunications::getInstance();
				$InsertingOne = "INSERT INTO project_type(name ) VALUES ( '$project_name' )";
				$UID = mysqli_query( $mycall->start ,$InsertingOne);

}

static function add_stage_type($type_name)
{

				$mycall = ServerCommunications::getInstance();
				$InsertingOne = "INSERT INTO stages(name) VALUES ('$type_name')";
				$UID = mysqli_query( $mycall->start ,$InsertingOne);
}


static function add_contract_type($type_name)
{
				$mycall = ServerCommunications::getInstance();
				$InsertingOne = "INSERT INTO contracttype(name ) VALUES ( '$type_name' )";
				$UID = mysqli_query( $mycall->start ,$InsertingOne);
				// mysqli_close($this->mycall);
}

static function count_users()
{
					$mycall = ServerCommunications::getInstance();
					$syntax = "select count(*) as x from users";
					$UID = mysqli_query( $mycall->start ,$syntax);
					$x;
					if($data = mysqli_fetch_array($UID))
					{
						$x = $data['x'];
					}
					 return $x;
}

function hash_Salt_password($username,$password)
{
	//1)take the email & password
	//2) concatinate them as one text
	//3) hash them
}
	
public function CreateReport($SqlStatement , $reportName, $userID)
{


}



 function ViewReport($reportname)
  {

  // 	$mycall = ServerCommunications::getInstance();

  //   $name = "%".$reportname."%";
 	// $array_of_rows;
 	// $i=0;
 	// $j=0;
  //   $sql="SELECT sql_statement FROM report where name LIKE '$name'";
  //   $result=mysqli_query($mycall->start,$sql);

  //     if (!$result) {
  //      die('Invalid query: ' . mysqli_error($mycall->start));
  //    }

  //       if($row = mysqli_fetch_array($result))
  //       {
  //         $statement=$row['sql_statement'];          
  //       }
 	
  //       $sql1=$statement;
  //       // echo $sql1 ."<br/>";
  //       $result1=mysqli_query($mycall->start,$sql1) or die(mysqli_error($mycall->start));


  //       $rows = array();
  //       // echo "number of fields for " . $result1 . " are: ".mysqli_num_fields($result1);

  //       while($data = mysqli_fetch_array($result1))
  //       {
  //       	// $array_of_rows[$i] = new "" ;
  //       	  array_push($rows, $row);

  //       }
  //       // echo json_encode($rows);

  //      return $rows;
 
    
}

public static function GetAllReports()
{

	$Reports;
	$i=0;
	$mycall = ServerCommunications::getInstance();
	$syntax = "SELECT * FROM report";
	$UID = mysqli_query( $mycall->start ,$syntax);

	while($data = mysqli_fetch_array($UID))
	{
		$Reports[$i] = $data["name"];
		$i++;
	}

	return $Reports;
}

	
} // end of class


// $ffff = Admin::GetAllReports();
// echo "sh3'al: ". $ffff[0];



$viewRep = new Admin();
$viewRep->ViewReport("view project state");
?>