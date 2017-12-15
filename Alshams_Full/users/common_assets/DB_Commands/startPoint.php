<?php

/*--includess classes--*/
include_once("Connect_DB.php");
include_once("admin.class.php");
include_once("User.class.php");	
include_once("Customer_class.php");

include_once("CostEstimate.class.php");
include_once ("Project_Class.php");
include_once ("Item_Class.php");
include_once ("Unit_Class.php");
include_once ("TechnicalOffice_Class.php");
include_once ("TimePlan_Class.php");
include_once ("TimePlanStage_Class.php");

include_once("AccountStatementClass.php");
include_once("HeadsClasses.php");
include_once("TransactionClass.php");
include_once("ContractClass.php");
include_once("SubContractClass.php");
include_once("PriceOfferingDataClass.php");
include_once("PricingDataClass.php");
include_once("TenderPlannedClass.php");
// include_once("Demodulator.class.php");
include_once ("projectplan.claas.php");
// include_once("../includes/showaccount.php");



/*---------------W part----------------*/

if(isset($_POST['login'])){

		$UN =SecureData($_POST['Uname']);
		$PS =SecureData($_POST['password']);
		$user = new User();
		$user->login($UN,$PS);
		// exit;

}

if(isset($_POST['Add_user_Type'])){

		$UT =SecureData($_POST['Utype']);
		$myAdmin = new admin();
		$adding_result = $myAdmin->add_user_type($UT);
		header("location:  ../../admin/admin.php");
		// exit;
}

if(isset($_POST['Admin_Register'])){
	// we need some sesssions for timetamp
		$firstname =SecureData($_POST['fname']);
		$lastname=SecureData($_POST['lname']);
		$email=SecureData($_POST['email']);
		$phonenumber=SecureData($_POST['phone']);
		$countrycode=SecureData($_POST['countrycode']);
		$username=SecureData($_POST['uname']);
		$city=SecureData($_POST['city']);
		$country=SecureData($_POST['country']);
		$apartement=SecureData($_POST['apartementnumber']);
		$street=SecureData($_POST['street']);
		$gender=SecureData($_POST['gender']);
		$password=SecureData($_POST['pswrd']);
		$repassword=SecureData($_POST['repswrd']);
		$usertype=SecureData($_POST['userType']);

		$Admina = new Admin();
		$Admina->Register($firstname, $lastname, $gender, $usertype, $username, $email, $password, $phonenumber, $repassword, $country, $city, $street, $apartement, $countrycode);
				exit;

		header("location:  ../../admin/admin.php");


}

if(isset($_POST['Register'])){
// we need some sesssions for timetamp
		$firstname =SecureData($_POST['fname']);
		$lastname=SecureData($_POST['lname']);
		$email=SecureData($_POST['email']);
		$phonenumber=SecureData($_POST['phone']);
		$countrycode=SecureData($_POST['countrycode']);
		$username=SecureData($_POST['uname']);
		$city=SecureData($_POST['city']);
		$country=SecureData($_POST['country']);
		$apartement=SecureData($_POST['apartementnumber']);
		$street=SecureData($_POST['street']);
		$gender=SecureData($_POST['gender']);
		$password=SecureData($_POST['pswrd']);
		$repassword=SecureData($_POST['repswrd']);
		$usertype=2;
		$Custo = new Customer();
		$Custo->Register($firstname, $lastname, $gender, $usertype, $username, $email, $password, $phonenumber, $repassword, $country, $city, $street, $apartement, $countrycode);

		header("location:  ../../../index.php");

}



if(isset($_POST['Delete_user'])){
		$UT =SecureData($_POST['Delete_user']);
   		$myAdmin = new admin();
	$myAdmin->delete_User($UT);
		header("location:  ../../admin/admin.php");

}




