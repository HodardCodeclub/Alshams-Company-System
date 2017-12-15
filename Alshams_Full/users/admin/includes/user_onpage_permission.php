<?php

/* select all usertypes who has access to this page from Selected bar*/
session_start();
include_once('../../common_assets/DB_Commands/Connect_DB.php');
include_once("../../common_assets/DB_Commands/userTypes.class.php");

				$mycall = ServerCommunications::getInstance();
				$USRR = $_GET['Searchbar'];


				/*---------the accessable links----------*/
				$syntax = "SELECT * FROM `accessability` WHERE accessability.usertype_id = '$USRR' ";
				$UID = mysqli_query( $mycall->start ,$syntax)  or die(mysqli_error($mycall->start));
				$accesssable;
				$i =0;
				echo "<br/> the accessable links: <br/> ";
				while ($data = mysqli_fetch_array($UID)) 
				{
					$accesssable[$i] = new pagesURLs($data["url_id"]);
					echo "<input type='checkbox' name='type_urls[]' value='".$accesssable[$i]->id . "'  checked>".$accesssable[$i]->friendly_name ."<br/>";
					// echo $accesssable[$i]->friendly_name . "<br/>";
					$i++;
				}


				/*----------the unaccessable links-------*/
				$sql = "SELECT Friendly_Name , id from url WHERE url.id NOT IN (SELECT accessability.url_id FROM accessability WHERE accessability.usertype_id = '$USRR' )" ; 
				$UID2 = mysqli_query( $mycall->start ,$sql)  or die(mysqli_error($mycall->start));
				$unaccessable;
				$j=0;

				echo "<br/> <br/> the unaccessable links: <br/>";
				while ($data2 = mysqli_fetch_array($UID2)) 
				{
					$unaccessable[$j] = new pagesURLs($data2["id"]);
					echo "<input type='checkbox' name='type_urls[]' value='".$unaccessable[$j]->id."' >".$unaccessable[$j]->friendly_name ."<br/>";
					// echo $unaccessable[$j]->friendly_name . "<br/>";
					$j++;
				}





// take the on clicked 


?>