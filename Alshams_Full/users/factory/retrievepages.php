<?php
include_once("../common_assets/DB_Commands/Connect_DB.php");
include_once("formclasses.php");
	 	$mycall = ServerCommunications::getInstance();

   $array2=Page::getAllPagesNames();
   $array1=Page::getAllPagesIDs();
    

    echo 'Page: <select name="pageid" required="" class="form-control">';
    for($i = 0; $i < sizeof($array1);$i++)
  {
 echo ' 
  <option value="', $array1[$i],'">', $array2[$i],'</option>';

  }
echo ' </select><br>';

?>
