<?php
include_once("User.class.php");
include_once("Connect_DB.php");
include_once("AccountStatementClass.php");
include_once("TransactionClass.php");
include_once("ContractClass.php");
include_once("SubContractClass.php");
interface iHead{
	public function CreateAccountStatement(AccountStatement $account);
	static function ShowAccountStatement($accountname,$fromdate,$todate);
	public function CreateTransaction(Transaction $transaction,$accountname);

}
class HeadOfSuppliers extends User implements iHead  {
	public $mycall;

	    function __construct(){

    $this->mycall = ServerCommunications::getInstance();
	}
 public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

  public function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }
   return $this;
  }


public function CreateAccountStatement(AccountStatement $account)
{ 
    $accountname1="accountname";
    $accounttype1="accounttype";
    $ownername1="ownername";
    $balance1="balance";

	$accountname=$account->__get($accountname1);
	$accounttype=$account->__get($accounttype1);
	$ownername=$account->__get($ownername1);
	$balance=$account->__get($balance1);

    $code=Generate_Random_key();
    $account->__set($code, $code);


    $last_name = (strpos($ownername, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $ownername);
    $first_name = trim( preg_replace('#'.$last_name.'#', '', $ownername ) );

    $sql="SELECT id FROM users where Fname='$first_name' AND Lname='$last_name'";

     $result=mysqli_query($this->mycall->start , $sql);
      $ownerid=0;

  while($row = $result->fetch_assoc()){
      $ownerid=$row['id'];
    }

	  $sql2="INSERT INTO accountstatement(code,account_name,balance,users_id,AccountType_id) VALUES ('$code','$accountname','$balance','$ownerid','$accounttype')";
	mysqli_query($this->mycall->start , $sql2);

    // mysqli_close($this->mycall);
}

	static function ShowAccountStatement($accountname,$fromdate,$todate){

    $mycall = ServerCommunications::getInstance();
    
		$accountname = "%".$accountname."%";
		$sql="SELECT id FROM accountstatement WHERE account_name LIKE '$accountname'";
		$result=mysqli_query($mycall->start,$sql);
		while($row = $result->fetch_assoc()){
			$id=$row['id'];
		}
		//echo $id;

		$datefrom = date('Y-m-d', strtotime(str_replace('-', '/', $fromdate)));
		$dateto = date('Y-m-d', strtotime(str_replace('-', '/', $todate)));


		$sql1="SELECT * FROM transaction where AccountStatement_id='$id' AND (date BETWEEN '$datefrom' AND '$dateto')";
		$result1=mysqli_query($mycall->start,$sql1) or die(mysqli_error($mycall->start));
		 
		 $i=0;
		 $myobj;
		 while($row1=mysqli_fetch_array($result1))
		 {
		 	$myobj[$i]=new Transaction($row1['transaction_no']);
			
			$i++;
			
		}
	
    return $myobj;

        // mysqli_close($mycall->start);

	}
	public function CreateTransaction(Transaction $transaction,$accountname){
        $mycall = ServerCommunications::getInstance();


       $date1="date";
       $credit1="credit";
       $debit1="debit";
       $statement1="statement";
       $time1="time";


       $date=$transaction->__get($date1);
       $credit=$transaction->__get($credit1);
       $debit=$transaction->__get($debit1);
       $statement=$transaction->__get($statement1);
       $time=$transaction->__get($time1);



        $accountname = "%".$accountname."%";
		$sql="SELECT id FROM accountstatement WHERE account_name LIKE '$accountname'";
		$result=mysqli_query($mycall->start,$sql);
		while($row = $result->fetch_assoc()){
			$id=$row['id'];
		}
		//echo $id;

		$sql2="INSERT INTO transaction(statement,date,time,debit,credit,AccountStatement_id)VALUES('$statement','$date','$time','$debit','$credit','$id')";
		$result2=mysqli_query($mycall->start,$sql2);
		    // mysqli_close($this->mycall->start);


	}

}


