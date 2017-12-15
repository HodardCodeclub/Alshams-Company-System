  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<?php

include_once("../DB_Commands/HeadsClasses.php");
include_once("../DB_Commands/AccountStatementClass.php");

include_once("../DB_Commands/startPoint.php");
include("header.php");





  if(isset($_POST['showaccount'])){
     $accountname =SecureData($_POST['accountname']);
     $fromdate=SecureData($_POST['fromdate']);
     $todate=SecureData($_POST['todate']);

   $result=HeadofSuppliers::ShowAccountStatement($accountname,$fromdate,$todate);
   $balance=AccountStatement::getAccountBalance($accountname);


  $transactionnum="transactionNum";
  $debit="debit";

  $credit="credit";

  $statement="statement";
  $date="date";
  $time="time";


echo '    <label class="form-control">Account Name:'.' ',$accountname,' </label>
<label class="form-control">Account Balance: '.' ',$balance,' EGP</label>
<div class="container">
<table class="table table-hover" class="table table-condensed">
<thead>
	  <tr>
    <th>Transaction Number</th>
    <th>Debit</th> 
    <th>Credit</th>
    <th>Statement</th>
    <th>Date</th>
    <th>Time</th>
  </tr>
  <thead> 
  <tbody>';

  for ($i=0;$i<count($result);$i++)
{
echo '
 <tr>
 <td>',$result[$i]->__get($transactionnum),'</td>
 <td>',$result[$i]->__get($debit),' EGP </td>
 <td>', $result[$i]->__get($credit),' EGP</td>
 <td>', $result[$i]->__get($statement),'</td>
 <td>',$result[$i]->__get($date),'</td>
 <td>', $result[$i]->__get($time),'</td>
  </tr>';
  
}
     
}


?>