if(isset($_POST['AddURL'])){
	
		$friendly_name = SecureData($_POST['URLname']);

		if(isset($_POST['Users']) && !empty($_POST['Users'])) 
		 $userType = implode('', $_POST['Users']);


// concatinate the friendly name with php (no spaces) as physical address
		$physical_Address = "/";
		$physical_Address .=preg_replace('/\s+/', '', $friendly_name) ;
		$physical_Address .=".php";
	  
	$myAdmin = new Admin();
	$myAdmin->AddURL($physical_Address,$friendly_name,$userType);

	header("location:  ../../admin/admin.php");

	  	
}



if(isset($_POST['edit_Accont_data'])){


			$email=SecureData($_POST['email']);
			$username=SecureData($_POST['username']);

			$ad = new Admin();
			$ad->edit_Accont_data($email,$username);
	header("location:  ../../admin/admin.php");


}

if(isset($_POST['edit_password'])){

			$OPS=SecureData($_POST['OPS']);
			$NPS=SecureData($_POST['NPS']);
			$CNPS=SecureData($_POST['CNPS']);


			$ad = new Admin();
			$ad->edit_password($OPS,$NPS,$CNPS);
	header("location:  ../../admin/admin.php");

}


if(isset($_POST['edit_user_data'])){

			$Fname=SecureData($_POST['Fname']);
			$Lname=SecureData($_POST['Lname']);

		$ad = new Admin();
		$ad->edit_user_data("",$Fname,$Lname);
	header("location:  ../../admin/admin.php");


}
if(isset($_POST['edit_phone'])){

			$A1=SecureData($_POST['Cco']);
			$A2=SecureData($_POST['phone_number']);

		Admin::edit_phone($A1,$A2);
	 header("location:  ../../admin/admin.php");

}


if(isset($_POST['update_permissions']))
{
	  //1) take the on clicked 
	  //2) delete old permissions all.
	  //3)add the new permissions to this user

	$userType_we_need = SecureData($_POST['which_user']);

	if(isset($_POST['type_urls']) && !empty($_POST['type_urls'])) 
	    	$urlTypes = implode('', $_POST['type_urls']);


	admin::update_permissions($userType_we_need, $urlTypes);

		header("location:  ../../admin/admin.php");


}

if(isset($_POST['add_stage_type'])){

		$UT =SecureData($_POST['stage_type']);
		admin::add_stage_type($UT);
		// header("location:  ../../admin/admin.php");

}


if(isset($_POST['add_project_stage'])){

		$UT =SecureData($_POST['Utype']);
		 Admin::add_project_stage($UT);
		// header("location:  ../../admin/admin.php");
		// exit;
}

if(isset($_POST['add_contract_type'])){

		$UT =SecureData($_POST['Utype']);
			 Admin::add_contract_type($UT);
		// header("location:  ../../admin/admin.php");
		// exit;
}



if(isset($_POST['edit_usertype'])){


	$theData = SecureData($_POST['usertypeValue']);
	admin::edit_User_type($theData);
	header("location:  ../../admin/admin.php");


}




/*------------end of W part-------------*/


