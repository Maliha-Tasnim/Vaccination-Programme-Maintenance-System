<?php
  $page_title = 'Delete Holiday Date';
  require_once('../load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(3);
//pull out all user form database
 $all_users = find_all_user();
?>
<?php include_once('../header.php'); ?>
<?php
require_once("../holiday_info/view_db_connect.php");
$id = $_GET['id'];
//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method
$dbname = "central_db";
$conn = mysqli_connect("localhost", "root", "", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM holiday_final WHERE id = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    ?>
    <div id="page-wrapper">
  	<div class="row">
    <div class="col-lg-12">
    <br>
    <div class="jumbotron">
        <div class="container">
        <h1 class="display-3">Record has been deleted successfully!</h1>
        <p><a class="btn btn-primary btn-lg" href="../holiday_info/view_holiday.php" role="button"><i class="glyphicon glyphicon-log-out"></i> Go Back</a></p>
        </div>
    </div>
    </div>
  	</div>
	</div>
    <?php
    exit;
} else {
    ?>
    <div id="page-wrapper">
  	<div class="row">
    <div class="col-lg-12">
    <br>
    <div class="jumbotron">
        <div class="container">
        <h1 class="display-3">Something went wrong!</h1>
        <p><a class="btn btn-primary btn-lg" href="../holiday_info/view_holiday.php" role="button"><i class="glyphicon glyphicon-log-out"></i> Try Again</a></p>
        </div>
    </div>
    </div>
  	</div>
	</div>
    <?php
}
?>
<?php include_once('../footer.php'); ?>