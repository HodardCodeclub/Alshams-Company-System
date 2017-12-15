

	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>

  <script type="text/javascript" src="../js/show.js"></script>
      <script type="text/javascript" src="../js/alert.js"></script>
<?php
include_once('../../common_assets/DB_Commands/Connect_DB.php');
include_once('../../common_assets/DB_Commands/project_Manager.class.php');
include_once('../../common_assets/DB_Commands/ObserverClasses.php');


if(isset($_POST['show'])){
  $mycall = ServerCommunications::getInstance();
       $name =$_POST['pname'];



$array=project_Manager::ViewProjectState($name);



echo '    <label class="form-control">Project Name:'.' ',$name,' </label>
<div class="container">
<table class="table table-hover" class="table table-condensed">
<thead>
	  <tr>
    <th>TimePlan Stage ID</th>
    <th>From Date</th> 
    <th>To Date</th>
    <th>Description</th>
    <th>Stage</th>
  </tr>
  <thead> 
  <tbody>';



  for ($i=0;$i<sizeof($array);$i++)
{
  $MessageSimulater = new MessageSimulater();//observer
$WarningNotification = new WarningNotification();//subject
$WarningNotification->attach($MessageSimulater);
$WarningNotification->updateMessages($array[$i]);
$message=$WarningNotification->__get("message");
$WarningNotification->detach($MessageSimulater);


$info="at stage".$array[$i]->__get("num");

if(strcmp($message, 'deadline Exceeded')==0)
{
echo'<script type="text/javascript">
dangeralert("',$info,'");

    </script>';

}
else if(strcmp($message, 'deadline Date')==0)
{
  echo'<script type="text/javascript">
warningalert("',$info,'");

    </script>';

}

echo '
 <tr>
 <td>',$array[$i]->id,'</td>
 <td>',$array[$i]->from,'  </td>
 <td>', $array[$i]->to,'</td>
 <td>', $array[$i]->Description,'</td>
  <td>', $array[$i]->num,'</td>


  </tr>';
    
  }   



}

?>
