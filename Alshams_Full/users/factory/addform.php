<html>
<head>
  <title>Add Form</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="calling.js"></script>
</head>


<body onload="calling(); calling2(); calling3();">
  <div class="container">
<h1>Add Form</h1>
<form method="post" action="formStartPoint.php">
name: <input type="text" name="formname" required="" class="form-control" ><br>
method: <input type="text" name="method" required="" class="form-control" ><br>
action: <input type="text" name="action" required="" class="form-control" ><br>
<div id="rdiv1"></div>
    <button type="submit" class="btn btn-default" name="createform"  >Createform</button>
    </form>


   <br><br>
   <h1>Add Attribute </h1>
<form method="post" action="formStartPoint.php">
Attribute name: <input type="text" name="attributename" required="" class="form-control" ><br>
<div id="rdiv2"></div>
<div id="rdiv"></div>

    <button type="submit" class="btn btn-default" name="addattribute"  >Add</button>
    </form>

</div>



</body>
</html>