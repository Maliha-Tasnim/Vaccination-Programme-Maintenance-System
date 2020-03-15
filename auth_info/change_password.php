<?php
$page_title = 'Change Password';
require_once('../load.php');
page_require_level(3);
?>

<?php $user = current_user();?>

<?php
if(isset($_POST['update']))
{
  $req_fields = array('new-password','old-password','id' );
  validate_fields($req_fields);

  if(empty($errors))
  {
    if(sha1($_POST['old-password']) !== current_user()['password'] )
    {
      $session->msg('d', "Your old password does not match.");
      redirect('../auth_info/change_password.php',false);
    }

    $id = (int)$_POST['id'];
    $new = remove_junk($db->escape(sha1($_POST['new-password'])));
    $sql = "UPDATE users SET password ='{$new}' WHERE id='{$db->escape($id)}'";
    $result = $db->query($sql);
                
    if($result && $db->affected_rows() === 1):
      $session->logout();
      $session->msg('s',"Login with your new password.");
      redirect('../main/index.php', false);
    else:
      $session->msg('d',' Sorry, failed to update.');
      redirect('../auth_info/change_password.php', false);
    endif;
  } 
  else 
  {
    $session->msg("d", $errors);
    redirect('../auth_info/change_password.php',false);
  }
}
?>

<?php include_once('../header.php');?>

<div id="page-wrapper">
  <br>
  <div class="row">
    <div class="col-lg-12">
      <?php echo display_msg($msg); ?>
    </div>

    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <span class="glyphicon glyphicon-edit"></span>
          <span>Change Password</span>
        </div>
        <div class="panel-body">
          <form method="post" action="change_password.php" class="clearfix">
            <div class="form-group">
              <label for="newPassword" class="control-label">New Password</label>
              <input type="password" class="form-control" name="new-password" placeholder="New Password">
            </div>
            <div class="form-group">
              <label for="oldPassword" class="control-label">Old Password</label>
              <input type="password" class="form-control" name="old-password" placeholder="Old Password">
            </div>
            <div class="form-group clearfix">
              <input type="hidden" name="id" value="<?php echo (int)$user['id'];?>">
              <button type="submit" name="update" class="btn btn-info">Change</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once('../footer.php');?>