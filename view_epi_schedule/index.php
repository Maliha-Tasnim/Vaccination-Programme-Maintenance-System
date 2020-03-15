<?php
  $page_title = 'Schedule Selection';
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
      <h1>Schedule Selection</h1>
      <hr>
      <div class="row">
      	<div class="col-lg-4 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-flash fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                MON-THU
                            </div>
                        </div>
                    </div>
                </div>
                <a href="../view_epi_schedule/mr_view_schedule.php">
                    <div class="panel-footer">
                       	<span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
      	<div class="col-lg-4 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-flash fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                SUN-WED
                            </div>
                        </div>
                    </div>
                </div>
                <a href="../view_epi_schedule/sw_view_schedule.php">
                    <div class="panel-footer">
                       	<span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
      	<div class="col-lg-4 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-flash fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                SAT-TUE
                            </div>
                        </div>
                    </div>
                </div>
                <a href="../view_epi_schedule/at_view_schedule.php">
                    <div class="panel-footer">
                       	<span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once('../footer.php'); ?>