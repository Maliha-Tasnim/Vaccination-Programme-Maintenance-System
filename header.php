<?php $user = current_user(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>
    <?php 
    if (!empty($page_title))
      echo remove_junk($page_title);
    elseif(!empty($user))
      echo ucfirst($user['name']);
    else 
      echo "EPI Automated System";
    ?>
  </title>

  <!-- Bootstrap Core CSS -->
  <link href="../libs/dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="../libs/dist/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../libs/dist/sb-admin/sb-admin-2.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="../libs/dist/morrisjs/morris.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../libs/dist/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php if ($session->isUserLoggedIn(true)): ?>
<div id="wrapper">
  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
      <span class="navbar-brand">
        <strong>EPI Scheduling AS</strong>
      </span>
    </div>
            
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
      <!-- /.dropdown -->
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i>
            <span>
              <?php echo remove_junk(ucfirst($user['name'])); ?> 
              <i class="caret"></i>
            </span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="../auth_info/profile.php?id=<?php echo (int)$user['id'];?>"><i class="glyphicon glyphicon-user"></i> View Profile</a></li>
            <li> <a href="../auth_info/edit_account.php" title="edit account"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
            <li class="divider"></li>
            <li><a href="../auth_info/logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
          </ul>
      <!-- /.dropdown-user -->
      </li>
    <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
      <?php if($user['user_level'] === '1'): ?>
        <?php include_once('../menu/admin_menu.php');?>
      <?php elseif($user['user_level'] === '2'): ?>
        <?php include_once('../menu/special_menu.php');?>
      <?php elseif($user['user_level'] === '3'): ?>
        <?php include_once('../menu/user_menu.php');?>
      <?php endif;?>
      <?php endif;?>        
    <!-- /.sidebar-collapse -->
    </div>
  <!-- /.navbar-static-side -->
  </nav>
</div>
