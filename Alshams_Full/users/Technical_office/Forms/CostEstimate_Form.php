<?php 

?>

<!DOCTYPE html>
<html>
<head>
	<title> Cost Estimate</title>

    <link rel="stylesheet" type="text/css" href="../assets/css/CostEstimate_CSS.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/Items_CSS.css">
    <script type="text/javascript" src="../assets/js/CostEstimate_Code.js"></script>
    <script type="text/javascript" src="../js/calling.js"></script>

</head>
<body onload="calling();">

<div class="form-style-3">

<form action="../../common_assets/DB_Commands/startPoint.php" method="post">
<fieldset><legend>Cost Estimate</legend>
<fieldset><legend>Project Info</legend>
<label for="field1"><span>Project Type <span class="required"></span></span>

    <div id="result"></div>
</label>
<label for="field2"><span> Project Name <span class="required"></span></span>
<input type="text" name="projectName" class="input-field"><br><br>
</label>
</fieldset>

<p> 
  <input type="button" value="Add Item" onClick="addRow('dataTable')" /> 
  <input type="button" value="Remove Item" onClick="deleteRow('dataTable')" /> 
</p><br>

<fieldset ><legend>Items</legend>

<table id="dataTable" class="form" border="1" > 
 <tbody>
  <tr>
    <p>
    <td >
        <input type="checkbox" name="chk[]" checked="checked" />
    </td>

    <td>
    <label>Item Number<input type="number" name="itemNumber[]" id="itemNumber"></label>
    </td>

    <td>
    <label for="BX_age">Work Statement</label><textarea name="workStatement[]" class="textarea-field"></textarea>
    </td>

    <td>
    <label for="BX_gender">Unit</label>
    <select name="unitMenu[]" id="unitMenu">
    <option value="m^2">m^2</option>
    <option value="m">m</option>
    <option value="m^3">m^3</option>
    <option value="Kgm">Kgm</option>
    </select>
    </td>

    <td>
    <label for="BX_birth" >Quantity</label>
    <input type="number" name="Quantity[]" id="quantity" >
    </td>

    <td>
    <label for="BX_birth">Price in Numbers</label>
    <input type="number" name="priceInNumber[]" id="priceInNumbers" >
    </td>
    <td>
    <label for="BX_birth">Price Written</label>
    <input type="text" name="priceWritten[]"  >
    </td>

    <td>
    <label for="BX_birth">Total Price</label>
    <!-- <output type="number" name="totalPrice[]" id="totalPrice" </output> -->
    <input type="text" name="totalPrice[]">
    </td>

    </p>
  </tr>
 </tbody>
</table>

</fieldset>

<label><span>&nbsp;</span><input type="submit" name="CostEstimateSubmit" value="Submit" /></label> 

</fieldset>
</form>
</div>

</body>
</html>

