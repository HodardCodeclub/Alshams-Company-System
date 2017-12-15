<!DOCTYPE html>
<html>
<head>
	<title>Create Account Statement</title>
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
  <script >
  $(function() {
    $( "#skills" ).autocomplete({
        source: '../includes/searchsupplier.php'
    });
});
</script>
</head>
<body >

<div class="container">
<h1>Create Account Statement</h1>
<form method="post" action="../../common_assets/DB_Commands/startPoint.php">
 <div class="form-group">
   Account name: <input type="text" name="accountname" required="" class="form-control" ><br>
   </div>
    <div class="form-group">
   Account type:      <select name="accounttype" class="form-control" >
   <option value="1">Debit</option>
   <option value="2">Credit</option>
   </select><br>
   </div>
    <div class="form-group">
    Account initial balance: <input type="number" name="balance" required="" class="form-control" ><br>
    </div>
   
    <div  class="ui-widget" class="form-group">
    Supplier Name: <input  size="100" name="suppliername" id="skills" class="form-control" required="">
     </div>
    <button type="submit" class="btn btn-default" name="createaccountSupplier">create account</button>

</form>
</div>
</body>
</html>