/*------------HO part ---------*/
if(isset($_POST['ProjectPlanSubmit'])){       //Assign projectplan

		

		$mycall = ServerCommunications::getInstance();

        $Proname = $_POST['name'];
		$projectManager = $_POST['Pmanager'];
        $Storekeeper = $_POST['storekeeper'];
		$LocAccountant = $_POST['LocAcc'];
		$implementationEng = $_POST['ImpEngineers'];
		$No_of_civil_Eng = $_POST['civilEng'];
		$No_of_Arctictects = $_POST['Architects'];
		$No_of_electricals = $_POST['Electricals'];
		$No_of_Mechanicals = $_POST['Mechanicals'];

		$Projectobj = new Project();
		$TechOfficeobj = new TechnicalOffice();
		$ProjectPlanObj = new projectplan();

		$sql1="SELECT * FROM Project WHERE Name ='$Proname'";
		$result1=mysqli_query($mycall->start,$sql1);

		if ($row1=mysqli_fetch_array($result1))
		{
			$PId = $row1[0]; 
			$name = $row1[1];
			$PType = $row1[6];
			$PLandArea = $row1[2];
			$PLandAddress = $row1[3];
			$PDescription= $row1[4];		
		}

		$Projectobj->_setProjectName($Proname);
		$ProjectPlanObj->_setprojectManager($projectManager);
	    $ProjectPlanObj->_setStorekeeper($Storekeeper);
	    $ProjectPlanObj->_setLocAccountant($LocAccountant);
	    $ProjectPlanObj->_setimplementationEng($implementationEng);
	    $ProjectPlanObj->_setNo_of_civil_Eng($No_of_civil_Eng);
	    $ProjectPlanObj->_setNo_of_Arctictects($No_of_Arctictects);
	    $ProjectPlanObj->_setNo_of_electricals($No_of_electricals);
	    $ProjectPlanObj->_setNo_of_Mechanicals($No_of_Mechanicals);
	    $ProjectPlanObj->_setprojectplan($Projectobj);

	    $TechOfficeobj->AssignProjectPlan($ProjectPlanObj);


}

if(isset($_POST['DemodulatorSubmit'])){       //Assign Demodulator

			$mycall = ServerCommunications::getInstance();

         $Projectname = $_POST['PName'];
         $DurationFrom = $_POST['Demofrom'];
         $DurationTo = $_POST['Demoto'];
         $ContractorName = $_POST['CName'];
         $ContractorType = $_POST['CType'];
         $Spent = $_POST['Spent'];
         $downpayment = $_POST['Dpayment'];
         $Benefits = $_POST['Benefits'];
         $Deductions = $_POST['Deductions'];
         $owed_To_The_Disbusrement = $_POST['owedDis'];
         $Work_Statement1 = $_POST['Work Statement'];
         $Unit1 = $_POST['Unit'];
         $Previous_Work1 = $_POST['Previous Work'];
         $Current_Work1 = $_POST['Current Work'];
         $Total_Work1 = $_POST['Total Work'];
         $Category1 = $_POST['Category'];
         $Business_Value1 = $_POST['Business Value'];
         $Incremental_Ratio1 = $_POST['Incremental Ratio'];
         $Incremental_Value1 = $_POST['Incremental Value'];
         $Net_Work = $_POST['Net Work'];
         $Unit = $_POST['Unit'];
         $Unit = $_POST['Unit'];
         $Unit = $_POST['Unit'];
        $Projectobj = new Project();
		$TechOfficeobj = new TechnicalOffice();
		$demodulatorobj = new Demodulator();



		}


/*------- end for HO part -----------*/

/*----------------HE part -------------*/


		//To Check the connection
       // $mycall = new ServerCommunications();
	   
