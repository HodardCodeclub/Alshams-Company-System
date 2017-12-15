<?php
include_once("Connect_DB.php");
include_once("PriceOfferingDataClass.php");
include_once("PricingDataClass.php");
include_once("TenderPlannedClass.php");

class Contract{

public $id;
public $customername;
public $notebooknum;
public $contractnumber;
public $handligitation;
public  $publicCondition;
public $privateCondition;
public $history;
public $state;
public $type;
public $initialdate;
public $finaldate;
public $totalvalue;
public $downpaymentvalue;
public $downpaymentratio;
public $tenderdata;
public $pricingdata;
public $mycall;

	    function __construct($id=""){

    $this->mycall = ServerCommunications::getInstance();
    
    $this->tenderdata=new TenderData();
    $this->pricingdata=new PricingData();


                if($id!="")
            {
                  $sql="SELECT * FROM contract where id='$id'";
                  $result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));  
                  $commoninfo=""; 

      if($row = mysqli_fetch_array($result))
      {
        $priceno=$row['pricing_no'];

        $this->pricingdata->__set("pricingnumber",$priceno);
        $pricecase=$row['pricing_case'];

        $this->pricingdata->__set("pricingcase",$pricecase);
        $npricen=$row['notebook_pricing_no'];

        $this->pricingdata->__set("notebookpricingnumber",$npricen);
        $priceofferno=$row['price_offering_no'];

         $this->pricingdata->POD->__set("priceOfferingNumber",$priceofferno);
         $priceofferingcase=$row['price_offering_case'];

        $this->pricingdata->POD->__set("priceOfferingCase",$priceofferingcase);


        $price_offering_notebook_no=$row['price_offering_notebook_no'];
        $this->pricingdata->POD->__set("priceOfferingNotebook",$price_offering_notebook_no);

        $no_payments=$row['no_payments'];
        $this->pricingdata->POD->__set("numberpayments",$no_payments);

        $hand_ligitation=$row['hand_ligitation'];
        $this->handligitation=$hand_ligitation;

        $public_condition=$row['public_condition'];
        $this->publicCondition= $public_condition;

        $private_condition=$row['private_condition'];
        $this->privateCondition= $private_condition;

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

        $this->customername=$row1['user_id'];

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

  static function AllContractTypes()
  {
    $mycal = ServerCommunications::getInstance();

    $sql="SELECT * FROM contracttype";
    $result = mysqli_query($mycal->start , $sql)or die(mysqli_error($mycal->start));

    $types[]=new contractType();
    
        $i=0;
        $idd=0;

      while($row= mysqli_fetch_array($result))
      {
        $types[$i]=new contractType();
        $name=$row['name'];
        $idd=$row['id'];
        $types[$i]->__set("type",$name);
        $types[$i]->__set("id",$idd);

        $i++;

      }
      return $types;

  }


}

class contractType{

  private $type;
  private $mycall;
  private $id;

      function __construct($id=""){
            $this->mycall = ServerCommunications::getInstance();
            if($id!="")
            {
                $syntax = "SELECT * FROM contracttype where id = '$id' ";
                $Views = mysqli_query($mycall->start , $syntax);
                if($data = mysqli_fetch_array($Views))
                {
                  $this->id= $data["id"];
                  $this->type= $data["name"];
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
// $array=Contract::AllContractTypes();
// for($i=0;$i<sizeof($array);$i++)
// {
//   echo $array[$i]->__get("type");
// }
