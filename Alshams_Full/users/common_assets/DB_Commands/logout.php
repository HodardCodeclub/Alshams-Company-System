<?php 
include_once("Connect_DB.php");
session_start();
session_destroy();

$mycall = ServerCommunications::getInstance();
mysqli_close($tmycall->start);

header("location: ../../../index.php");

?>
