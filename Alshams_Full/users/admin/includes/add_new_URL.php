<?php
include_once("../../common_assets/DB_Commands/userTypes.class.php");

$all_user_types = userTypes::getAlluserTypes();

?>
<!DOCTYPE html>
<html>
<head>
  <title>add new url</title>
    <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../common_assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body>


<div id="add_new_URL" >
 <br/><br/><br/><br/><br/><br/>
        <div class="row">
          <div class="col-lg-3 col-sm-offset-4">
            <form  action="../../common_assets/DB_Commands/startPoint.php" method="post">
                  <label for="URLname">URL name: </label>
                        <input type="text" class="form-control" id="URLname" name="URLname" placeholder="URL name">
                        <center>
                              Access users:<br/><br/>
                              <?php 
                              for($i=0;$i< count($all_user_types);$i++)
                            {
                             echo "<input type='checkbox' name='Users[]'' value='" . ($i+1) . "' >" .$all_user_types[$i]->userType_name ."<br/>";
                            }
                             ?>
<br/>
                   <input type="submit" name="AddURL" value="Create Link"> </center>
            </form>

        </div> <!-- ./col -->
            
      </div> <!-- ./row -->

</div> <!-- end for adding new url div -->




</body>
</html>
