<?php

include_once("../common_assets/DB_Commands/User.class.php");

$all_head_of_auditing_pages = User::get_URL_pages(10);

/*10 is subcontract*/
if(!isset($_SESSION['Identifier']) && $_SESSION['Identifier'] != 10){

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
  <h3>Welcome Back <?php echo $nahme;?> </h3>

  <ul class="nav nav-pills nav-stacked">
          <?php 
          for($i=0;$i<count($all_head_of_auditing_pages);$i++)
          {
            echo " <li><a href='includes" . $all_head_of_auditing_pages[$i]->physicalAddress . "'><span>" . $all_head_of_auditing_pages[$i]->friendly_name ."</span></a></li> ";
        }
        ?>
  </ul>
</div>

</body>
</html>