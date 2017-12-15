<?php
include_once("Connect_DB.php");
include_once("ContractClass.php");
include_once("TenderPlannedClass.php");

class SubContract extends Contract{
  
  public $id;
	public $name;
	public $notebookdistribution;
	public $plotdistribution;
  public $subcontractor;


	public $mycall;
 function __construct($id=""){

    $this->mycall = ServerCommunications::getInstance();
		$this->tenderdata=new TenderData();


                if($id!="")
            {
                  $sql="SELECT * FROM subcontract where id='$id'";
                  $result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));  
                  $commoninfo=""; 

      if($row = mysqli_fetch_array($result))
      {
        $this->name=$row['name'];
        $this->notebookdistribution=$row['notebook_distribution_no'];
        $this->plotdistribution=$row['plot_distribution_no'];
        $commoninfo=$row['Contract_Common_Info_id'];

      }
              $sql1="SELECT * FROM contract_common_info where id='$commoninfo'";
        $result1=mysqli_query($this->mycall->start,$sql1) or die(mysqli_error($this->mycall->start)); 

            if($row1= mysqli_fetch_array($result1))
      {
       $this->contractnumber=$row1['contract_no'];
         $this->notebooknum=$row1['notebook_no'];
         $this->history=$row1['history_of_edits'];
         $this->state=$row1['contract_state'];
         $this->type=$row1['ContractType_id'];
         $this->initialdate=$row1['date_initial_receipt'];
         $this->finaldate=$row1['date_final_receipt'];
         $this->totalvalue=$row1['total_transaction_value'];
         $this->downpaymentvalue=$row1['downayment_value_contract'];
         $this->downpaymentratio=$row1['downpayment_ratio'];
         $tendernum=$row1['tender_no'];
         $this->tenderdata->__set("tendernumber",$tendernum);
        $owner=$row1['owner'];
         $this->tenderdata->__set("owner",$owner);

        $tender_case=$row1['tender_case'];
         $this->tenderdata->__set("tendercase",$tender_case);

        $tender_description=$row1['tender_description'];
        $this->tenderdata->__set("tenderdescription",$tender_description);

        $this->subcontractor=$row1['user_id'];

      }

    }

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
}
// $sub=new SubContract(1);
// echo $sub->__get("name");
// echo $sub->__get("contractnumber");

?>