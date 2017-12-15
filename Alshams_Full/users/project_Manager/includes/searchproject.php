<?php
 include_once('../../common_assets/DB_Commands/Connect_DB.php');

  getproject();

  function getproject()
  {
  $mycall =  ServerCommunications::getInstance();
  $searchTerm = $_GET['term'];
  $sql="SELECT Name from project where Name Like '%".$searchTerm."%' ORDER BY Name ASC";
  $result = mysqli_query($mycall->start , $sql) or die(mysqli_error($mycall->start));

   while($row = $result->fetch_assoc()){
      $name[]=$row['Name'];
    }
    echo json_encode($name);
  }


  ?>

