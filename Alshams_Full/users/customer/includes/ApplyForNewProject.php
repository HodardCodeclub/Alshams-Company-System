
<!DOCTYPE html>
<html>
<head>
  <title>Apply New Project</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/calling.js"></script>

</head>
<body onload="calling();">
<div class="container">
<h1>Apply New Project</h1>
<form method="post" action="../../common_assets/DB_Commands/startPoint.php">
<label>Project Name:</label> <input type="text" name="projectname" class="form-control" ><br>

<label>Land Area in Cubic Metre: </label><input type="number" name="landarea" class="form-control" ><br>  


<div id="result"></div>
<label>Project Description:</label><br> <textarea name="desc" cols="60" rows="10" class="form-control" ></textarea><br>
<label>Street:</label><input type="text" class="form-control" id="street"  name="street"> <br>
<label>Land District</label> 
<input type="text" class="form-control" id="district"  name="district"> <br>
  <label>Country</label>
  <select class="selectpicker" name="country" class="form-control">
  <optgroup label="E">
  <option value="1">Egypt</option>
  </optgroup>
 </select>
                                     <label>City</label>
                                    <select class="selectpicker" name="city" class="form-control">
                                         <optgroup label="A">
                                            <option value="3">Alexandria</option>
                                          </optgroup>
                                         <optgroup label="C">
                                        <option value="2">Cairo</option>
                                      </optgroup>
                                      </select><br><br>

 <button type="submit" class="btn btn-default" name="Apply">Request</button>

</form>
</div>
</body>
</html>