if(isset($_POST['CostEstimateSubmit'])){           //Assign CostEstimate
		

		$mycall = ServerCommunications::getInstance();

		$ProjectType = $_POST['projectTypeMenu'];
		$ProjectName = $_POST['projectName'];
		$Unit = $_POST['unitMenu'];  //array
		$ItemNumber = $_POST['itemNumber'];   //array
		$WorkStatement = $_POST['workStatement'];    //array
		$PriceInNumbers = $_POST['priceInNumber'];   //array
		$PriceWritten = $_POST['priceWritten'];     //array
		$TotalPrice = $_POST['totalPrice'];        //array
		$Quantity = $_POST['Quantity'];       //array

		$TechOfficeObj = new TechnicalOffice();
	    $CostEstimateObj = new CostEstimate();
	    $Project = new Project();
	   
	    $sql="SELECT * FROM Project WHERE Name ='$ProjectName'";
		$result=mysqli_query($mycall->start,$sql);

		if ($row=mysqli_fetch_array($result))
		{
			$PId = $row[0]; 
			$PName = $row[1];
			$PType = $row[6];
			$PLandArea = $row[2];
			$PLandAddress = $row[3];
			$PDescription = $row[4];		
		}

		$Project->_setPLandArea($PLandArea);
		$Project->_setPLandAddress($PLandAddress);
		$Project->_setProjectType($PType);
		$Project->_setPDescription($PDescription);
		$Project->_setProjectName($PName);
	
		for($i=0; $i< count($ItemNumber); $i++){

			$CEItem = new Item();
	    	$IUnit = new Unit();

	    	$CEItem->_setItemNo($ItemNumber[$i]);
			$CEItem->_setWorkStatement($WorkStatement[$i]);
			$CEItem->_setQuantity($Quantity[$i]);
			$CEItem->_setPriceInNumber($PriceInNumbers[$i]);
			$CEItem->_setPriceWritten($PriceWritten[$i]);
			$CEItem->_setTotalPrice($TotalPrice[$i]);

			$IUnit->_setUnitName($Unit[$i]);
            // echo $Unit[$i];
			$CEItem->_setUnit($IUnit);

			$CostEstimateObj->_setItems($CEItem,$i);
			
		}

		$CostEstimateObj->_setProject($Project);
		
		$TechOfficeObj->AssignCostEstimate($CostEstimateObj);
        
        		// mysqli_close($mycall->start);

		}

	if(isset($_POST['TimePlanSubmit'])){       //Assign TimePlan

	$mycall = ServerCommunications::getInstance();

		$PType = $_POST['ProjectTypeMenu'];
		$ProName = $_POST['PName'];
		$Stage1from = $_POST['stage1from'];
		$Stage1to = $_POST['stage1to'];
		$Stage1Desc = $_POST['stage1Desc'];

		$Stage2from = $_POST['stage2from'];
		$Stage2to = $_POST['stage2to'];
		$Stage2Desc = $_POST['stage2Desc'];

		$Stage3from = $_POST['stage3from'];
		$Stage3to = $_POST['stage3to'];
		$Stage3Desc = $_POST['stage3Desc'];

		$Stage4from = $_POST['stage4from'];
		$Stage4to = $_POST['stage4to'];
		$Stage4Desc = $_POST['stage4Desc'];

		$Stage5from = $_POST['stage5from'];
		$Stage5to = $_POST['stage5to'];
		$Stage5Desc = $_POST['stage5Desc'];

		$GracePeriod = $_POST['gracePeriod'];

		$Projectobj = new Project("");
		$TechOfficeobj = new TechnicalOffice();
		$TimePlanObj = new TimePlan();

		$sql1="SELECT * FROM Project WHERE Name ='$ProName'";
		$result1=mysqli_query($mycall->start,$sql1);

		if ($row1=mysqli_fetch_array($result1))
		{
			$PId = $row1[0]; 
			$PName = $row1[1];
			$PType = $row1[6];
			$PLandArea = $row1[2];
			$PLandAddress = $row1[3];
			$PDescription= $row1[4];		
		}

		$Projectobj->_setPLandArea($PLandArea);
		$Projectobj->_setPLandAddress($PLandAddress);
		$Projectobj->_setProjectType($PType);
		$Projectobj->_setPDescription($PDescription);
		$Projectobj->_setProjectName($PName);

		$TimePlanStageObj1 = new TimePlanStage("");

		$TimePlanStageObj1->_setDurationFrom($Stage1from);
		$TimePlanStageObj1->_setDurationTo($Stage1to);
		$TimePlanStageObj1->_setStageDesc($Stage1Desc);
		$TimePlanStageObj1->_setStageName("drilling & pilling");

		$TimePlanObj->_setTimePlanStage($TimePlanStageObj1,0);


		$TimePlanStageObj2 = new TimePlanStage();

		$TimePlanStageObj2->_setDurationFrom($Stage2from);
		$TimePlanStageObj2->_setDurationTo($Stage2to);
		$TimePlanStageObj2->_setStageDesc($Stage2Desc);
		$TimePlanStageObj2->_setStageName("concrete structure");

		$TimePlanObj->_setTimePlanStage($TimePlanStageObj2,1);


		$TimePlanStageObj3 = new TimePlanStage();

		$TimePlanStageObj3->_setDurationFrom($Stage3from);
		$TimePlanStageObj3->_setDurationTo($Stage3to);
		$TimePlanStageObj3->_setStageDesc($Stage3Desc);
		$TimePlanStageObj3->_setStageName("construction division");

		$TimePlanObj->_setTimePlanStage($TimePlanStageObj3,2);


		$TimePlanStageObj4 = new TimePlanStage();

		$TimePlanStageObj4->_setDurationFrom($Stage4from);
		$TimePlanStageObj4->_setDurationTo($Stage4to);
		$TimePlanStageObj4->_setStageDesc($Stage4Desc);
		$TimePlanStageObj4->_setStageName("health,Electricity");

		$TimePlanObj->_setTimePlanStage($TimePlanStageObj4,3);


		$TimePlanStageObj5 = new TimePlanStage();

		$TimePlanStageObj5->_setDurationFrom($Stage5from);
		$TimePlanStageObj5->_setDurationTo($Stage5to);
		$TimePlanStageObj5->_setStageDesc($Stage5Desc);
		$TimePlanStageObj5->_setStageName("finishing");

		$TimePlanObj->_setTimePlanStage($TimePlanStageObj5,4);


		$TimePlanObj->_setGracePeriod($GracePeriod);
		$TimePlanObj->_setTimePlanProject($Projectobj);

		$TechOfficeobj->AssignTimePlan($TimePlanObj);

		// mysqli_close($mycall);

		/* Timeplan stage */


	}


