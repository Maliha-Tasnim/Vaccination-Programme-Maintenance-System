<?php
include('../holiday_info/db.php');
include('../holiday_info/function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM holiday_events 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
        $output["id"] = $row["id"];
	    $output["holiday_name"] = $row["holiday_name"];
		$output["holiday_date"] = $row["holiday_date"];
        $output["holiday_month"] = $row["holiday_month"];
        $output["holiday_year"] = $row["holiday_year"];
	}
	echo json_encode($output);
}
?>