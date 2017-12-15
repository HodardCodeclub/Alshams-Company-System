<!DOCTYPE html>
<html>
<head>
	<title>Create Transaction</title>
	<?php include_once("header.php");?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 

 <script>
  $(function() {
    $( "#skills" ).autocomplete({
        source: 'searchaccount.php'
    });
});
</script>

</head>
<body>

<div class="container">
<h1>Create Transaction</h1>
<form method="post" action="../DB_Commands/startPoint.php">
Debit: <input type="number" name="debit" required="" class="form-control" ><br>
Credit: <input type="number" name="credit" required="" class="form-control" ><br>
      <div  class="ui-widget" class="form-group">
    Account Name: <input  size="100" name="accountname" id="skills" class="form-control" required="">
     </div>
Statement: <br><textarea name="work" cols="40" rows="10" required="" class="form-control" ></textarea><br>
    <button type="submit" class="btn btn-default" name="createtransaction"  >Create</button>

</div>

</form>
</body>
</html>