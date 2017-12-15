<?php
include_once("../../common_assets/DB_Commands/project_Manager.class.php");

$all_stages = stages::get_AllStages();
?>
<!DOCTYPE html>
<html>
<head>
	<title>stages type</title>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../common_assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body>

  <br/><br/><br/><br/><br/><br/>
  <div class="row">
          <div class="col-lg-3 col-sm-offset-4"> 

             <form  action="../../common_assets/DB_Commands/startPoint.php" method="post"  role="form" autocomplete="on">
                  <div class="form-group">
                       <label for="stage_type">add new stage: </label>
                       <input type="text" class="form-control" id="stage_type" name="stage_type" placeholder="new stage">
                 </div>
                       <input type="submit" name="add_stage_type" id="UT" value="Add" class="col-sm-4 col-sm-offset-4 btn btn-primary "> 
            </form>
         </div> <!-- ./col-->
         <div class="col-lg-3 col-sm-offset-1">
         <br/>
         		<h4>project stages:</h4>
         		        <?php 
                              for($i=0;$i< count($all_stages);$i++)
                            {
                             echo '<h6>'.$all_stages[$i]->name .'</h6>';
                            }
                        ?>
         </div> <!-- ./col-->
  </div> <!-- end of the row-->

</body>

<!-- jQuery 2.2.3 -->
<script src="../../common_assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../common_assets/bootstrap/js/bootstrap.min.js"></script>
</html>