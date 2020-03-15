<?php
  $page_title = 'Thanks';
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
  $con = mysqli_connect("localhost","root","","central_db");

  // Check connection
  if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
<?php
$epic_id = $_SESSION['epic_id'];
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
    	<br>
      <div class="jumbotron">
            <div class="container">
              <h1 class="display-3">Congratulations!</h1>
              <p>You are successfully registered a child on the ICT Based EPI Vaccination Form for your Union Council. Unique ID for this child is: <?php echo $epic_id; ?><br>
              You can now go back home by clicking Dashboard option from the menu or you can browse and modified your uploaded data by clicking the following button.</p>
              <p><a class="btn btn-primary btn-lg" href="../epi_details_reg/child_mod.php" role="button"><i class="glyphicon glyphicon-flag"></i> Click Here</a></p>
            </div>
          </div>
    </div>
  </div>
</div>
<?php include_once('../footer.php'); ?>
