<?php
include_once("../../common_assets/DB_Commands/ProjectType_Class.php");
$all_stages = ProjectType::alltypes();

// $all_stages = ProjectType::alltypes();
                    // $project=new ProjectType();
                   // $all_stages= $project->alltypes();


?>
<!DOCTYPE html>
<html>
<head>
	<title>project types</title>
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
                       <label for="Utype"> new project type: </label>
                       <input type="text" class="form-control" id="Utype" name="Utype" placeholder="new type">
                 </div>
                       <input type="submit" name="add_project_stage" id="UT" value="Add" class="col-sm-4 col-sm-offset-4 btn btn-primary "> 
            </form>
         </div> <!-- ./col-->
         <div class="col-lg-3 col-sm-offset-1">
         <br/>
         		<h4>contract types:</h4>
         		        <?php 

                              for($i=0;$i< count($all_stages);$i++)
                            {
                             echo '<h6>'.$all_stages[$i]->Name .'</h6>';
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