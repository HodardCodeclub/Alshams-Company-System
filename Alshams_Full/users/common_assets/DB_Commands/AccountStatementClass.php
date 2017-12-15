<?php
include_once("Connect_DB.php");
include_once("TransactionClass.php");

class AccountStatement{
  private $id;
	private $code;
	private $accounttype;
	private $accountname;
	private $transactions;
  private $ownername;
  private $balance;
	public $mycall;

    function __construct($id=""){
		$this->mycall = ServerCommunications::getInstance();


    $sql="SELECT * FROM accountstatement";
    $result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));
    

      if($row = mysqli_fetch_array($result))
      {
        $this->id=$row['id'];
        $this->code=$row['code'];      
        $this->accounttype=$row['AccountType_id'];
        $this->accountname=$row['account_name'];
        $this->balance=$row['balance'];

      }

      $sql1="SELECT * FROM transaction where AccountStatement_id='$id'";
      $result1=mysqli_query($this->mycall->start,$sql1) or die(mysqli_error($this->mycall->start));

           $i=0;
           $idd=0;
     while($row1=mysqli_fetch_array($result1))
     {
         $idd=$row1['transaction_no'];
         $transactions[$i]=new Transaction($idd);
      $i++;
      
    }


	 }
   static function getAccountBalance($accountname)
   {
    $mycall = ServerCommunications::getInstance();
    $sql="SELECT balance FROM accountstatement where account_name='$accountname'";
    $result=mysqli_query($mycall->start,$sql) or die(mysqli_error($mycall->start));
    $balance=0;
         if($row=mysqli_fetch_array($result))
         {
          $balance=$row['balance'];
         }
         return $balance;
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