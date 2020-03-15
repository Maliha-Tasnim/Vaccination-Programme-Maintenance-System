<?php
  $page_title = 'Add Holiday';
  require_once('../load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(3);
//pull out all user form database
 $all_users = find_all_user();
?>
<?php include_once('../header.php'); ?>
<?php
$con=mysqli_connect("localhost","root","","central_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

mysqli_select_db($con,"central_db");

function add_user($data)
{   
  global $con;
  $holiday_name   = $data['holiday_name'];
  $holiday_date   =   $data['holiday_date'];
  $holiday_month  =   $data['holiday_month'];
  $holiday_year     =   $data['holiday_year'];

  $query = mysqli_query($con,"Insert INTO holiday_final(holiday_name, holiday_date, holiday_month, holiday_year) VALUES('$holiday_name','$holiday_date','$holiday_month','$holiday_year')") or die(mysqli_error()); 
  if($query)
  { 
    return true;
   }
  else
  { 
    return false; 
  }
}

if(isset($_POST['action']) AND $_POST['action']=='useradd') 
{
  add_user($_POST);
  $message = "Holiday added successfully.";
}
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Add New Holiday</h1>
      <hr>
      <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
      <div align="right" style="padding-bottom:5px;"><a href="../holiday_info/view_holiday.php">Back to Holiday</a>
      </div>
      <form name="frmUser" method="post" action="">
      <div class="form-group">
      <table class="table table-bordered">
        <tr>
          <th>Holiday Name</th>
          <th>Holiday Date</th>
          <th>Holiday Month</th>
          <th>Holiday Year</th>
        </tr>
        
        <tr>
          <td><input name="holiday_name" class="form-control" type="text" required></td>
          <td><input name="holiday_date" class="form-control"  min="1" max="31" type="number" required></td>
          <td><input name="holiday_month" class="form-control" min="1" max="12" type="number" required></td>
          <td><input name="holiday_year" class="form-control" min="2018" max="9999" type="number" required></td>
        </tr>
        
        <tr>
            <td colspan="6">
              <input type="hidden" id="action" name="action" value="useradd">
              <input class="btn btn-success" type="submit" name="Submit" value="Add">
            </td>
        </tr>
    </table>
    </div>
    </form>
    </div>
  </div>
</div>
<?php include_once('../footer.php'); ?>