/*------- end for HE part -----------*/

/*-----------R part (done)-------------*/

if(isset($_POST['Apply'])){
 
    $projectname=SecureData($_POST['projectname']);
    $landarea =SecureData($_POST['landarea']);
    $projecttype=SecureData($_POST['projecttype']);
    $descr=SecureData($_POST['desc']);
    $City=SecureData($_POST['city']);
    $Country=SecureData($_POST['country']);
    $Street=SecureData($_POST['street']);
    $District=SecureData($_POST['district']);
 
 
    
      $project=new Project();
 
        $project->__set("ProjectName",$projectname);
        $project->__set("LandArea",$landarea);
        $project->__set("ProjectType",$projecttype);
        $project->__set("ProjectDescription",$descr);
 
        $customer= new Customer();
        $customer->ApplyProject($project,$City,$Country,$Street,$District);
       	header("location:  ../../customer/home.php");

}



if(isset($_POST['createaccountSupplier'])){ 
	$accountname =SecureData($_POST['accountname']);
	$accounttype =SecureData($_POST['accounttype']);
    $ownername =SecureData($_POST['suppliername']);
    $balance=SecureData($_POST['balance']);

    $accountname1="accountname";
    $accounttype1="accounttype";
    $ownername1="ownername";
    $balance1="balance";


	$account=new AccountStatement();
	$account->__set($accountname1, $accountname);
	$account->__set($accounttype1,$accounttype);
	$account->__set($ownername1, $ownername);
	$account->__set($balance1,$balance);


	$head=new HeadOfSuppliers();
	$head->CreateAccountStatement($account);
	header("location:  ../../Head_of_the_supplier_accounts/includes/NewAccountStatementForSuppliers.php");

}



if(isset($_POST['accountCustomer'])){ 
	// echo'hello from customer';
	$accountname =SecureData($_POST['accountname']);
	$accounttype =SecureData($_POST['accounttype']);
    $ownername =SecureData($_POST['customername']);
    $balance=SecureData($_POST['balance']);

    $accountname1="accountname";
    $accounttype1="accounttype";
    $ownername1="ownername";
    $balance1="balance";


	$account=new AccountStatement();
	$account->__set($accountname1, $accountname);
	$account->__set($accounttype1,$accounttype);
	$account->__set($ownername1, $ownername);
	$account->__set($balance1,$balance);


	$head=new HeadOfCustomers();
	$head->CreateAccountStatement($account);
	header("location: ../../Head_of_the_customer_accounts/includes/NewAccountStatementForCustomers.php");

}

