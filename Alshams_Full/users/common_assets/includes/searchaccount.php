<?php

	include_once("../DB_Commands/Connect_DB.php");
  getaccount();

  function getaccount()
  {
  $mycall =  ServerCommunications::getInstance();
  $searchTerm = $_GET['term'];
  $sql="SELECT account_name from accountstatement where account_name Like '%".$searchTerm."%' ORDER BY account_name ASC";
  $result = mysqli_query($mycall->start , $sql) or die(mysqli_error($mycall->start));

   while($row = $result->fetch_assoc()){
      $name[]=$row['account_name'];
    }
    echo json_encode($name);
  }


  ?>

