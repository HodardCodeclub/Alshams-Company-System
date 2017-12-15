<?php


include_once("../common_assets/DB_Commands/User.class.php");

$all_Technical_pages = User::get_URL_pages(5);

/*5 is technical office*/
if(!isset($_SESSION['Identifier']) && $_SESSION['Identifier'] != 5){

    header("location: ../../index.php");
}

$nahme = $_SESSION["Nahme"];

?>

<!DOCTYPE html>
<html>
<head>
	<?php include("../common_assets/includes/Header.php");?>
  <title>Technical office</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head>
<body>




  <div class="container">
    <h3>Welcome Back <?php echo $nahme;?> </h3>

      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="Forms/CostEstimate_Form.php">cost estimate</a></li>
        <li><a href="Forms/TimePlan_Form.php">time plan form</a></li>
                <li><a href="Forms/Demodulator_Form.php">Demodulator form</a></li>
        <li><a href="Forms/ProjectPlan_Form.php">Project Plan form</a>
          <?php 
              for($i=0;$i<count($all_Technical_pages);$i++)
              {
                echo " <li><a href='includes" . $all_Technical_pages[$i]->physicalAddress . "'><span>" . $all_Technical_pages[$i]->friendly_name ."</span></a></li> ";
            }

            ?>

      </ul>
  </div>


<br/>


</body>
</html>

