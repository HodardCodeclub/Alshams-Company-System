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

          $sql = "SELECT form.id, form.action, form.method, form.name, form.page_id FROM form,page WHERE page.id= '1'";
          $result=mysqli_query($mycall->start,$sql) or die(mysqli_error($mycall->start));
         
          while($row = mysqli_fetch_array($result)) {
              $fname = $row['name'];
              $fid = $row[0];
              echo "<br>";
              echo "<div id='$fid' name='divbutt' value='$fid'> ";
              echo "<input type='button' id='$fid' value='".$row[3]."' name='".$row[3]."' onclick='sendFormName(\"$fname\")'/>";
              echo "</div>";
              echo "<br>";  
        }
?>
</body>
</html>