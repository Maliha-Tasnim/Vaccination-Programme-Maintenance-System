<?php
include('../holiday_info/db.php');
include('../holiday_info/function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM holiday_events ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE holiday_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR holiday_date LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR holiday_month LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR holiday_year LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id ASC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{

	$sub_array = array();
	$sub_array[] = $row["id"];
	$sub_array[] = $row["holiday_name"];
	$sub_array[] = $row["holiday_date"];
    $sub_array[] = $row["holiday_month"];
    $sub_array[] = $row["holiday_year"];
	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>