
<!DOCTYPE html>
<html>
<head>
	<title>Time Plan Form</title>
    <script type="text/javascript" src="../js/calling.js"></script>


</head>
<body onload="calling();">

<h2> The Technical Office(Time plan Form) </h2>

<form action="../../common_assets/DB_Commands/startPoint.php" method="post">
    
    Project Type:
<div id="result"></div>

	Project Name:
	<input type="text" name="PName"><br><br>

	
	<h4>First Stage (Drilling and Piling)</h4>
	Duration from:
	<input type="date" value="2017-02-25" name="stage1from">
	to 
	<input type="date" value="2018-02-25" name="stage1to"><br>

	Description:<br>
	<input type="text" name="stage1Desc"><br><br>
	
	<h4 name="Concrete Structure">Second Stage (Concrete Structure)</h4>
	Duration from:
	<input type="date" value="2017-02-25" name="stage2from">
	to 
	<input type="date" value="2018-02-25" name="stage2to"><br>
	Description:<br>
	<input type="text" name="stage2Desc"><br><br>
	
	<h4 name="Construction division">Third Stage (Construction division)</h4>
	Duration from:
	<input type="date" value="2017-02-25" name="stage3from">
	to 
	<input type="date" value="2018-02-25" name="stage3to"><br>
	Description:<br>
	<input type="text" name="stage3Desc"><br><br>

	<h4 name="Health and electricity">Forth Stage (Health and electricity)</h4>
	Duration from:
	<input type="date" value="2017-02-25" name="stage4from">
	to 
	<input type="date" value="2018-02-25" name="stage4to"><br>
	Description:<br>
	<input type="text" name="stage4Desc"><br><br>

	<h4 name="Finishes">Fifth Stage (Finishes)</h4>
	Duration from:
	<input type="date" value="2017-02-25" name="stage5from">
	to 
	<input type="date" value="2018-02-25" name="stage5to"><br>
	Description:<br>
	<input type="text" name="stage5Desc"><br><br>


    Grace period:
    <input type="text" name="gracePeriod"><br><br>

    <input type="submit"  name="TimePlanSubmit">
    
</form>

</body>
</html>