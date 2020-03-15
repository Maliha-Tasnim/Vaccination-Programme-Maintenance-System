<?php
$page_title = 'My profile';
require_once('../load.php');
// Checkin What level user has permission to view this page
page_require_level(3);
?>

<?php
$user_id = (int)$_GET['id'];
if(empty($user_id)):
  redirect('../main/home.php',false);
else:
  $user_p = find_by_id('users',$user_id);
endif;
?>

<?php include_once('../header.php');?>

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="text-center">User Profile</h2>
      <hr>
      <div class="outer-scontainer">
        <div class="row">
          <div class="jumbotron">
            <div class="container">
              <h1 class="display-3"><?php echo first_character($user_p['name']); ?></h1>
              <?php if( $user_p['id'] === $user['id']):?>
              <p><a class="btn btn-primary btn-lg" href="../auth_info/edit_account.php" role="button"><i class="glyphicon glyphicon-edit"></i> Edit Profile</a></p>
              <?php endif;?>
            </div>
          </div>
        </div>
        <br>
      </div>
    </div>
  </div>
</div>

<?php include_once('../footer.php');?>