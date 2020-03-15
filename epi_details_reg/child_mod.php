<?php
  $page_title = 'Child Modification';
  require_once('../load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(3);
//pull out all user form database
 $all_users = find_all_user();
?>
<?php include_once('../header.php'); ?>
<!-- Database Configuration Starts -->
<?php
$host = "localhost";
$user = "root";
$password ="";
$database = "central_db";

//VARIABLES
$epic_id;
$ward_no;
$reg_no;
$birth_certificate_no;

$center_name    = "";
$reg_date       = "";
$name           = "";
$gender         = "";
$date_of_birth  = "";
$mother_name    = "";
$father_name    = "";
$house_road_no  = "";
$village        = "";
$upazila_name   = "";
$district_name  = "";
$union_name     = "";
$sub_block_name = "";
$ha_name        = "";
$ha_contact     = "";

$bcg_receive_date       = "";
$bcg_comment            = "";

$penta1_receive_date    = "";
$penta1_comment         = "";

$penta2_receive_date    = "";
$penta2_comment         = "";

$penta3_receive_date    = "";
$penta3_comment         = "";

$bopv1_receive_date     = "";
$bopv1_comment          = "";

$bopv2_receive_date     = "";
$bopv2_comment          = "";

$bopv3_receive_date     = "";
$bopv3_comment          = "";

$pcv1_receive_date      = "";
$pcv1_comment           = "";

$pcv2_receive_date      = "";
$pcv2_comment           = "";

$pcv3_receive_date      = "";
$pcv3_comment           = "";

$ipv1_receive_date      = "";
$ipv1_comment           = "";

$ipv2_receive_date      = "";
$ipv2_comment           = "";

$mr1_receive_date       = "";
$mr1_comment            = "";

$mr2_receive_date       = "";
$mr2_comment            = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try
{
    $connect = mysqli_connect($host, $user, $password, $database);
} 
catch (mysqli_sql_exception $ex) 
{
    echo 'Error';
}

// get values from the form
function getPosts()
{
    $posts = array();
    $posts[2]   = $_POST['epic_id'];
    $posts[3]   = $_POST['ward_no'];
    $posts[6]   = $_POST['center_name'];
    $posts[7]   = $_POST['reg_no'];
    $posts[8]   = $_POST['reg_date'];
    $posts[9]   = $_POST['name'];
    $posts[10]  = $_POST['gender'];
    $posts[11]  = $_POST['date_of_birth'];
    $posts[12]  = $_POST['birth_certificate_no'];
    $posts[13]  = $_POST['mother_name'];
    $posts[14]  = $_POST['father_name'];
    $posts[15]  = $_POST['house_road_no'];
    $posts[16]  = $_POST['village'];
    $posts[17]  = $_POST['upazila_name'];
    $posts[18]  = $_POST['district_name'];
    $posts[19]  = $_POST['union_name'];
    $posts[20]  = $_POST['sub_block_name'];
    $posts[21]  = $_POST['ha_name'];
    $posts[22]  = $_POST['ha_contact'];
    $posts[24]  = $_POST['bcg_receive_date'];
    $posts[26]  = $_POST['bcg_comment'];
    $posts[28]  = $_POST['penta1_receive_date'];
    $posts[30]  = $_POST['penta1_comment'];
    $posts[32]  = $_POST['bopv1_receive_date'];
    $posts[34]  = $_POST['bopv1_comment'];
    $posts[36]  = $_POST['pcv1_receive_date'];
    $posts[38]  = $_POST['pcv1_comment'];
    $posts[40]  = $_POST['ipv1_receive_date'];
    $posts[42]  = $_POST['ipv1_comment'];
    $posts[44]  = $_POST['penta2_receive_date'];
    $posts[46]  = $_POST['penta2_comment'];
    $posts[48]  = $_POST['bopv2_receive_date'];
    $posts[50]  = $_POST['bopv2_comment'];
    $posts[52]  = $_POST['pcv2_receive_date'];
    $posts[54]  = $_POST['pcv2_comment'];
    $posts[56]  = $_POST['penta3_receive_date'];
    $posts[58]  = $_POST['penta3_comment'];
    $posts[60]  = $_POST['bopv3_receive_date'];
    $posts[62]  = $_POST['bopv3_comment'];
    $posts[64]  = $_POST['pcv3_receive_date'];
    $posts[66]  = $_POST['pcv3_comment'];
    $posts[68]  = $_POST['ipv2_receive_date'];
    $posts[70]  = $_POST['ipv2_comment'];
    $posts[72]  = $_POST['mr1_receive_date'];
    $posts[74]  = $_POST['mr1_comment'];
    $posts[76]  = $_POST['mr2_receive_date'];
    $posts[78]  = $_POST['mr2_comment'];

    return $posts;
}

//DISPLAY INFORMATION
if(isset($_POST['display_details']))
{
    $data = getPosts();
    $search_Query = "SELECT * FROM child_registration_details WHERE epic_id = $data[2]";
    try
    {
        $search_Result = mysqli_query($connect, $search_Query);
        
        if($search_Result)
        {
            if(mysqli_num_rows($search_Result))
            {
            
                while($row = mysqli_fetch_array($search_Result))
                {
                    $epic_id = $row['epic_id'];
                    $ward_no = $row['ward_no'];
                    $reg_no = $row['reg_no'];
                    $birth_certificate_no = $row['birth_certificate_no'];

                    $center_name = $row['center_name'];
                    $reg_date = $row['reg_date'];
                    $name = $row['name'];
                    $gender = $row['gender'];
                    $date_of_birth = $row['date_of_birth'];
                    $mother_name = $row['mother_name'];
                    $father_name = $row['father_name'];
                    $house_road_no = $row['house_road_no'];
                    $village = $row['village'];
                    $upazila_name = $row['upazila_name'];
                    $district_name = $row['district_name'];
                    $union_name = $row['union_name'];
                    $sub_block_name = $row['sub_block_name'];
                    $ha_name = $row['ha_name'];
                    $ha_contact = $row['ha_contact'];

                    $bcg_receive_date = $row['bcg_receive_date'];
                    $bcg_comment = $row['bcg_comment'];

                    $penta1_receive_date = $row['penta1_receive_date'];
                    $penta1_comment = $row['penta1_comment'];

                    $penta2_receive_date = $row['penta2_receive_date'];
                    $penta2_comment = $row['penta2_comment'];

                    $penta3_receive_date = $row['penta3_receive_date'];
                    $penta3_comment = $row['penta3_comment'];

                    $bopv1_receive_date = $row['bopv1_receive_date'];
                    $bopv1_comment = $row['bopv1_comment'];

                    $bopv2_receive_date = $row['bopv2_receive_date'];
                    $bopv2_comment = $row['bopv2_comment'];

                    $bopv3_receive_date = $row['bopv3_receive_date'];
                    $bopv3_comment = $row['bopv3_comment'];

                    $pcv1_receive_date = $row['pcv1_receive_date'];
                    $pcv1_comment = $row['pcv1_comment'];

                    $pcv2_receive_date = $row['pcv2_receive_date'];
                    $pcv2_comment = $row['pcv2_comment'];

                    $pcv3_receive_date = $row['pcv3_receive_date'];
                    $pcv3_comment = $row['pcv3_comment'];

                    $ipv1_receive_date = $row['ipv1_receive_date'];
                    $ipv1_comment = $row['ipv1_comment'];

                    $ipv2_receive_date = $row['ipv2_receive_date'];
                    $ipv2_comment = $row['ipv2_comment'];

                    $mr1_receive_date = $row['mr1_receive_date'];
                    $mr1_comment = $row['mr1_comment'];

                    $mr2_receive_date = $row['mr2_receive_date'];
                    $mr2_comment = $row['mr2_comment'];
                }
            }
            else
            {
                $type = "not_found";
                $message = "Data cannot be found.";
            }
        }
        else
        {
            $type = "error";
            $message = "Something went wrong. Please try again.";
        }
    }
    catch (Exception $ex) 
    {
        $type = "error_search";
        $message = "Something went wrong. Please try again.";
    }
}
//DISPLAY INFORMATION

//UPDATE INFORMATION
if(isset($_POST['update_details']))
{
    $data = getPosts();
    $update_Query = "UPDATE child_registration_details SET 
    bcg_receive_date='$data[24]',
    bcg_comment='$data[26]', 
    penta1_receive_date='$data[28]', 
    penta1_comment='$data[30]', 
    bopv1_receive_date='$data[32]', 
    bopv1_comment='$data[34]', 
    pcv1_receive_date='$data[36]', 
    pcv1_comment='$data[38]', 
    ipv1_receive_date='$data[40]', 
    ipv1_comment='$data[42]', 
    penta2_receive_date='$data[44]', 
    penta2_comment='$data[46]', 
    bopv2_receive_date='$data[48]', 
    bopv2_comment='$data[50]', 
    pcv2_receive_date='$data[52]', 
    pcv2_comment='$data[54]', 
    penta3_receive_date='$data[56]', 
    penta3_comment='$data[58]', 
    bopv3_receive_date='$data[60]', 
    bopv3_comment='$data[62]', 
    pcv3_receive_date='$data[64]', 
    pcv3_comment='$data[66]', 
    ipv2_receive_date='$data[68]', 
    ipv2_comment='$data[70]', 
    mr1_receive_date='$data[72]', 
    mr1_comment='$data[74]', 
    mr2_receive_date='$data[76]', 
    mr2_comment='$data[78]' WHERE epic_id = $data[2]";

    try
    {
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                $type = "updated";
                $message = "A change has been modified.";
            }
            else
            {
                $type = "not_updated";
                $message = "No change has been noticed.";
            }
        }
    } 
    catch (Exception $ex) 
    {
        $type = "error";
        $message = "Something went wrong. Please try again.";
    }

    $sql1 = "UPDATE child_registration_details SET bcg_receive_date = NULL WHERE bcg_receive_date = '0000-00-00'";
    mysqli_query($connect, $sql1);


    $sql2 = "UPDATE child_registration_details SET  penta1_receive_date = NULL WHERE penta1_receive_date = '0000-00-00'";
    mysqli_query($connect, $sql2);
    

    $sql3 = "UPDATE child_registration_details SET penta2_receive_date = NULL WHERE penta2_receive_date = '0000-00-00'";
    mysqli_query($connect, $sql3);


    $sql4 = "UPDATE child_registration_details SET penta3_receive_date = NULL WHERE penta3_receive_date = '0000-00-00'";
    mysqli_query($connect, $sql4);

    
    $sql5 = "UPDATE child_registration_details SET bopv1_receive_date = NULL WHERE bopv1_receive_date = '0000-00-00'";
    mysqli_query($connect, $sql5);


    $sql6 = "UPDATE child_registration_details SET bopv2_receive_date = NULL WHERE bopv2_receive_date = '0000-00-00'";
    mysqli_query($connect, $sql6);


    $sql7 = "UPDATE child_registration_details SET bopv3_receive_date = NULL WHERE bopv3_receive_date = '0000-00-00'";
    mysqli_query($connect, $sql7);


    $sql8 = "UPDATE child_registration_details SET pcv1_receive_date = NULL WHERE pcv1_receive_date = '0000-00-00'";
    mysqli_query($connect, $sql8);


    $sql9 = "UPDATE child_registration_details SET pcv2_receive_date = NULL WHERE pcv2_receive_date = '0000-00-00'";
    mysqli_query($connect, $sql9);


    $sql10 = "UPDATE child_registration_details SET pcv3_receive_date = NULL WHERE pcv3_receive_date = '0000-00-00'";
    mysqli_query($connect, $sql10);


    $sql11 = "UPDATE child_registration_details SET ipv1_receive_date = NULL WHERE ipv1_receive_date = '0000-00-00'";
    mysqli_query($connect, $sql11);


    $sql12 = "UPDATE child_registration_details SET ipv2_receive_date = NULL WHERE ipv2_receive_date = '0000-00-00'";
    mysqli_query($connect, $sql12);


    $sql13 = "UPDATE child_registration_details SET mr1_receive_date = NULL WHERE mr1_receive_date = '0000-00-00'";
    mysqli_query($connect, $sql13);


    $sql14 = "UPDATE child_registration_details SET mr2_receive_date = NULL WHERE mr2_receive_date = '0000-00-00'";
    mysqli_query($connect, $sql14);
}
//UPDATE INFORMATION
?>
<!-- Database Configuration End -->
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="text-left">Vaccination Update for Child</h3>
      <hr>
      <form method="post" action="../epi_details_reg/child_mod.php">
        <!-- SEARCH OPTION STARTS -->
        <div class="col-lg-12">
        <div class="alert alert-danger" role="alert">
            <small>Some information cannot be modified for security purpose.</small>
        </div>
        <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?>
      </div>
        </div>
        <div class="col-lg-6">
            <label></label>
            <input type="number" required class="form-control" name="epic_id" placeholder="Enter unique ID" value="<?php echo $epic_id;?>">
        </div>
        <div class="col-lg-6">
            <label></label>
            <input class="btn btn-warning btn-md btn-block" type="submit" name="display_details" value="DISPLAY">
        </div>
        <!-- SEARCH OPTION ENDS -->
        <!-- CHILD RECORDS STARTS -->
        <div class="col-lg-12">
        <br>
        <div class="alert alert-success" role="alert">
          <strong>CHILD INFORMATION</strong>
        </div>
        </div>
        <div class="col-lg-6">
        <br>
            <label>Registration No</label>
            <input type="number" readonly class="form-control" name="reg_no" placeholder="No available data." value="<?php echo $reg_no;?>">
        </div>
        <div class="col-lg-6">
        <br>
            <label>Registration Date</label>
            <input type="date" readonly class="form-control" name="reg_date" value="<?php echo $reg_date;?>">
        </div>
        <div class="col-lg-5">
        <br>
            <label>Name</label>
            <input type="text" readonly class="form-control" name="name" placeholder="No available data." value="<?php echo $name;?>">
        </div>
        <div class="col-lg-1">
        <br>
            <label>Gender</label>
            <input type="text" readonly class="form-control" name="gender" placeholder="x" value="<?php echo $gender;?>">
        </div>
        <div class="col-lg-2">
        <br>
            <label>Date of Birth</label>
            <input type="date" readonly class="form-control" name="date_of_birth" value="<?php echo $date_of_birth;?>">
        </div>
        <div class="col-lg-4">
        <br>
            <label>Birth Certificate No</label>
            <input type="number" class="form-control" placeholder="No available data." name="birth_certificate_no" value="<?php echo $birth_certificate_no;?>">
        </div>
        <div class="col-lg-6">
        <br>
            <label>Mother Name</label>
            <input type="text" readonly class="form-control" name="mother_name" placeholder="No available data." value="<?php echo $mother_name;?>">
        </div>
        <div class="col-lg-6">
        <br>
            <label>Father Name</label>
            <input type="text" readonly class="form-control" name="father_name" placeholder="No available data." value="<?php echo $father_name;?>">
        </div>
        <div class="col-lg-3">
        <br>
            <label>House/Road #</label>
            <input type="text" readonly class="form-control" name="house_road_no" placeholder="No available data." value="<?php echo $house_road_no;?>">
        </div>
        <div class="col-lg-3">
        <br>
            <label>Village</label>
            <input type="text" readonly class="form-control" name="village" placeholder="No available data." value="<?php echo $village;?>">
        </div>
        <div class="col-lg-3">
        <br>
            <label>Upazila</label>
            <input type="text" readonly class="form-control" name="upazila_name" placeholder="No available data." value="<?php echo $upazila_name;?>">
        </div>
        <div class="col-lg-3">
        <br>
            <label>District</label>
            <input type="text" readonly class="form-control" name="district_name" placeholder="No available data." value="<?php echo $district_name;?>">
        </div>
        <div class="col-lg-4">
        <br>
            <label>Union</label>
            <input type="text" readonly class="form-control" name="union_name" placeholder="No available data." value="<?php echo $union_name;?>">
        </div>
        <div class="col-lg-1">
        <br>
            <label>WN</label>
            <input type="number" readonly class="form-control" name="ward_no" placeholder="x" value="<?php echo $ward_no;?>">
        </div>
        <div class="col-lg-6">
        <br>
            <label>Center Name</label>
            <input type="text" readonly class="form-control" name="center_name" placeholder="No available data." value="<?php echo $center_name;?>">
        </div>
        <div class="col-lg-1">
        <br>
            <label>SB</label>
            <input type="text" readonly class="form-control" name="sub_block_name" placeholder="x" value="<?php echo $sub_block_name;?>">
        </div>
        <!-- CHILD RECORDS END -->
        <!-- HEALTH ASSISTANT RECORDS STARTS -->
        <div class="col-lg-12">
        <br>
        <div class="alert alert-success" role="alert">
          <strong>HEALTH ASSISTANT</strong>
        </div>
        </div>
        <div class="col-lg-6">
            <label>Name</label>
            <input type="text" readonly class="form-control" name="ha_name" placeholder="No available data." value="<?php echo $ha_name;?>">
        </div>
        <div class="col-lg-6">
            <label>Contact No.</label>
            <input type="number" readonly class="form-control" name="ha_contact" placeholder="No available data." value="<?php echo $ha_contact;?>">
        </div>
        <!-- HEALTH ASSISTANT RECORDS END -->
        <!-- VACCINATION RECORDS STARTS -->
        <div class="col-lg-12">
        <br>
        <div class="alert alert-warning" role="alert">
            <strong>VACCINATION DETAILS</strong>
        </div>
        <div class="table-responsive">
        <div class="table table-sm">
        <table class="table table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th width="20%">Vaccine</th>
                <th width="15%">Received</th>
                <th width="65%">Comment</th>
            </tr>
        </thead>
            <tr>
                <td>
                    BCG<br>
                    <small>
                        <strong>
                        Due: 
                        </strong>
                        <?php 
                        $date = date_create($date_of_birth);
                        date_add($date, date_interval_create_from_date_string('42 days'));
                        echo date_format($date, 'm-d-Y');
                        ?>
                    </small>
                </td>
                <td>
                    <input <?php echo empty($bcg_receive_date) ? '' : 'readonly' ?> type="date" class="form-control" name="bcg_receive_date" value="<?php echo $bcg_receive_date;?>">
                </td>
                <td>
                    <input type="text" class="form-control" name="bcg_comment" placeholder="Please comment if needed." value="<?php echo $bcg_comment;?>">
                </td>
            </tr>
            <tr>
                <td>
                    PENTA-1<br>
                    <small>
                        <strong>
                        Due: 
                        </strong>
                        <?php 
                        $date = date_create($date_of_birth);
                        date_add($date, date_interval_create_from_date_string('42 days'));
                        echo date_format($date, 'm-d-Y');
                        ?>
                    </small>
                </td>
                <td>
                    <input <?php echo empty($penta1_receive_date) ? '' : 'readonly' ?> type="date" class="form-control" name="penta1_receive_date" value="<?php echo $penta1_receive_date;?>">
                </td>
                <td>
                    <input type="text" class="form-control" name="penta1_comment" placeholder="Please comment if needed." value="<?php echo $penta1_comment;?>">
                </td>
            </tr>
            <tr>
                <td>
                    BOPV-1<br>
                    <small>
                        <strong>
                        Due: 
                        </strong>
                        <?php 
                        $date = date_create($date_of_birth);
                        date_add($date, date_interval_create_from_date_string('42 days'));
                        echo date_format($date, 'm-d-Y');
                        ?>
                    </small>
                </td>
                <td>
                    <input <?php echo empty($bopv1_receive_date) ? '' : 'readonly' ?> type="date" class="form-control" name="bopv1_receive_date" value="<?php echo $bopv1_receive_date;?>">
                </td>
                <td>
                    <input type="text" class="form-control" name="bopv1_comment" placeholder="Please comment if needed." value="<?php echo $bopv1_comment;?>">
                </td>
            </tr>
            <tr>
                <td>
                    PCV-1<br>
                    <small>
                        <strong>
                        Due: 
                        </strong>
                        <?php 
                        $date = date_create($date_of_birth);
                        date_add($date, date_interval_create_from_date_string('42 days'));
                        echo date_format($date, 'm-d-Y');
                        ?>
                    </small>
                </td>
                <td>
                    <input <?php echo empty($pcv1_receive_date) ? '' : 'readonly' ?> type="date" class="form-control" name="pcv1_receive_date" value="<?php echo $pcv1_receive_date;?>">
                </td>
                <td>
                    <input type="text" class="form-control" name="pcv1_comment" placeholder="Please comment if needed." value="<?php echo $pcv1_comment;?>">
                </td>
            </tr>
            <tr>
                <td>
                    IPV-1<br>
                    <small>
                        <strong>
                        Due: 
                        </strong>
                        <?php 
                        $date = date_create($date_of_birth);
                        date_add($date, date_interval_create_from_date_string('42 days'));
                        echo date_format($date, 'm-d-Y');
                        ?>
                    </small>
                </td>
                <td>
                    <input <?php echo empty($ipv1_receive_date) ? '' : 'readonly' ?> type="date" class="form-control" name="ipv1_receive_date" value="<?php echo $ipv1_receive_date;?>">
                </td>
                <td>
                    <input type="text" class="form-control" name="ipv1_comment" placeholder="Please comment if needed." value="<?php echo $ipv1_comment;?>">
                </td>
            </tr>
            <tr>
                <td>
                    PENTA-2<br>
                    <small>
                        <strong>
                        Due: 
                        </strong>
                        <?php 
                        $date = date_create($date_of_birth);
                        date_add($date, date_interval_create_from_date_string('70 days'));
                        echo date_format($date, 'm-d-Y');
                        ?>
                    </small>
                </td>
                <td>
                    <input <?php echo empty($penta2_receive_date) ? '' : 'readonly' ?> type="date" class="form-control" name="penta2_receive_date" value="<?php echo $penta2_receive_date;?>">
                </td>
                <td>
                    <input type="text" class="form-control" name="penta2_comment" placeholder="Please comment if needed." value="<?php echo $penta2_comment;?>">
                </td>
            </tr>
            <tr>
                <td>
                    BOPV-2<br>
                    <small>
                        <strong>
                        Due: 
                        </strong>
                        <?php 
                        $date = date_create($date_of_birth);
                        date_add($date, date_interval_create_from_date_string('70 days'));
                        echo date_format($date, 'm-d-Y');
                        ?>
                    </small>
                </td>
                <td>
                    <input <?php echo empty($bopv2_receive_date) ? '' : 'readonly' ?> type="date" class="form-control" name="bopv2_receive_date" value="<?php echo $bopv2_receive_date;?>">
                </td>
                <td>
                    <input type="text" class="form-control" name="bopv2_comment" placeholder="Please comment if needed." value="<?php echo $bopv2_comment;?>">
                </td>
            </tr>
            <tr>
                <td>
                    PCV-2<br>
                    <small>
                        <strong>
                        Due: 
                        </strong>
                        <?php 
                        $date = date_create($date_of_birth);
                        date_add($date, date_interval_create_from_date_string('70 days'));
                        echo date_format($date, 'm-d-Y');
                        ?>
                    </small>
                </td>
                <td>
                    <input <?php echo empty($pcv2_receive_date) ? '' : 'readonly' ?> type="date" class="form-control" name="pcv2_receive_date" value="<?php echo $pcv2_receive_date;?>">
                </td>
                <td>
                    <input type="text" class="form-control" name="pcv2_comment" placeholder="Please comment if needed." value="<?php echo $pcv2_comment;?>">
                </td>
            </tr>
            <tr>
                <td>
                    PENTA-3<br>
                    <small>
                        <strong>
                        Due: 
                        </strong>
                        <?php 
                        $date = date_create($date_of_birth);
                        date_add($date, date_interval_create_from_date_string('98 days'));
                        echo date_format($date, 'm-d-Y');
                        ?>
                    </small>
                </td>
                <td>
                    <input <?php echo empty($penta3_receive_date) ? '' : 'readonly' ?> type="date" class="form-control" name="penta3_receive_date" value="<?php echo $penta3_receive_date;?>">
                </td>
                <td>
                    <input type="text" class="form-control" name="penta3_comment" placeholder="Please comment if needed." value="<?php echo $penta3_comment;?>">
                </td>
            </tr>
            <tr>
                <td>
                    BOPV-3<br>
                    <small>
                        <strong>
                        Due: 
                        </strong>
                        <?php 
                        $date = date_create($date_of_birth);
                        date_add($date, date_interval_create_from_date_string('98 days'));
                        echo date_format($date, 'm-d-Y');
                        ?>
                    </small>
                </td>
                <td>
                    <input <?php echo empty($bopv3_receive_date) ? '' : 'readonly' ?> type="date" class="form-control" name="bopv3_receive_date" value="<?php echo $bopv3_receive_date;?>">
                </td>
                <td>
                    <input type="text" class="form-control" name="bopv3_comment" placeholder="Please comment if needed." value="<?php echo $bopv3_comment;?>">
                </td>
            </tr>
            <tr>
                <td>
                    PCV-3<br>
                    <small>
                        <strong>
                        Due: 
                        </strong>
                        <?php 
                        $date = date_create($date_of_birth);
                        date_add($date, date_interval_create_from_date_string('98 days'));
                        echo date_format($date, 'm-d-Y');
                        ?>
                    </small>
                </td>
                <td>
                    <input <?php echo empty($pcv3_receive_date) ? '' : 'readonly' ?> type="date" class="form-control" name="pcv3_receive_date" value="<?php echo $pcv3_receive_date;?>">
                </td>
                <td>
                    <input type="text" class="form-control" name="pcv3_comment" placeholder="Please comment if needed." value="<?php echo $pcv3_comment;?>">
                </td>
            </tr>
            <tr>
                <td>
                    IPV-2<br>
                    <small>
                        <strong>
                        Due: 
                        </strong>
                        <?php 
                        $date = date_create($date_of_birth);
                        date_add($date, date_interval_create_from_date_string('98 days'));
                        echo date_format($date, 'm-d-Y');
                        ?>
                    </small>
                </td>
                <td>
                    <input <?php echo empty($ipv2_receive_date) ? '' : 'readonly' ?> type="date" class="form-control" name="ipv2_receive_date" value="<?php echo $ipv2_receive_date;?>">
                </td>
                <td>
                    <input type="text" class="form-control" name="ipv2_comment" placeholder="Please comment if needed." value="<?php echo $ipv2_comment;?>">
                </td>
            </tr>
            <tr>
                <td>
                    MR-1<br>
                    <small>
                        <strong>
                        Due: 
                        </strong>
                        <?php 
                        $date = date_create($date_of_birth);
                        date_add($date, date_interval_create_from_date_string('252 days'));
                        echo date_format($date, 'm-d-Y');
                        ?>
                    </small>
                </td>
                <td>
                    <input <?php echo empty($mr1_receive_date) ? '' : 'readonly' ?> type="date" class="form-control" name="mr1_receive_date" value="<?php echo $mr1_receive_date;?>">
                </td>
                <td>
                    <input type="text" class="form-control" name="mr1_comment" placeholder="Please comment if needed." value="<?php echo $mr1_comment;?>">
                </td>
            </tr>
            <tr>
                <td>
                    MR-2<br>
                    <small>
                        <strong>
                        Due: 
                        </strong>
                        <?php 
                        $date = date_create($date_of_birth);
                        date_add($date, date_interval_create_from_date_string('420 days'));
                        echo date_format($date, 'm-d-Y');
                        ?>
                    </small>
                </td>
                <td>
                    <input <?php echo empty($mr2_receive_date) ? '' : 'readonly' ?> type="date" class="form-control" name="mr2_receive_date" value="<?php echo $mr2_receive_date;?>">
                </td>
                <td>
                    <input type="text" class="form-control" name="mr2_comment" placeholder="Please comment if needed." value="<?php echo $mr2_comment;?>">
                </td>
            </tr>
        </table>
        </div>
        <div class="text-right">
        <a class="btn btn-info btn-lg" href="../view_center_scheduler/index.php" target="_blank">VIEW SCHEDULE</a>
        <input class="btn btn-success btn-lg" type="submit" name="update_details" value="UPDATE">
        </div>
        <br>
        </div>
        </div>
        <!-- VACCINATION RECORDS END -->
      </form>
    </div>
  </div>
</div>
<?php include_once('../footer.php'); ?>