if(isset($_POST['createaccountSub'])){ 
	$accountname =SecureData($_POST['accountname']);
	$accounttype =SecureData($_POST['accounttype']);
    $ownername =SecureData($_POST['subname']);
    $balance=SecureData($_POST['balance']);

    $accountname1="accountname";
    $accounttype1="accounttype";
    $ownername1="ownername";
    $balance1="balance";


	$account=new AccountStatement();
	$account->__set($accountname1, $accountname);
	$account->__set($accounttype1,$accounttype);
	$account->__set($ownername1, $ownername);
	$account->__set($balance1,$balance);


	$head=new HeadOfSubcontracts();
	$head->CreateAccountStatement($account);
	header("location: ../../Head_of_subcontract_accounts/includes/NewAccountStatementForSub.php");

}

// if(isset($_POST['showaccount'])){
//      $accountname =SecureData($_POST['accountname']);
//      $fromdate=SecureData($_POST['fromdate']);
//      $todate=SecureData($_POST['todate']);

// //HeadofSuppliers::ShowAccountStatement($accountname,$fromdate,$todate);    
//  //header("showaccount.php");
     
// }


if(isset($_POST['createtransaction'])){

    $accountname =SecureData($_POST['accountname']);
    $debit=SecureData($_POST['debit']);
    $credit=SecureData($_POST['credit']);
    $statement=SecureData($_POST['work']); 



    date_default_timezone_set("Africa/Cairo");
    $time= date("h:i:s");
    $date=date("Y-m-d");

    $date1="date";
    $credit1="credit";
    $debit1="debit";
    $statement1="statement";
    $time1="time";
    $id="";

    $transaction=new Transaction($id);
    $transaction->__set($date1,$date);
    $transaction->__set($credit1,$credit);
    $transaction->__set($debit1,$debit);   
    $transaction->__set($statement1,$statement);
    $transaction->__set($time1,$time);

    $head=new HeadOfSuppliers();
    $head->CreateTransaction($transaction,$accountname);
// echo "donee!!";

}

if(isset($_POST['contract'])){
	$customername =SecureData($_POST['customername']);
	$hand =SecureData($_POST['hand']);
	$public=SecureData($_POST['public']);
	$private=SecureData($_POST['private']);
	$history=SecureData($_POST['history']);
	$state=SecureData($_POST['state']);
	$type=SecureData($_POST['type']);
	$initial=SecureData($_POST['dateinitial']);
	$final=SecureData($_POST['datefinal']);
	$total=SecureData($_POST['totaltransaction']);
	$downvalue=SecureData($_POST['downvalue']);
	$downratio=SecureData($_POST['downratio']);

	$priceno=SecureData($_POST['pricingno']);
	$pricecase=SecureData($_POST['pricingcase']);
	$notebookpricing=SecureData($_POST['notepricingnum']);

	$priceofferingno=SecureData($_POST['offeringnum']);
	$offeringcase=SecureData($_POST['offeringcase']);
	$offeringnotebook=SecureData($_POST['priceoffernum']);
	$numpayments=SecureData($_POST['nopayment']);
	$quantity=SecureData($_POST['quantity']);

	$tendernum=SecureData($_POST['tendernum']);
	$owner=SecureData($_POST['owner']);
	$tendercase=SecureData($_POST['tender']);
	$tenderdes=SecureData($_POST['tenderdes']);

	$customername1="customername";
    $hand1="handligitation";
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



   $offeringdata=new Price_Offering_Data();
   $offeringdata->__set($priceofferingno1,$priceofferingno);
   $offeringdata->__set($offeringcase1,$offeringcase);
   $offeringdata->__set($offeringnotebook1,$offeringnotebook); 
   $offeringdata->__set($numpayments1,$numpayments); 
   $offeringdata->__set($quantity1,$quantity); 

   $pricingdata=new PricingData();
   $pricingdata->__set($priceno1,$priceno);
   $pricingdata->__set($pricecase1,$pricecase);
   $pricingdata->__set($notebookpricing1,$notebookpricing);
   $pricingdata->__set($pod1,$offeringdata);


   $tenderdata=new TenderData();
   $tenderdata->__set($tendernum1,$tendernum);
   $tenderdata->__set($owner1,$owner);
   $tenderdata->__set($tendercase1,$tendercase);
   $tenderdata->__set($tenderdes1,$tenderdes);



   $contract=new Contract();
   $contract->__set($customername1,$customername);
   $contract->__set($hand1,$hand);
   $contract->__set($public1,$public);  
   $contract->__set($private1,$private);  
   $contract->__set($history1,$history);  
   $contract->__set($state1,$state);  
   $contract->__set($type1,$type); 
   $contract->__set($initial1,$initial);  
   $contract->__set($final1,$final); 
   $contract->__set($total1,$total); 
   $contract->__set($downvalue1,$downvalue);
   $contract->__set($downratio1,$downratio); 
   $contract->__set($tender1,$tenderdata); 
   $contract->__set($pd1,$pricingdata); 


   $head=new HeadOfCustomers();
   $head->createcontract($contract);

      header("location: ../../Head_of_the_customer_accounts/includes/ContractForm.php");
  

}

