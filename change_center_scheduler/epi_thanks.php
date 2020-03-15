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
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
    	<br>
      <div class="jumbotron">
            <div class="container">
              <h1 class="display-3">Congratulations!</h1>
              <p>You are successfully changed the EPI Schedule Session for your Union Council. You can now go back home by clicking Dashboard option from the menu or you can browse your uploaded data by clicking the following button.</p>
              <p><a class="btn btn-primary btn-lg" href="../view_center_scheduler/index.php" role="button"><i class="glyphicon glyphicon-flag"></i> Click Here</a></p>
            </div>
          </div>
    </div>
  </div>
</div>
<?php include_once('../footer.php'); ?>
