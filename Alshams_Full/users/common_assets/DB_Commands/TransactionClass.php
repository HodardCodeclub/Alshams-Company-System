<?php
include_once("Connect_DB.php");
class Transaction{
	private $transactionNum;
	private $date;
	private $time;
	private $debit;
	private $credit;
	private $statement;
	public $mycall;

	    function __construct($id){
	    	
    $this->mycall = ServerCommunications::getInstance();
		if($id!="")
		{
		$sql="SELECT * FROM transaction where transaction_no='$id'";
		$result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));
			if($row = mysqli_fetch_array($result))
			{
				$this->transactionNum=$row['transaction_no'];
				$this->date=$row['date'];
				$this->time=$row['time'];
				$this->debit=$row['debit'];
				$this->credit=$row['credit'];
				$this->statement=$row['statement'];

			}	

	 }
	}
 function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

  function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }
   return $this;
  }
}

?>
