<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php

include_once("../common_assets/DB_Commands/Connect_DB.php"); 
include_once("formclasses.php"); 
include_once("factory.php");  

$mycall = ServerCommunications::getInstance();

$formName = $_GET['name'];

   $form = new Form("");
    $result = $form->showForm($formName);
    $div_id = 0;
    echo "<div class='container' id='$div_id' value='$div_id'>";
    echo "<h2>" .$formName. "</h2>" ;
    for($i=0; $i<count($result); $i++) {
     
      echo $result[$i]->getFormCode();
      
      $div_id++;
    }
    echo "</div>";


?>
</body>
</html>

