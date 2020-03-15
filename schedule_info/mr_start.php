<?php
$page_title = 'Create MR EPI Schedule';
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
	//truncate MR Tables
	$sqlOne_MR="TRUNCATE TABLE mr_schedule_w1";
	$result_sqlOne_MR = mysqli_query($conn, $sqlOne_MR);

	$sqlTwo_MR="TRUNCATE TABLE mr_schedule_w2";
	$result_sqlTwo_MR = mysqli_query($conn, $sqlTwo_MR);

	$sqlThree_MR="TRUNCATE TABLE mr_schedule_w3";
	$result_sqlThree_MR = mysqli_query($conn, $sqlThree_MR);

	for ($i=0; $i<9 ; $i++) 
	{ 
		//MR Ward 1+2+3 Creation
		$sqlWard1_MR = "INSERT INTO mr_schedule_w1 (mr_jan, mr_feb, mr_mar, mr_apr, mr_may, mr_jun, mr_jul, mr_aug, mr_sep, mr_oct, mr_nov, mr_dec, ward_id, epi_year, schedule_id) VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1)";
		$result_sqlWard1_MR = mysqli_query($conn, $sqlWard1_MR);

		$sqlWard2_MR = "INSERT INTO mr_schedule_w2 (mr_jan, mr_feb, mr_mar, mr_apr, mr_may, mr_jun, mr_jul, mr_aug, mr_sep, mr_oct, mr_nov, mr_dec, ward_id, epi_year, schedule_id) VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 1)";
		$result_sqlWard2_MR = mysqli_query($conn, $sqlWard2_MR);

		$sqlWard3_MR = "INSERT INTO mr_schedule_w3 (mr_jan, mr_feb, mr_mar, mr_apr, mr_may, mr_jun, mr_jul, mr_aug, mr_sep, mr_oct, mr_nov, mr_dec, ward_id, epi_year, schedule_id) VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 1)";
		$result_sqlWard3_MR = mysqli_query($conn, $sqlWard3_MR);
	}
?>
	<script type="text/javascript">
		window.location = "../schedule_info/mr_year.php";
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
                After clicking the NEXT button you can create/rechange only the <strong>Monday-Thursday</strong> EPI Schedule for those year which holidays are stored in our Central Database. If you still are not update the holiday list then please update the holiday list first. For update holiday list please go to <strong>Govt. Holiday Schedule/Create Holiday Schedule</strong> option from the left sided menu.
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