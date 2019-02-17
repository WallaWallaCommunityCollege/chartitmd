<?php
	require_once(dirnmae(__FILE__).'/ConnectionInfo.php');

if(isset($_POST['patientid']) && isset($_POST['type']) && isset($_POST['value']) && isset($_POST['unit']) && isset($_POST['timestamp']) && isset($_POST['measuuerid']))
{
	$patientid = $_POST['patientid'];
	$type = $_POST['type'];
	$value = $_POST['type'];
	$unit = $_POST['type'];
	$timestamp = $_POST['type'];
	$measurerid = $_POST['type'];
	
	$connectionInfo = new ConnectionInfo();
	$connectionInfo->GetConnection();
	
	if(!$connectionInfo->conn)
	{
		echo 'No Connection';
	}
	else{
		$query = "INSERT INTO `measured_values` ( `measured_value_type`, `measured_value_value`, `measured_value_unit`, `measured_value_timestamp`, `measured_value_measurer_id`) VALUES ('pulse', '90', 'bpm', current_timestamp(), '1')"
}