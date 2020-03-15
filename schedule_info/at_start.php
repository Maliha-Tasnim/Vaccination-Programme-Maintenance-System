<?php
$page_title = 'Create AT EPI Schedule';
require_once('../load.php');
?>

<?php
// Checkin What level user has permission to view this page
page_require_level(3);
//pull out all user form database
$all_users = find_all_user();
?>

<?php include_once('../header.php');?>

<?php
$conn = mysqli_connect("localhost", "root", "", "central_db");

if(isset($_POST['next']))
{
	//truncate AT Tables
	$sqlOne_AT="TRUNCATE TABLE at_schedule_w1";
	$result_sqlOne_AT = mysqli_query($conn, $sqlOne_AT);

	$sqlTwo_AT="TRUNCATE TABLE at_schedule_w2";
	$result_sqlTwo_AT = mysqli_query($conn, $sqlTwo_AT);

	$sqlThree_AT="TRUNCATE TABLE at_schedule_w3";
	$result_sqlThree_AT = mysqli_query($conn, $sqlThree_AT);

	for ($i=0; $i<9 ; $i++) 
	{ 
		//AT Ward 1+2+3 Creation
		$sqlWard1_AT = "INSERT INTO at_schedule_w1 (at_jan, at_feb, at_mar, at_apr, at_may, at_jun, at_jul, at_aug, at_sep, at_oct, at_nov, at_dec, ward_id, epi_year, schedule_id) VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 3)";
		$result_sqlWard1_AT = mysqli_query($conn, $sqlWard1_AT);

		$sqlWard2_AT = "INSERT INTO at_schedule_w2 (at_jan, at_feb, at_mar, at_apr, at_may, at_jun, at_jul, at_aug, at_sep, at_oct, at_nov, at_dec, ward_id, epi_year, schedule_id) VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 3)";
		$result_sqlWard2_AT = mysqli_query($conn, $sqlWard2_AT);

		$sqlWard3_AT = "INSERT INTO at_schedule_w3 (at_jan, at_feb, at_mar, at_apr, at_may, at_jun, at_jul, at_aug, at_sep, at_oct, at_nov, at_dec, ward_id, epi_year, schedule_id) VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 3)";
		$result_sqlWard3_AT = mysqli_query($conn, $sqlWard3_AT);
	}
?>
	<script type="text/javascript">
		window.location = "../schedule_info/at_year.php";
	</script> 
<?php
}
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Instruction</h2>
            <hr>
            <div class="outer-scontainer">
        <div class="row">
          <div class="jumbotron">
            <div class="container">
              <h4 class="display-3">
              	You are going to create/rechange Automated EPI Schedule. There are three different EPI Scheduling Session.<br><br>
              	<ol>
              	<li>Monday - Thursday</li>
              	<li>Sunday - Wednesday</li>
              	<li>Saturday - Tuesday</li>
              	</ol>
              	After clicking the NEXT button you can create/rechange only the <strong>Saturday-Tuesday</strong> EPI Schedule for those year which holidays are stored in our Central Database. If you still are not update the holiday list then please update the holiday list first. For update holiday list please go to <strong>Govt. Holiday Schedule/Create Holiday Schedule</strong> option from the left sided menu.
              	<br><br>

              	Ignore this line if you are going to rechange, If holidays list are already updated then please click NEXT for creating EPI Scheduling.
              </h4>
              <br>
              	<form method="post">
                	<button type="submit" class="btn btn-primary btn-sm" name="next"> NEXT</button>
            	</form>
            </div>
          </div>
        </div>
        <br>
      </div>
        </div>
    </div>
</div>

<?php include_once('../footer.php');?>