if(isset($_POST['subcontract'])){

	$name =SecureData($_POST['subname']);
	//echo $name;
	$notedisnum=SecureData($_POST['notedisnum']);
	$plotdis=SecureData($_POST['plot']);
	$subname=SecureData($_POST['Subcontractor']);


	$history=SecureData($_POST['history']);
	$state=SecureData($_POST['state']);
	$type=SecureData($_POST['type']);
	$initial=SecureData($_POST['dateinitial']);
	$final=SecureData($_POST['datefinal']);
	$total=SecureData($_POST['totaltransaction']);
	$downvalue=SecureData($_POST['downvalue']);
	$downratio=SecureData($_POST['downratio']);

	$tendernum=SecureData($_POST['tendernum']);
	$owner=SecureData($_POST['owner']);
	$tendercase=SecureData($_POST['tender']);
	$tenderdes=SecureData($_POST['tenderdes']);


 	// echo $plotdis;

	$name1="name";
	$notedisnum1="notebookdistribution";
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


   $tenderdata=new TenderData();
   $tenderdata->__set($tendernum1,$tendernum);
   $tenderdata->__set($owner1,$owner);
   $tenderdata->__set($tendercase1,$tendercase);
   $tenderdata->__set($tenderdes1,$tenderdes);

   $contract=new SubContract();
    $contract->__set("name",$name);
   // echo $contract->__get("name");
   $contract->__set($name1,$name);
   $contract->__set($notedisnum1,$notedisnum);
   $contract->__set($plotdis1,$plotdis);

   $contract->__set($history1,$history);  
   $contract->__set($state1,$state);  
   $contract->__set($type1,$type); 
   $contract->__set($initial1,$initial);  
   $contract->__set($final1,$final); 
   $contract->__set($total1,$total); 
   $contract->__set($downvalue1,$downvalue);
   $contract->__set($downratio1,$downratio); 
   $contract->__set($tender1,$tenderdata); 
   $contract->__set("subcontractor",$subname);

   $head=new HeadOfSubcontracts();
   $head->createSubcontract($contract);

      header("location: ../../Head_of_subcontract_accounts/includes/SubContractForm.php");

}



/*-----------end for R part-------------*/



// to prevent sql injuring
function SecureData($data) {
	 
	 $data = trim($data);
	 $data = stripslashes($data);
	 $data = htmlspecialchars($data);
	 return $data;
} // end




?>
