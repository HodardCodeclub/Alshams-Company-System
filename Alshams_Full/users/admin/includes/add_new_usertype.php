<?php

include_once("../../common_assets/DB_Commands/userTypes.class.php");

$all_user_types = userTypes::getAlluserTypes();

?>
<!DOCTYPE html>
<html>
<head>
	<title>add new usertype</title>
      <!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

</head>
<body>


<div id="Add_MY_user_type">
  
  <br/><br/>
  <div class="row">
          <div class="col-lg-3 col-sm-offset-4"> 

             <form  action="../../common_assets/DB_Commands/startPoint.php" method="post"  role="form" autocomplete="on">
                  <div class="form-group">
                       <label for="Utype">Add user type: </label>
                       <input type="text" class="form-control" id="Utype" name="Utype" placeholder="new user type">
                 </div>
                       <input type="submit" name="Add_user_Type" id="UT" value="Add" class="col-sm-4 col-sm-offset-4 btn btn-primary "> 
            </form>
         </div> <!-- ./col-->
         <div class="col-lg-3 col-sm-offset-1">
         <br/><br/>
         		<h4>system user types</h4>
         		        <?php 
                              for($i=0;$i< count($all_user_types);$i++)
                            {
                             echo '<h6>'.$all_user_types[$i]->userType_name .'</h6>';
                            }
                    ?>
         </div> <!-- ./col-->
  </div> <!-- end of the row-->

  	<div id="usertype_EchoResult" class="label label-success"></div>

</div> <!-- end of usertype div -->


</body>
</html>