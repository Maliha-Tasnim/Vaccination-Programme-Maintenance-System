<?php
include('../holiday_info/db.php');
include('../holiday_info/function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$statement = $connection->prepare("
			INSERT INTO holiday_events (holiday_name, holiday_date, holiday_month, holiday_year) 
			VALUES (:holiday_name, :holiday_date, :holiday_month, :holiday_year)
		");
		$result = $statement->execute(
			array(
				':holiday_name'	    =>	$_POST["holiday_name"],
				':holiday_date'	    =>	$_POST["holiday_date"],
                ':holiday_month'	=>	$_POST["holiday_month"],
                ':holiday_year'		=>	$_POST["holiday_year"],
			)
		);
		if(!empty($result))
		{
			echo 'Holiday Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			"UPDATE holiday_events 
			SET holiday_name = :holiday_name, holiday_date = :holiday_date, holiday_month = :holiday_month, holiday_year = :holiday_year 
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':holiday_name'	=>	$_POST["holiday_name"],
				':holiday_date'	=>	$_POST["holiday_date"],
                ':holiday_month'	=>	$_POST["holiday_month"],
                ':holiday_year'	=>	$_POST["holiday_year"],
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Holiday Updated';
		}
	}
}

?>