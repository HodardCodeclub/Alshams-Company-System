<?php
include_once("../../common_assets/DB_Commands/User.class.php");
include_once("../../common_assets/DB_Commands/project_Manager.class.php");



?>
<!DOCTYPE html>
<html>
<head>

	<title>Project State </title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
        <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 


  <script type="text/javascript" src="../js/show.js"></script>
   <script>
  $(function() {
    $( "#skills" ).autocomplete({
        source: 'searchproject.php'
    });
});
</script>

	</head>
	<body>
		
	<div class="container" class="hide">
	<h1>Show Project State</h1>
<form method="post" action="viewProjectState.php">

      <div  class="ui-widget" class="form-group">

Project Name: <input size="100" type="text" name="pname" required="" class="form-control" id="skills"><br>
</div>
    <button type="submit" class="btn btn-default" name="show"  >Show</button>

</form>
<br> <br>
<div id="showResult"></div>
</div>


	</body>
	</html>