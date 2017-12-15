 <?php

include_once("../common_assets/DB_Commands/User.class.php");

$all_customer_accounts_pages = User::get_URL_pages(8);
//8 is head of customer accounts
if(!isset($_SESSION['Identifier']) && $_SESSION['Identifier'] != 8){

    header("location: ../../index.php");
}

$nahme = $_SESSION["Nahme"];

?> 


<!DOCTYPE html>
<html lang="en">
<head>
<?php include("../common_assets/includes/Header.php");?>
  <title>home</title>
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
    <li class="active"><a href="includes/NewAccountStatementForCustomers.php">New Account Statement</a></li>
    <li><a href="../common_assets/includes/ShowAccountStatement.php">Show Account statement</a></li>
    <li><a href="../common_Assets/includes/CreateTransaction.php">Create Transaction</a></li>
    <li><a href="includes/ContractForm.php">Create Contract</a></li>
      <?php 
          for($i=0;$i<count($all_customer_accounts_pages);$i++)
          {
            echo " <li><a href='includes" . $all_customer_accounts_pages[$i]->physicalAddress . "'><span>" . $all_customer_accounts_pages[$i]->friendly_name ."</span></a></li> ";
        }
        ?>

  </ul>
</div>

</body>
</html>