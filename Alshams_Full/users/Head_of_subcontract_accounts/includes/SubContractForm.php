<!DOCTYPE html>
<html>
<head>
	<title>SubContract Form</title>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/calling.js"></script>
      <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
  <script >
  $(function() {
    $( "#skills" ).autocomplete({
        source: '../includes/searchsup.php'
    });
});
</script>

</head>
<body onload="calling();">
<div class="container">
<h2> Add New Sub-Contract</h2>

<form method="post" action="../../common_assets/DB_Commands/startPoint.php">
      <div  class="ui-widget" class="form-group">
    Subcontractor Name: <input  size="100" name="Subcontractor" id="skills" class="form-control" required="">
     </div>
     <br><br>

    Name:
    <input type="text" name="subname" required="" class="form-control"><br><br>


    History of edits:
    <br><textarea name="history" cols="50" rows="10" class="form-control"></textarea><br>

    State Contract:
    <select name="state" class="form-control">
    <option value="valid">valid</option>
    <option value="void">void</option>
    <option value="voidable">voidable</option>
    <option value="unenforceable">unenforceable</option>

    </select><br><br>


    <div id='result'></div>
    <br>


    Date of Initial Receipt:
    <input type="date" name="dateinitial" required="" class="form-control"><br><br>

    Date of Final Receipt:
    <input type="date" name="datefinal" required="" class="form-control"><br><br>

    Total Transaction Value:
    <input type="number" name="totaltransaction" required="" class="form-control"><br><br>

    Downpayment Value:
    <input type="number" name="downvalue" required="" class="form-control"><br><br>

    Downpayment Ratio:
    <input type="text" name="downratio" required="" class="form-control"><br><br>


    
   

    <h4>Tender Data</h4>

    Tender No.
    <input type="number" name="tendernum" required="" class="form-control"><br><br>

    Owner
    <input type="text" name="owner" required="" class="form-control"><br><br>

    Tender Case:
    <input type="text" name="tender" required="" class="form-control"><br><br>

    Tender Description:
    <input type="text" name="tenderdes" required="" class="form-control"><br><br>

    NoteBook Distribution Number:
    <input type="number" name="notedisnum" required="" class="form-control"><br><br>

    Plot Distributiom Number:
    <input type="number" name="plot" required="" class="form-control"><br><br>
        <button type="submit" class="btn btn-default" name="subcontract"  >Add</button>




</form>
</div>

</body>
</html>