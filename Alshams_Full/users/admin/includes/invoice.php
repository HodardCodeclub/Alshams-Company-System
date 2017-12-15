<?php

include_once("../../common_assets/DB_Commands/Project_Class.php");
include_once("../../common_assets/DB_Commands/TechnicalOffice_Class.php");
include_once("../../common_assets/DB_Commands/decorativeclasses.php");

$testCase;
$Total = 0;
if(isset($_POST['select_invoice']))
{
$testCase = TechnicalOffice::getProject_invoice($_POST['projects_invoice']);
}

// from the selective project
//1) userdata
//2) project
//3)cost_Estmate item(loop)
//4) calculations;

// echo "street: ". $testCase[0]->street;

for($i=5;$i<count($testCase)+1;$i++)
{
  $Total += $testCase[$i]->TotalPrice;
}


/* observer pattern*/
$Full_Work_Tax=new AmountTax($Total);
$additional_item=new AmountTax($Total);
$Insurance_items=new AmountTax($Total);

$Full_Work_Tax=new Value_With_AdditionalItemTax($Full_Work_Tax);
$additional_item=new Value_With_InsuranceItemTax($additional_item);
$Insurance_items=new Value_With_IntegratedWorksTax($Insurance_items);



// $Full_Work_Tax = ($Total * 7)/100;
// $additional_item = ($Total *15)/100;
// $Insurance_items = ($Total *2.8)/100;


$Grand_Total = $Full_Work_Tax->calculate(); + $additional_item->calculate(); + $Insurance_items->calculate(); + $Total;

//echo $Total;
?>

<!DOCTYPE html>
<html>
<head>
	<title>contract invoice</title>
	<!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../common_assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
</head>

<style type="text/css">
	body {
    margin-top: 2px;
}

    .modified_borders{

            border: 5px solid gray;

        }

    .highlighted_boarder{
            border-bottom: 6px solid red;
            background-color: lightgrey;
    }
        hr {
      border:none;
      border-top:1px dotted #f00;
      color:#fff;
      background-color:#fff;
      height:1px;
        }
    
    .container{
        border: 1px solid #B22222;
        border-radius: 15px;
        margin-top: 1px;
        margin-bottom: 20px;

    }
    p{
            line-height: 70%;
    }
    
</style>

<body>

<div class="container">
<br/>
<!-------------------------- ---------------------------------- -->


<!-- header -->
 <div class="row ">
     <div class="col-md-4">
         <img  src="../../../images/Company_logo.png"><br/>
         <p>13-blabla street , cairo,Egypt</p>
         <p>+201158845355 , hr@alshams.com.eg</p>

     </div> <!-- ./col -->

     <div class="col-md-6 col-sm-offset-2 highlighted_boarder ">
         
         <strong>CONSTRUCTION INVOICE</strong>
         <p>terms and conditions: The agent agree on every single word in this contract</p>

     </div> <!-- ./col -->

 </div> <!-- ./row -->
<hr>

    <!-- Invoice Details -->
    <div class="row">
            <div class="col-md-3 col-sm-offset-1"> <center>Invoice No: 12677</center></div>
            <div class="col-md-3"> <center>Start Date: <?php echo $testCase[3]; ?> </center></div>
            <div class="col-md-3"> <center>Due date:<?php echo $testCase[4]; ?></center></div>
    </div> <!-- ./row -->
