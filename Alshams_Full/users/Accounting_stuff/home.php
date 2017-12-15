<?php

include_once("../common_assets/DB_Commands/User.class.php");

$all_AccountingStuff_pages = User::get_URL_pages(3);
/*3 is Accounting stuff*/
if(!isset($_SESSION['Identifier']) && $_SESSION['Identifier'] != 3){

    header("location: ../../index.php");
}
$nahme = $_SESSION["Nahme"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>accounting stuff</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php include("../common_assets/includes/Header.php");?>

<div class="container">
  <h3>Welcome Back <?php echo $nahme;?> </h3>

  <?php 
          for($i=0;$i<count($all_AccountingStuff_pages);$i++)
          {
            echo " <li><a href='includes" . $all_AccountingStuff_pages[$i]->physicalAddress . "'><span>" . $all_AccountingStuff_pages[$i]->friendly_name ."</span></a></li> ";
        }

        ?>

  </ul>

  
</div>

</body>
</html>