<?php
  $page_title = 'Download';
  require_once('../load.php');
  page_require_level(3);
?>

<?php
  $c_user = count_by_id('users');
?>

<?php include_once('../header.php'); ?>

<div id="page-wrapper">
	<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <h1>Download</h1>
      <hr>
    </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-mobile fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      Application
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Download Now</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-newspaper-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      Document
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Download Now</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
  </div>
</div>
<?php include_once('../footer.php'); ?>
