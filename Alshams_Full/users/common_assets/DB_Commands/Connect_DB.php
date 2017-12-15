<?php

class ServerCommunications{

private $servername = "localhost";
private $serverusername = "root";
private $serverpassword = "";
private $databaseName = "alshamscompanyfinal";
public  $start; 
private static $strong_Instance = null;

private function __construct() {

	 $this->start= mysqli_connect($this->servername, $this->serverusername, $this->serverpassword, $this->databaseName);
		if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
				 E_USER_ERROR);
		}
}


// Singleton Design pattern for only one object connection
public static function getInstance()
{
	if(self::$strong_Instance==null)
	{
		self::$strong_Instance = new ServerCommunications();
	}
 return ServerCommunications::$strong_Instance;
}


} // end of ServerCommunications class


// for($i=0;$i<1000;$i++)
// {

// 	 $A =  ServerCommunications::getInstance();
// 	 $logging_IN = "SELECT * FROM users";
// 	 $query = mysqli_query( $A->start ,$logging_IN);
// 	 if($query)
// 	 {
// 	 	echo "success <br/>";
// 	 }

// }

?>