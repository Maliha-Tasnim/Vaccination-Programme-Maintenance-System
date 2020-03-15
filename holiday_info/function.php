<?php
function get_total_all_records()
{
	include('../holiday_info/db.php');
	$statement = $connection->prepare("SELECT * FROM holiday_events");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>