<?php 

include_once("../../common_assets/DB_Commands/User.class.php");
include_once("../../common_assets/DB_Commands/userTypes.class.php");


if(isset($_POST['edit_user']))
{
$UT =$_POST['edit_user'];
$_SESSION["updating_ID"] = $UT;
$editing_person = new User($_SESSION["updating_ID"]);

}else{

$editing_person = new User($_SESSION["updating_ID"]);

}


$userTypess = userTypes::getAlluserTypes();
?>

<!DOCTYPE html>
<html>
<head>
	<title>edit profile</title>

	  <!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

</head>
<body>


	  <div class="row">
          <div class="col-lg-3 col-sm-offset-4"> 

<center><h3>profile informations:</h3></center>
          	<br/><br/>
<!-- 	<h4>Adderss : </h4>

	     <form  action="../../common_assets/DB_Commands/startPoint.php" method="post"  role="form" autocomplete="on">
                  <div class="form-group">
                       <label for="city">city: </label>
                       <input type="text" class="form-control" id="city" name="city" placeholder="city" value="<?php echo $editing_person->City ?>" >
                 </div>
                   <div class="form-group">
                       <label for="Apartment_no">Apartment number: </label>
                       <input type="text" class="form-control" id="Apartment_no" name="Apartment_no" placeholder="Apartment no" value="<?php echo $editing_person->addressantos_apartment_no->apartment_no ?>">
                 </div>
                 <div class="form-group">
                       <label for="street">street: </label>
                       <input type="text" class="form-control" id="street" name="street" placeholder="street" value="<?php echo $editing_person->addressantos_street->Street ?>">
                 </div>
                       <input type="submit" name="edit_user_address"  value="update" class="col-sm-4 col-sm-offset-4 btn btn-primary "> 
            </form>
 -->
            <br/><br/>
	<h4>account data:</h4>

	     <form  action="../../common_assets/DB_Commands/startPoint.php" method="post"  role="form" autocomplete="on">
                  <div class="form-group">
                       <label for="email">email: </label>
                       <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $editing_person->Email?>">
                 </div>
       
                 <div class="form-group">
                       <label for="username">username: </label>
                       <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?php echo $editing_person->UserName?>">
                 </div>
                       <input type="submit" name="edit_Accont_data"  value="update" class="col-sm-4 col-sm-offset-4 btn btn-primary "> 
            </form>

            <br/><br/>
	<h4>password:</h4>

	     <form  action="../../common_assets/DB_Commands/startPoint.php" method="post"  role="form" autocomplete="on">
                  <div class="form-group">
                       <label for="OPS">old password: </label>
                       <input type="password" class="form-control" id="OPS" name="OPS" placeholder="old password">
                 </div>
                                   <div class="form-group">
                       <label for="NPS">new password: </label>
                       <input type="password" class="form-control" id="NPS" name="NPS" placeholder="new password">
                 </div>
                                   <div class="form-group">
                       <label for="CNPS">confirm new password: </label>
                       <input type="password" class="form-control" id="CNPS" name="CNPS" placeholder="confirm new password">
                 </div>
                       <input type="submit" name="edit_password" value="update" class="col-sm-4 col-sm-offset-4 btn btn-primary "> 
            </form>

      <br/><br/>
	<h4>personal data: </h4>

	     <form  action="../../common_assets/DB_Commands/startPoint.php" method="post"  role="form" autocomplete="on">
                  <div class="form-group">
                       <label for="DOB">date of birth: </label>
                       <input type="text" class="form-control" id="DOB" name="DOB" placeholder="date of birth" disabled="disabled" value="">
                 </div>
                       <div class="form-group">
                       <label for="Fname">first name: </label>
                       <input type="text" class="form-control" id="Fname" name="Fname" placeholder="first name" value="<?php echo $editing_person->FirstName?>">
                 </div>
                       <div class="form-group">
                       <label for="Lname">last name: </label>
                       <input type="text" class="form-control" id="Lname" name="Lname" placeholder="last name" value="<?php echo $editing_person->LastName?>">
                 </div>
     
                       <input type="submit" name="edit_user_data" value="update" class="col-sm-4 col-sm-offset-4 btn btn-primary "> 
            </form>

            <br/><br/>


  <h4>edit user type: </h4>

       <form  action="../../common_assets/DB_Commands/startPoint.php" method="post"  role="form" autocomplete="on">
                  <div class="form-group">
                       <label for="userTTT">user type: </label>
                       <select name ="usertypeValue">
                      <?php for($i=0;$i <count($userTypess);$i++)
                                  {
                                    echo "<option value='" .$userTypess[$i]->id  . "' >" . $userTypess[$i]->userType_name  . "</option>";
                                  } 
                                ?>
                       </select>
                 </div>


                       <input type="submit" name="edit_usertype" id="UT" value="update" class="col-sm-4 col-sm-offset-4 btn btn-primary "> 
            </form>

            <br/><br/>


	<h4>phone number: </h4>

	     <form  action="../../common_assets/DB_Commands/startPoint.php" method="post"  role="form" autocomplete="on">
                  <div class="form-group">
                       <label for="Cco">country_code: </label>
                       <input type="text" class="form-control" id="Cco" name="Cco" placeholder="country code" value="<?php echo $editing_person->CountryCode ?>">
                 </div>
                     <div class="form-group">
                       <label for="phone_number">phone_number: </label>
                       <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="phone number" value="<?php echo $editing_person->PhoneNumber ?>">
                 </div>

                       <input type="submit" name="edit_phone" id="UT" value="update" class="col-sm-4 col-sm-offset-4 btn btn-primary "> 
            </form>

            <br/><br/>
            <br/><br/>
            <br/><br/>	
</div>
</div>

</body>
</html>	