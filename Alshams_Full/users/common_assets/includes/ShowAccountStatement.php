<!DOCTYPE html>
<html>
<head>
	<title>show Account statements</title>
    <?php include("Header.php");?>
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


<h1>Show Account Statements</h1>

<form method="post" action="showaccount.php">
From Date: <input type="date" name="fromdate" required="" class="form-control">
To Date: <input type="date" name="todate" required="" class="form-control"><br>
      <div  class="ui-widget" class="form-group">
    Account Name: <input  size="100" name="accountname" id="skills" class="form-control" required="">
     </div>
     <br><br>
    <button type="submit" class="btn btn-default" name="showaccount"  >Show</button>

</form>

</div>

<style type="text/css">table, th, td {
    border: 1px solid black;
}</style>
</body>
</html>
