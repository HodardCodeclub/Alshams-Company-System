<?php

	include_once("../../common_Assets/DB_Commands/Connect_DB.php");
	include_once("../../common_Assets/DB_Commands/ContractClass.php");
		include_once("../../common_Assets/DB_Commands/ProjectType_Class.php");

		gettypes();


	function gettypes()
{
	$array=ProjectType::alltypes();
	echo '<label>Project Type:</label> <select name="projecttype" class="form-control">';
    for($i = 0; $i < sizeof($array);$i++)
  {
 echo ' 
  <option value="', $array[$i]->__get("id"),'">', $array[$i]->__get("Name"),'</option>';

  }
echo ' </select><br>';


}

?>