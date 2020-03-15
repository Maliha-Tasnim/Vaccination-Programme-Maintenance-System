<?php
  $page_title = 'Dashboard';
  require_once('../load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('../main/index.php', false);}
?>
<?php include_once('../header.php'); ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
    <br>
    <?php echo display_msg($msg); ?>
  </div>
 <div class="col-md-12">
    <br>
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/K6bd3gefhc0?rel=0" allowfullscreen></iframe>
</div>
<br>
 </div>
</div>
<?php include_once('../footer.php'); ?>
