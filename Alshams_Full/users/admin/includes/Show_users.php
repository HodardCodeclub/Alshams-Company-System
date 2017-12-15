<?php
session_start();
include_once('../../common_assets/DB_Commands/Connect_DB.php');

	
	        $mycall = ServerCommunications::getInstance();

				$USRR = $_GET['Searchbar'] . '%';
				$syntax = "SELECT * FROM `users` WHERE users.Username LIKE '$USRR' OR users.Fname LIKE '$USRR' ";
				$UID = mysqli_query( $mycall->start ,$syntax);
				echo '<table  class="table table-bordred table-striped">';
				echo ' <thead>
                   
                   <th>full name</th>
                    <th>username</th>
                     <th>Email</th>
                     <th>Date of access</th>
                     <th>user type</th>
                     <th>phone</th>
                     <th>Edit</th>
                     <th>Delete</th>
                   </thead>
                    <tbody>
                   ';
				while ($data = mysqli_fetch_array($UID)) 
				{
						$vo = $data["id"];
				$syntax2 = "SELECT * FROM `telephone` WHERE telephone.user_id = '$vo' ";
				$UTV = mysqli_query( $mycall->start ,$syntax2) or die(mysqli_error($mycall));
				$data2 = mysqli_fetch_array($UTV);
				  echo '
				  <tr>
				    <td>'.$data["Fname"]. " ". $data["Lname"] .'</td>
				    <td>'.$data["Username"].'</td>
				    <td>'.$data["email"].'</td>
				    <td>'.$data["DOA"].'</td>
				    <td>'.$data["User_type_id"].'</td>
				    <td>'.$data2["Phone_no"].'</td>';

			echo "
				<td>
				  <form  id='edit_form' action='includes/edit_profile.php' method='post'>
           						<button type='submit' class='btn btn-primary btn-xs' name='edit_user' data-toggle='modal' value='" . $data["id"]."'><span class='glyphicon glyphicon-pencil'></span></button>
              			</form>
              	</td>
              			";
				    


    			echo"
    					<td>
     						<form id='delete_the_user' action='../common_assets/DB_Commands/startPoint.php' method='post'>
								<button type='submit' class='btn btn-danger btn-xs' name='Delete_user' data-toggle='modal' value='" . $data["Username"]."'><span class='glyphicon glyphicon-trash'></span></button>
							</form>    	
						</td>
					</tr>
					 ";
				}

				echo '</tbody> </table>';




?>