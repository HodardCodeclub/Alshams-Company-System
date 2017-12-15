<?php

include_once("../common_assets/DB_Commands/User.class.php");
$all_customer_pages = User::get_URL_pages(2);

/*2 is customer*/
if(!isset($_SESSION['Identifier']) && $_SESSION['Identifier'] != 2){

    header("location: ../../index.php");
}
$nahme = $_SESSION["Nahme"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("../common_assets/includes/Header.php");?>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h3>Welcome <?php echo $nahme;?> </h3>

  <ul class="nav nav-pills nav-stacked">
   <li class="active"><a href="includes/ApplyForNewProject.php">apply for new project</a> </li>
     <?php 
          for($i=0;$i<count($all_customer_pages);$i++)
          {
            echo " <li><a href='includes" . $all_customer_pages[$i]->physicalAddress . "'><span>" . $all_customer_pages[$i]->friendly_name ."</span></a></li> ";
        }

        ?>

  </ul>

  
</div>

</body>
</html>