<hr>


        <!-- client Information and contract Details -->
        <div class="row">
            <div class="col-md-3 col-sm-offset-1   modified_borders ">
            <h5> client information: </h5>
            <br/>
            <div class="form-group form-inline">
                  <input type="text" class="form-control" size="22" value="<?php echo $testCase[0]->Street->name ?>" disabled="disabled"> <br/>
            </div>
            <div class="form-group form-inline">
                  <input type="text" class="form-control" size="22" value="<?php echo $testCase[0]->City->name . " , " . $testCase[0]->Country->name ?>" disabled="disabled"> <br/>
            </div>
            <div class="form-group form-inline">
                  <input type="text" class="form-control" size="22" value="<?php echo "+201148743985"  ?>" disabled="disabled"> <br/>
            </div>
            <div class="form-group form-inline">
                  <input type="text" class="form-control" size="22" value="<?php echo $testCase[0]->FirstName . " " . $testCase[0]->LastName ?>" disabled="disabled"> <br/>
            </div>

            <div class="form-group form-inline">
                  <input type="text" class="form-control" size="24" value="<?php echo $testCase[0]->Email ?>" disabled="disabled"> <br/>
            </div>
            </div> <!-- ./col -->
            <div class="col-md-6 col-sm-offset-1">
                <div class="form-group">
                  <label for="contract_Details">Additional informations & notes :</label>
                  <textarea class="form-control" rows="4" id="contract_Details"></textarea>
                </div>

            </div>
        </div> <!-- ./row -->
        <br/>
        <h3>Materails and labors:</h3>
        <!-- Materials/labor-->
        <div class="row">
                <table  class="table table-bordred table-striped">
                <thead> 
                    <th>Item</th>
                    <th>WorkStatement</th>
                    <th>Quantity</th>
                    <th>unit</th>
                    <th>PriceInNumber</th>
                    <th>PriceWritten</th>
                    <th>TotalPrice</th>
                </thead>
                <tbody>
                <tr>
                <?php
                   for($i=5; $i<count($testCase)+1; $i++)
                    {

                       echo "<tr>";
                       echo "<td>" . $testCase[$i]->id . "</td>";
                       echo "<td>" . $testCase[$i]->WorkStatement . "</td>";
                       echo "<td>" . $testCase[$i]->Quantity . "</td>";
                       echo "<td>" . $testCase[$i]->UnitObj->UnitName . "</td>";
                       echo "<td>" . $testCase[$i]->PriceInNumber . "LE</td>";
                       echo "<td>" . $testCase[$i]->PriceWritten . "</td>";
                       echo "<td>" . $testCase[$i]->TotalPrice . "LE</td>";
                       echo "</tr>";

                    } 
                ?>
                </tbody>
                </table>

        </div> <!-- ./row -->


        <!-- footer details -->
        <div class="row">
        <div class="modified_borders col-md-5 col-sm-offset-1">
            <h5> project  Details : </h5>
                <div class="form-group form-inline">
                  <input type="text" class="form-control" size="3" value="<?php echo "ID: ". $testCase[1]->Id ?>" disabled="disabled">
            </div>
            <div class="form-group form-inline">
                  <input type="text" class="form-control" size="22" value="<?php echo "name: " . $testCase[1]->ProjectName ?>"   disabled="disabled"> 
            </div>
            <div class="form-group form-inline">
                  <input type="text" class="form-control" size="50" value="<?php echo  "Description: ". $testCase[1]->ProjectDescription ?>"  disabled="disabled">
            </div>
            <div class="form-group form-inline">
                  <input type="text" class="form-control" size="35" value="<?php echo "type: ". $testCase[1]->ProjectType->Name ?>"  disabled="disabled">
            </div>
 
            <div class="form-group form-inline">
                  <input type="text" class="form-control" size="15" value="<?php echo "land Area: ".   $testCase[1]->LandArea  ?>"   disabled="disabled">
            </div>
            </div> <!-- ./col -->

              <div class="col-md-3 col-md-offset-3 highlighted_boarder">
                <h5><Strong> total:</Strong> <?php echo $Total ?> LE</h5>
                <h5> <Strong>full work Tax(7%):</Strong> <?php echo $Full_Work_Tax->calculate(); ?> LE</h5>
                <h5> <Strong>additional items(15%):</Strong> <?php echo $additional_item->calculate(); ?> LE</h5>
                <h5> <Strong>insurance items(2.8%):</Strong> <?php echo $Insurance_items->calculate(); ?> LE</h5>
                <h4> <Strong>Grand Total:</Strong> <?php echo $Grand_Total ?> LE</h4>
              </div>
        <div class="col-sm-offset-3 col-sm-5">
            <center><h3 style="color: red">thank you for trusting us</h3></center>
            <button type="button" class="btn btn-success btn-lg btn-block " onClick="window.print()">
                    print paper now  <span class="glyphicon glyphicon-print"></span>
                </button>
        </div>
        </div> <!-- ./row -->
        <br/>
</div>


</body>

<!-- jQuery 2.2.3 -->
<script src="../../common_assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../common_assets/bootstrap/js/bootstrap.min.js"></script>

</html>