class HeadOfCustomers extends User implements iHead  {	
		public $mycall;
	    function __construct(){

    $this->mycall = ServerCommunications::getInstance();

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



	    public function CreateAccountStatement(AccountStatement $account)
{ 
    $accountname1="accountname";
    $accounttype1="accounttype";
    $ownername1="ownername";
    $balance1="balance";

  $accountname=$account->__get($accountname1);
  $accounttype=$account->__get($accounttype1);
  $ownername=$account->__get($ownername1);
  $balance=$account->__get($balance1);

    $code=Generate_Random_key();
    $account->__set($code, $code);


    $last_name = (strpos($ownername, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $ownername);
    $first_name = trim( preg_replace('#'.$last_name.'#', '', $ownername ) );

    $sql="SELECT id FROM users where Fname='$first_name' AND Lname='$last_name'";

     $result=mysqli_query($this->mycall->start , $sql);
      $ownerid=0;

  while($row = $result->fetch_assoc()){
      $ownerid=$row['id'];
    }

    $sql2="INSERT INTO accountstatement(code,account_name,balance,users_id,AccountType_id) VALUES ('$code','$accountname','$balance','$ownerid','$accounttype')";
  mysqli_query($this->mycall->start , $sql2);

    // mysqli_close($this->mycall->start);
}


	static function ShowAccountStatement($accountname,$fromdate,$todate){
	 
    //$this->mycall = ServerCommunications::getInstance();

		$accountname = "%".$accountname."%";
		$sql="SELECT id FROM accountstatement WHERE account_name LIKE '$accountname'";
    $result=mysqli_query($mycall->start,$sql);
		while($row = $result->fetch_assoc()){
			$id=$row['id'];
		}
		//echo $id;

		$datefrom = date('Y-m-d', strtotime(str_replace('-', '/', $fromdate)));
		$dateto = date('Y-m-d', strtotime(str_replace('-', '/', $todate)));

		$sql1="SELECT * FROM transaction where AccountStatement_id='$id' AND (date BETWEEN '$datefrom' AND '$dateto')";
		$result1=mysqli_query($mycall->start,$sql1) or die(mysqli_error());
		 
		 $i=0;
		 $myobj;
		 while($row1=mysqli_fetch_array($result1))
		 {
		 	$myobj[$i]=new Transaction($row1['transaction_no']);
			
			$i++;
			
		}
	
           return $myobj;

        // mysqli_close($mycall->start);

	}
	public function CreateTransaction(Transaction $transaction,$accountname){

      //  $mycall = ServerCommunications::getInstance();


       $date1="date";
       $credit1="credit";
       $debit1="debit";
       $statement1="statement";
       $time1="time";


       $date=$transaction->__get($date1);
       $credit=$transaction->__get($credit1);
       $debit=$transaction->__get($debit1);
       $statement=$transaction->__get($statement1);
       $time=$transaction->__get($time1);



        $accountname = "%".$accountname."%";
		$sql="SELECT id FROM accountstatement WHERE account_name LIKE '$accountname'";
  $result=mysqli_query($mycall->start,$sql);
  		while($row = $result->fetch_assoc()){
			$id=$row['id'];
		}
		

		$sql2="INSERT INTO transaction(statement,date,time,debit,credit,AccountStatement_id)VALUES('$statement','$date','$time','$debit','$credit','$id')";
		$result2=$this->mycall->start->query($sql2);
		  //  mysqli_close($this->mycall->start);


	}


	public function createContract(Contract $contract)
	{

            //$mycall = ServerCommunications::getInstance();


    $notebooknum1="notebooknum";
    $hand1="handligitation";
      $customername1="customername";




    $public1="publicCondition";
    $private1="privateCondition";
    $history1="history";
    $state1="state";



    $type1="type";
    $initial1="initialdate";
    $final1="finaldate";




    $total1="totalvalue";
    $downvalue1="downpaymentvalue";
    $downratio1="downpaymentratio";



    $tender1="tenderdata";
    $pd1="pricingdata";

    $priceno1="pricingnumber";
    $pricecase1="pricingcase";
    $notebookpricing1="notebookpricingnumber";
    $pod1="POD";

    $priceofferingno1="priceOfferingNumber";
    $offeringcase1="priceOfferingCase";
    $offeringnotebook1="priceOfferingNotebook";



    $numpayments1="numberpayments";
    $quantity1="quantityPerEach";

    $tendernum1="tendernumber";


    $owner1="owner";
    $tendercase1="tendercase";
    $tenderdes1="tenderdescription";

	
   $customername=$contract->__get($customername1);
   $hand=$contract->__get($hand1);



   $public=$contract->__get($public1); 
   $private=$contract->__get($private1);  
   $history=$contract->__get($history1);  
   $state=$contract->__get($state1); 



   $type= $contract->__get($type1); 
   $initial=$contract->__get($initial1); 
   $final=$contract->__get($final1);
   $total=$contract->__get($total1); 
   $downvalue=$contract->__get($downvalue1);




   $downratio=$contract->__get($downratio1);
   $tender=$contract->__get($tender1);
   $pd=$contract->__get($pd1);



   $priceno=$pd->__get($priceno1);
   $pricecase=$pd->__get($pricecase1);
   $notebookpricing=$pd->__get($notebookpricing1);

   $pod=$pd->__get($pod1);

   $priceofferingno=$pod->__get($priceofferingno1);
   $offeringcase=$pod->__get($offeringcase1);
   $offeringnotebook=$pod->__get($offeringnotebook1);
   $numpayments=$pod->__get($numpayments1);
   $pereach=$pod->__get($quantity1);



   $tendernum=$tender->__get($tendernum1);
   $owner=$tender->__get($owner1);
   $tendercase=$tender->__get($tendercase1);
   $tenderdes=$tender->__get($tenderdes1);


   $contractno=Generate_Random_key();
   $notebooknum=Generate_Random_key();


  $start = date('Y-m-d', strtotime(str_replace('-', '/', $initial)));
	$end = date('Y-m-d', strtotime(str_replace('-', '/', $final)));

    $last_name = (strpos($customername, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $customername);
    $first_name = trim( preg_replace('#'.$last_name.'#', '', $customername ) );

    $sql0="SELECT id FROM users where Fname='$first_name' AND Lname='$last_name'";

     $result0=mysqli_query($this->mycall->start , $sql0);
      $ownerid=0;

  while($row0 = $result0->fetch_assoc()){
      $ownerid=$row0['id'];
    }


	$sql1="INSERT INTO contract_common_info(contract_no, notebook_no, history_of_edits, contract_state, date_initial_receipt ,date_final_receipt ,total_transaction_value , downpayment_ratio , downayment_value_contract , tender_no , owner,tender_case , tender_description ,ContractType_id,user_id)VALUES('$contractno','$notebooknum', '$history','$state', '$start', '$end', '$total', '$downvalue', '$downratio','$tendernum','$owner', '$tendercase','$tenderdes','$type','$ownerid')";
			   $result=mysqli_query($this->mycall->start,$sql1);

			if (!$result) {
    die('Invalid query: ' . mysqli_error($this->mycall->start));
}



	$sql2="SELECT id FROM contract_common_info where contract_no='$contractno'";
			$result2=mysqli_query($this->mycall->start,$sql2);
		while($row = $result2->fetch_assoc()){
			$id=$row['id'];
		}		
			if (!$result2) {
    die('Invalid query: ' . mysqli_error($this->mycall->start));
}

	$sql3="INSERT INTO contract( pricing_no , pricing_case , notebook_pricing_no, price_offering_no , price_offering_case , price_offering_notebook_no , no_payments ,hand_ligitation , public_condition , private_condition , Contract_Common_Info_id) VALUES('$priceno', '$pricecase','$notebookpricing', '$priceofferingno','$offeringcase', '$offeringnotebook', '$numpayments', '$hand','$public','$private', '$id' )";

		$result3=mysqli_query($this->mycall->start,$sql3);

								if (!$result3) {
    die('Invalid query: ' . mysqli_error($this->mycall->start));


}

	$sql4="SELECT id from contract where Contract_Common_Info_id='$id'";
			$result4=mysqli_query($this->mycall->start,$sql4);



						if (!$result4) {
    die('Invalid query: ' . mysqli_error($this->mycall->start));


}
			while($row1 = $result4->fetch_assoc()){
			$contractid=$row1['id'];
		}

		$sql5= "INSERT INTO ContractPayments(quantity_per_each_payment , Contract_id )VALUES('$pereach', '$contractid')";
		$result5=mysqli_query($this->mycall->start,$sql5);		


						if (!$result5) {
    die('Invalid query: ' . mysqli_error($this->mycall->start));


}

// mysqli_close($this->mycall->start);



}


}


class HeadOfSubcontracts extends User implements iHead  {
		public $mycall;

    function __construct(){

    $this->mycall = ServerCommunications::getInstance();
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



    public function CreateAccountStatement(AccountStatement $account)
{ 
    $accountname1="accountname";
    $accounttype1="accounttype";
    $ownername1="ownername";
    $balance1="balance";

  $accountname=$account->__get($accountname1);
  $accounttype=$account->__get($accounttype1);
  $ownername=$account->__get($ownername1);
  $balance=$account->__get($balance1);

    $code=Generate_Random_key();
    $account->__set($code, $code);


    $last_name = (strpos($ownername, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $ownername);
    $first_name = trim( preg_replace('#'.$last_name.'#', '', $ownername ) );

    $sql="SELECT id FROM users where Fname='$first_name' AND Lname='$last_name'";

     $result=mysqli_query($this->mycall->start , $sql);
      $ownerid=0;

  while($row = $result->fetch_assoc()){
      $ownerid=$row['id'];
    }

    $sql2="INSERT INTO accountstatement(code,account_name,balance,users_id,AccountType_id) VALUES ('$code','$accountname','$balance','$ownerid','$accounttype')";
  mysqli_query($this->mycall->start , $sql2);
}

	static function ShowAccountStatement($accountname,$fromdate,$todate){
	   
   // $this->mycall = ServerCommunications::getInstance();

		$accountname = "%".$accountname."%";
		$sql="SELECT id FROM accountstatement WHERE account_name LIKE '$accountname'";
    $result=mysqli_query($mycall->start,$sql);
		while($row = $result->fetch_assoc()){
			$id=$row['id'];
		}
		//echo $id;

		$datefrom = date('Y-m-d', strtotime(str_replace('-', '/', $fromdate)));
		$dateto = date('Y-m-d', strtotime(str_replace('-', '/', $todate)));

		$sql1="SELECT * FROM transaction where AccountStatement_id='$id' AND (date BETWEEN '$datefrom' AND '$dateto')";
		$result1=mysqli_query($mycall->start,$sql1) or die(mysqli_error());
		 
		 $i=0;
		 $myobj;
		 while($row1=mysqli_fetch_array($result1))
		 {
		 	$myobj[$i]=new Transaction($row1['transaction_no']);
			
			$i++;
			
		}
	
           return $myobj;

        // mysqli_close($mycall->start);

	}
	public function CreateTransaction(Transaction $transaction,$accountname){
       // $mycall = ServerCommunications::getInstance();


       $date1="date";
       $credit1="credit";
       $debit1="debit";
       $statement1="statement";
       $time1="time";


       $date=$transaction->__get($date1);
       $credit=$transaction->__get($credit1);
       $debit=$transaction->__get($debit1);
       $statement=$transaction->__get($statement1);
       $time=$transaction->__get($time1);



        $accountname = "%".$accountname."%";
		$sql="SELECT id FROM accountstatement WHERE account_name LIKE '$accountname'";
  $result=mysqli_query($mycall->start,$sql);    
		while($row = $result->fetch_assoc()){
			$id=$row['id'];
		}
		//echo $id;

		$sql2="INSERT INTO transaction(statement,date,time,debit,credit,AccountStatement_id)VALUES('$statement','$date','$time','$debit','$credit','$id')";
		$result2=$this->mycall->start->query($sql2);
		  //  mysqli_close($this->mycall->start);


	}
	public function createSubcontract(SubContract $contract)
	{
      //  $mycall = ServerCommunications::getInstance();

	$name1="name";
	$notebookdis1="notebookdistribution";




	$plotdis1="plotdistribution";

	
    $history1="history";


    $state1="state";
    $type1="type";
    $initial1="initialdate";


    $final1="finaldate";
    $total1="totalvalue";
    $downvalue1="downpaymentvalue";
    $downratio1="downpaymentratio";


    $tender1="tenderdata";


    $tendernum1="tendernumber";
    $owner1="owner";
    $tendercase1="tendercase";
    $tenderdes1="tenderdescription";


    $subname=$contract->__get("subcontractor");
    echo  $subname;

    $name=$contract->__get($name1);
    $notebookdis=$contract->__get($notebookdis1);
    $plotdis=(int)$contract->__get($plotdis1);


   $history=$contract->__get($history1);  
   $state=$contract->__get($state1); 
   $type= (int)$contract->__get($type1); 
   $initial=$contract->__get($initial1); 
   $final=$contract->__get($final1);
   $total=$contract->__get($total1); 
   $downvalue=$contract->__get($downvalue1);
   $downratio=$contract->__get($downratio1);
   $tender=$contract->__get($tender1);

   $tendernum=$tender->__get($tendernum1);

   $owner=$tender->__get($owner1);
   $tendercase=$tender->__get($tendercase1);
   $tenderdes=$tender->__get($tenderdes1);

   $contractno=Generate_Random_key();
   $notebooknum=Generate_Random_key();



    $start = date('Y-m-d', strtotime(str_replace('-', '/', $initial)));
	$end = date('Y-m-d', strtotime(str_replace('-', '/', $final)));

      $last_name = (strpos($subname, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $subname);
    $first_name = trim( preg_replace('#'.$last_name.'#', '', $subname ) );
  //  echo $last_name ."<br/>";
    $sql0="SELECT id FROM users where Fname='$first_name' AND Lname='$last_name'";

     $result0=mysqli_query($this->mycall->start , $sql0);
      $ownerid=0;

  while($row0 = $result0->fetch_assoc()){
      $ownerid=$row0['id'];
    }

    // echo "user: ".  $ownerid;
	$sql1="INSERT INTO contract_common_info(contract_no, notebook_no, history_of_edits, contract_state, date_initial_receipt ,date_final_receipt ,total_transaction_value , downpayment_ratio , downayment_value_contract , tender_no , owner,tender_case , tender_description ,ContractType_id,user_id)VALUES('$contractno','$notebooknum', '$history','$state', '$start', '$end', '$total', '$downvalue', '$downratio','$tendernum','$owner', '$tendercase','$tenderdes','$type','$ownerid')";
			$result=mysqli_query($this->mycall->start,$sql1);
			if (!$result) {
    die('Invalid query: ' . mysqli_error($this->mycall->start));
}



	$sql2="SELECT id FROM contract_common_info where contract_no='$contractno'";
			$result2=mysqli_query($this->mycall->start,$sql2);
		while($row = $result2->fetch_assoc()){
			$id=$row['id'];
		}		
			if (!$result2) {
    die('Invalid query: ' . mysqli_error($this->mycall->start));
}


$sql3="INSERT INTO subcontract(name, notebook_distribution_no , plot_distribution_no , Contract_Common_Info_id)VALUES('$name','$notebookdis', '$plotdis', '$id')";


		$result3=mysqli_query($this->mycall->start,$sql3);

								if (!$result3) {
    die('Invalid query: ' . mysqli_error($this->mycall->start));
    }


	}


}

	 function Generate_Random_key($length = 10){

		$charater = "123456789";
		$length = strlen($charater);
		$randomString = '';
		for($i=0;$i< $length ; $i++)
		{
			$randomString .= $charater[rand(0,$length-1)];
		}
		return $randomString;
	}

?>
