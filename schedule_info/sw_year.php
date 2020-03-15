<?php
$page_title = 'SW Year Selection';
require_once('../load.php');
?>

<?php
// Checkin What level user has permission to view this page
page_require_level(3);
//pull out all user form database
$all_users = find_all_user();
?>

<?php include_once('../header.php');?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Instruction Cont.</h2>
            <hr>
            <div class="outer-scontainer">
        <div class="row">
          <div class="jumbotron">
            <div class="container">
              <h4 class="display-3">
              	<article>
              	You are going to create/rechange Automated EPI Schedule for <strong>Sunday-Wednesday</strong>
              	Please select the year from the drop down menu for creating/rechanging EPI Schedule for Sunday-Wednesday session.
                Ignore this line if you are rechanging, If you are creating schedule for the first time select <strong>Year 2018</strong> otherwise select any year from the drop down menu.
              </article>
              </h4>
              <br>
              	<form method="post">
                	<?php include_once("../schedule_info/sw/sw_main.php"); ?>
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