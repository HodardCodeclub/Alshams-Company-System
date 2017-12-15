<?php
	include_once("../../common_Assets/DB_Commands/Connect_DB.php");
	include_once("../../common_Assets/DB_Commands/ContractClass.php");
	gettypes();
function gettypes()
{
	$array=contract::AllContractTypes();
	echo 'Type Of Contract: <select name="type" class="form-control">';
    for($i = 0; $i < sizeof($array);$i++)
  {
 echo ' 
  <option value="', $array[$i]->__get("id"),'">', $array[$i]->__get("type"),'</option>';

  }
echo ' </select><br>';


}

?>