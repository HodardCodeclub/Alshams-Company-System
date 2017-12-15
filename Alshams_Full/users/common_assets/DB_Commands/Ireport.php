
<?php

interface IReport{
	public function ViewReport($reportname);
	public function CreateReport($SqlStatement , $reportName, $userID);
	public static function GetAllReports();
}
?>
