<?php
  ob_start();
  require_once('../load.php');
  if($session->isUserLoggedIn(true)) { redirect('../main/home.php', false);}
?>

<?php include_once('../header.php'); ?>

<div class="container">
  <div class="row">
    <br>
    <div class="text-center">
    <img src="../libs/img/epi_logo.jpg" alt="epi_logo" height="100" width="97">
    </div>
    <h1 class="text-center">ICT Based EPI Micro-plan Admin Panel</h1>
    <hr>
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Please Sign In</h3>
        </div>
        
        <?php echo display_msg($msg); ?>
        
        <div class="panel-body" >
          <form role="form" method="post" action="../auth_info/auth.php" class="clearfix">
            <fieldset>
              <div class="form-group">
                <input type="name" class="form-control" name="username" placeholder="username" autofocus>
              </div>
              <div class="form-group">
                <input type="password" name= "password" class="form-control" placeholder="password">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success  pull-right">Login</button>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once('../footer.php'); ?>
