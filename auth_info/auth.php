<?php include_once('../load.php');?>

<?php
$req_fields = array('username','password' );
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);

if(empty($errors))
{
  $user_id = authenticate($username, $password);
  if($user_id)
  {
    //create session with id
    $session->login($user_id);
    //Update Sign in time
    updateLastLogIn($user_id);
    $session->msg("s", "Welcome to EPI Scheduling Admin System");
    redirect('../main/home.php',false);
  } 
  else 
  {
    $session->msg("d", "Sorry, username/password does not match.");
    redirect('../main/index.php',false);
  }
} 
else 
{
  $session->msg("d", $errors);
  redirect('../main/index.php',false);
}
?>
