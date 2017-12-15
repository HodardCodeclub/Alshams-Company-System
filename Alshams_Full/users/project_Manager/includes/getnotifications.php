 	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>

  <script type="text/javascript" src="../js/show.js"></script>
      <script type="text/javascript" src="../js/alert.js"></script>
<?php


$stages=project_Manager::allstages();

$i=0;
for($i=0;$i<sizeof($stages);$i++)
{

$MessageSimulater = new MessageSimulater();//observer
$WarningNotification = new WarningNotification();//subject
$WarningNotification->attach($MessageSimulater);
$WarningNotification->updateMessages($stages[$i]);
$message=$WarningNotification->__get("message");
$WarningNotification->detach($MessageSimulater);
$WarningNotification->updateMessages($stages[$i]);


$timeplan=new TimePlan($stages[$i]->__get("timeplanid"));
// echo $stages[$i]->__get("timeplanid");
$projectid=$timeplan->__get("ProjectObj")->__get("Id");

// echo $projectid;
$project=new Project($projectid);
$pname=$project->__get("ProjectName");
$st=$stages[$i]->__get("num");
$info=$pname.' at stage '.$st;

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


}







?>