<!DOCTYPE html>
<html>
<head>

  <title>project Manager</title>


<!-- <?php 
//include("../common_assets/includes/Header.php");
// include_once("../common_assets/DB_Commands/admin.class.php");
// include_once("../common_assets/DB_Commands/project_Manager.class.php");
//include_once("../common_assets/DB_Commands/User.class.php");

       
// include_once('../common_assets/DB_Commands/project_Manager.class.php');
//include_once('../common_assets/DB_Commands/ObserverClasses.php');
//include_once('../common_assets/DB_Commands/TimePlan_Class.php'); 
//include_once('includes/getnotifications.php');


//$all_projectManagers_pages = User::get_URL_pages(6);



/* 6 is project manager*/
//if(!isset($_SESSION['Identifier']) && $_SESSION['Identifier'] != 6 ){

   // header("location: ../../index.php");
//}




?> -->
<?php
 include("../common_assets/includes/Header.php");?>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 

            <script type="text/javascript" src="js/show.js"></script>
            <script type="text/javascript" src="js/alert.js"></script>
            <?php
            
// include_once("../common_assets/DB_Commands/admin.class.php");
// include_once("../common_assets/DB_Commands/project_Manager.class.php");
include_once("../common_assets/DB_Commands/User.class.php");

       
 include_once('../common_assets/DB_Commands/project_Manager.class.php');
include_once('../common_assets/DB_Commands/ObserverClasses.php');
include_once('../common_assets/DB_Commands/TimePlan_Class.php'); 
include_once('includes/getnotifications.php');

?>
            
<style type="text/css">
  
  .bokaboka {

   background-color: grey;

  }

</style>

</head>
<body >



<br/><br/><br/><br/>



<div class="container">


 
 
  <ul class="nav nav-pills nav-stacked ">
    <li class="active"><a href="includes/form.php">View Project State</a></li> 
         <li ><a href="includes/viewStages.php">View Stages</a></li>
  <?php 
  $all_projectManagers_pages = User::get_URL_pages(6);



/* 6 is project manager*/
if(!isset($_SESSION['Identifier']) && $_SESSION['Identifier'] != 6 ){

   header("location: ../../index.php");
 }

          for($i=0;$i<count($all_projectManagers_pages);$i++)
          {
            echo " <li><a href='includes" . $all_projectManagers_pages[$i]->physicalAddress . "'><span>" . $all_projectManagers_pages[$i]->friendly_name ."</span></a></li> ";
        }
        ?>

      </ul>
 

 <!-- ./col --> 

  <div id="result"></div>




</div>






</body>
</html>





