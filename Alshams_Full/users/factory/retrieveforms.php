<?php
include_once("../common_assets/DB_Commands/Connect_DB.php");
include_once("formclasses.php");


	 	$mycall = ServerCommunications::getInstance();

   $array1=Form::getAllFormsIDs();
   $array2=Form::getAllFormsNames();
    

    echo 'Form: <select name="form" required="" class="form-control">';
    for($i = 0; $i < sizeof($array1);$i++)
  {
 echo ' 
  <option value="', $array1[$i],'">', $array2[$i],'</option>';

  }
echo ' </select><br>';

?>
