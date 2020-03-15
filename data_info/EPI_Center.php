<?php
$page_title = 'Upload EPI Center';
require_once('../load.php');
?>
<?php
// Checkin What level user has permission to view this page
page_require_level(3);
//pull out all user form database
$all_users = find_all_user();
?>

<?php include_once('../header.php');?>
<?php 
$conn = mysqli_connect("localhost", "root", "", "central_db");
if (isset($_POST["import"])) 
{
    $fileName = $_FILES["file"]["tmp_name"];
    if ($_FILES["file"]["size"] > 0) 
    {  
        $file = fopen($fileName, "r");
        fgetcsv($file);
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) 
        {
            $sqlInsertdiv = "INSERT INTO epi_center_temp (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, epi_year) values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "','" . $column[9] . "')";
            $resultdiv = mysqli_query($conn, $sqlInsertdiv);
            
            if (!empty($resultdiv)) 
            {
                $type = "success";
                $message = "CSV data has been successfully imported.";

                $sqlTruncateEpiScheduleTempTable = "TRUNCATE TABLE epi_schedule_temp";
                $resultSqlTruncateEpiScheduleTempTable = mysqli_query($conn, $sqlTruncateEpiScheduleTempTable);
            } 
            else 
            {
                $type = "error";
                $message = "There is a problem to import CSV data.";
            }
        }
    }
}
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <?php echo display_msg($msg); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Import EPI Center CSV File Into DB</h2>
            <hr>
                <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
                <div class="outer-scontainer">
                    <div class="row">
                        <form class="col-lg-12" action="" method="post"
                name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                            <div class="input-row">
                                <label class="control-label">Choose EPI Center CSV File</label> <br>
                                <br><input type="file" name="file" id="file" accept=".csv"> <br>
                                <button type="submit" id="submit" name="import" class="btn btn-primary">Import</button>
 					          <a href="../data_info/delete_epi_center.php" class="btn btn-danger btn-danger" data-toggle="tooltip" title="Remove">Delete</a><br>
                            </div>
                        </form>
                    </div>
                    <br>
               <?php
            $sqlSelect = "SELECT * FROM epi_center_temp";
            $result = mysqli_query($conn, $sqlSelect);
            
            if (mysqli_num_rows($result) > 0) {
                ?>
           <table id='epi_center_table' class="table table-bordered table-striped" width="100%">
        <thead>
        <tr><td colspan="11" class="text-center">Please recheck the EPI Center Lists. If there is any mistake click Delete Button and re-upload the corrected CSV File again.</tr>
          </td><tr>
                    <th class="text-left">Center ID</th>
                    <th class="text-left">Ward No</th>
                    <th class="text-left">Sub-Block</th>
                    <th class="text-left">Center Name</th>
                    <th class="text-left">Center Type</th>
                    <th class="text-left">From House#</th>
                    <th class="text-left">To House#</th>
                    <th class="text-left">Center Type</th>
                    <th class="text-left">Worker Name, Designation, Contact No</th>
                    <th class="text-left">Union ID</th>
                    <th class="text-left">EPI Year</th>
                </tr>
            </thead>
<?php
                
                while ($row = mysqli_fetch_array($result)) {
                    ?>
             
                <tbody>
                <tr>
                    <td class="text-left"><?php  echo $row['center_id']; ?></td>
                    <td class="text-left"><?php  echo $row['ward_no']; ?></td>
                    <td class="text-left"><?php  echo $row['sub_block_name']; ?></td>
                    <td class="text-left"><?php  echo $row['center_name']; ?></td>
                    <td class="text-left"><?php  echo $row['center_type']; ?></td>
                    <td class="text-left"><?php  echo $row['from_house']; ?></td>
                    <td class="text-left"><?php  echo $row['to_house']; ?></td>
                    <td class="text-left"><?php  echo $row['center_type']; ?></td>
                    <td class="text-left"><?php  echo $row['ha_details']; ?></td>
                    <td class="text-left">
                    	<?php
                    	global $union_id; 
                    	$union_id = $row['union_id'];
                    	echo $union_id; 
                    	?>	
                    	</td>
                    <td class="text-left">
                    	<?php
                    	global $epi_year; 
                    	$epi_year = $row['epi_year'];
                    	echo $epi_year; 
                    	?>	
                    	</td>
                </tr>
                    <?php
                }
                ?>
                </tbody>
        </table>
        <form method="post" action="../data_info/EPI_Center.php">
        <div class="form-group">
        <label>Please select the EPI Schedule from the option menu for this union.</label>
		  <select name="schedule_id" class="form-control">
		    <option value="1">Monday - Thursday</option>
		    <option value="2">Sunday - Wednesday</option>
		    <option value="3">Saturday - Tuesday</option>
		  </select>
		  <br>
		  <input class="btn btn-primary" type="submit" value="SAVE"/>
		  </div>
		</form>

        <?php
        } ?>
            </div>
        </div>
    </div>
    <?php
		$conn = mysqli_connect("localhost", "root", "", "central_db");
		$option = isset($_POST['schedule_id']) ? $_POST['schedule_id'] : false;
		   if ($option == 1) 
		   {

                //Same Page Operation
                $sqlTruncateEpiCenterTable = "DELETE FROM epi_center WHERE union_id = $union_id AND epi_year = $epi_year";
                $resultSqlTruncateEpiCenterTable = mysqli_query($conn, $sqlTruncateEpiCenterTable);
                $sqlInsertEpiCenterTable = "INSERT INTO epi_center (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, epi_year) SELECT center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, epi_year FROM epi_center_temp";
                $resultSqlInsertEpiCenterTable = mysqli_query($conn, $sqlInsertEpiCenterTable);
                
                $sqlUpdateSchedueId = "UPDATE epi_center SET schedule_id = $option WHERE union_id = $union_id AND epi_year = $epi_year";
                $resultSqlUpdateSchedueId = mysqli_query($conn, $sqlUpdateSchedueId);

                //HA Authentication Query Starts
                $sqlDeleteDuplicateHAAuthentication = "DELETE FROM users WHERE union_id = $union_id";
                $resultSqlDeleteDuplicateHAAuthentication = mysqli_query($conn, $sqlDeleteDuplicateHAAuthentication);

                $sqlCreateHAAuthentication = "INSERT INTO users (username, password, user_level, union_id, ward_no, status, name) SELECT DISTINCT CONCAT(union_id, '_', ward_no), '123456', 3, $union_id, ward_no, 1, 'Health Assistant' FROM epi_center_temp";
                $resultSqlCreateHAAuthentication = mysqli_query($conn, $sqlCreateHAAuthentication);
                //HA Authentication Query Ends

                $sqlTruncateEpiCenterTable = "DELETE FROM epi_schedule_temp WHERE union_id = $union_id AND epi_year_ec = $epi_year AND epi_year_es = $epi_year";
                $resultSqlTruncateEpiCenterTable = mysqli_query($conn, $sqlTruncateEpiCenterTable);

                $sqlJoinEpiScheduleTemp="INSERT INTO epi_schedule_temp (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, schedule_id, epi_year_ec, dateID, jan_date, feb_date, mar_date, apr_date, may_date, jun_date, jul_date, aug_date, sep_date, oct_date, nov_date, dec_date, ward_id, epi_year_es) SELECT epi_center.center_id, epi_center.ward_no, epi_center.sub_block_name, epi_center.center_name, epi_center.from_house, epi_center.to_house, epi_center.center_type, epi_center.ha_details, epi_center.union_id, epi_center.schedule_id, epi_center.epi_year, mr_schedule_final.mr_dateID, mr_schedule_final.mr_jan, mr_schedule_final.mr_feb, mr_schedule_final.mr_mar, mr_schedule_final.mr_apr, mr_schedule_final.mr_may, mr_schedule_final.mr_jun, mr_schedule_final.mr_jul, mr_schedule_final.mr_aug, mr_schedule_final.mr_sep, mr_schedule_final.mr_oct, mr_schedule_final.mr_nov, mr_schedule_final.mr_dec, mr_schedule_final.ward_id, mr_schedule_final.epi_year FROM epi_center JOIN mr_schedule_final ON epi_center.center_id = mr_schedule_final.mr_dateID WHERE mr_schedule_final.epi_year = $epi_year AND epi_center.union_id = $union_id AND epi_center.epi_year = $epi_year";
                $resultSqlJoinEpiScheduleTemp = mysqli_query($conn, $sqlJoinEpiScheduleTemp);

                //redirecting button information
                echo "<form method='post' action='../data_info/epi_center_table_index.php'>";
                echo "<strong>Monday-Thursday</strong> EPI Schedule Session is being created for Year ".$epi_year.". To view/modification <button type='submit' name='click_here' class='btn btn-warning btn-xs'>Click Here</button>";
                echo "</from>";
                echo "<br>";
                echo "<br>";
            }
            elseif ($option == 2) 
            {
                //Same Page Operation
                $sqlTruncateEpiCenterTable = "DELETE FROM epi_center WHERE union_id = $union_id AND epi_year = $epi_year";
                $resultSqlTruncateEpiCenterTable = mysqli_query($conn, $sqlTruncateEpiCenterTable);
                $sqlInsertEpiCenterTable = "INSERT INTO epi_center (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, epi_year) SELECT center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, epi_year FROM epi_center_temp";
                $resultSqlInsertEpiCenterTable = mysqli_query($conn, $sqlInsertEpiCenterTable);

                $sqlUpdateSchedueId = "UPDATE epi_center SET schedule_id = $option WHERE union_id = $union_id AND epi_year = $epi_year";
                $resultSqlUpdateSchedueId = mysqli_query($conn, $sqlUpdateSchedueId);

                //HA Authentication Query Starts
                $sqlDeleteDuplicateHAAuthentication = "DELETE FROM users WHERE union_id = $union_id";
                $resultSqlDeleteDuplicateHAAuthentication = mysqli_query($conn, $sqlDeleteDuplicateHAAuthentication);

                $sqlCreateHAAuthentication = "INSERT INTO users (username, password, user_level, union_id, status, name) SELECT DISTINCT CONCAT(union_id, '_', ward_no), '123456', 3, $union_id, 1, 'Health Assistant' FROM epi_center_temp";
                $resultSqlCreateHAAuthentication = mysqli_query($conn, $sqlCreateHAAuthentication);
                //HA Authentication Query Ends

                $sqlTruncateEpiCenterTable = "DELETE FROM epi_schedule_temp WHERE union_id = $union_id AND epi_year_ec = $epi_year AND epi_year_es = $epi_year";
                $resultSqlTruncateEpiCenterTable = mysqli_query($conn, $sqlTruncateEpiCenterTable);

                $sqlJoinEpiScheduleTemp="INSERT INTO epi_schedule_temp (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, schedule_id, epi_year_ec, dateID, jan_date, feb_date, mar_date, apr_date, may_date, jun_date, jul_date, aug_date, sep_date, oct_date, nov_date, dec_date, ward_id, epi_year_es) SELECT epi_center.center_id, epi_center.ward_no, epi_center.sub_block_name, epi_center.center_name, epi_center.from_house, epi_center.to_house, epi_center.center_type, epi_center.ha_details, epi_center.union_id, epi_center.schedule_id, epi_center.epi_year, sw_schedule_final.sw_dateID, sw_schedule_final.sw_jan, sw_schedule_final.sw_feb, sw_schedule_final.sw_mar, sw_schedule_final.sw_apr, sw_schedule_final.sw_may, sw_schedule_final.sw_jun, sw_schedule_final.sw_jul, sw_schedule_final.sw_aug, sw_schedule_final.sw_sep, sw_schedule_final.sw_oct, sw_schedule_final.sw_nov, sw_schedule_final.sw_dec, sw_schedule_final.ward_id, sw_schedule_final.epi_year FROM epi_center JOIN sw_schedule_final ON epi_center.center_id = sw_schedule_final.sw_dateID WHERE sw_schedule_final.epi_year = $epi_year AND epi_center.union_id = $union_id AND epi_center.epi_year = $epi_year";
                $resultSqlJoinEpiScheduleTemp = mysqli_query($conn, $sqlJoinEpiScheduleTemp);

                //redirecting button information
                echo "<form method='post' action='../data_info/epi_center_table_index.php'>";
                echo "<strong>Sunday-Wednesday</strong> EPI Schedule Session is being created for Year ".$epi_year.". To view/modification <button type='submit' name='click_here' class='btn btn-warning btn-xs'>Click Here</button>";
                echo "</from>";
                echo "<br>";
                echo "<br>";
           }
		   elseif ($option == 3) 
           {
                //Same Page Operation
                $sqlTruncateEpiCenterTable = "DELETE FROM epi_center WHERE union_id = $union_id AND epi_year = $epi_year";
                $resultSqlTruncateEpiCenterTable = mysqli_query($conn, $sqlTruncateEpiCenterTable);
                $sqlInsertEpiCenterTable = "INSERT INTO epi_center (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, epi_year) SELECT center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, epi_year FROM epi_center_temp";
                $resultSqlInsertEpiCenterTable = mysqli_query($conn, $sqlInsertEpiCenterTable);

                $sqlUpdateSchedueId = "UPDATE epi_center SET schedule_id = $option WHERE union_id = $union_id AND epi_year = $epi_year";
                $resultSqlUpdateSchedueId = mysqli_query($conn, $sqlUpdateSchedueId);

                //HA Authentication Query Starts
                $sqlDeleteDuplicateHAAuthentication = "DELETE FROM users WHERE union_id = $union_id";
                $resultSqlDeleteDuplicateHAAuthentication = mysqli_query($conn, $sqlDeleteDuplicateHAAuthentication);

                $sqlCreateHAAuthentication = "INSERT INTO users (username, password, user_level, union_id, status, name) SELECT DISTINCT CONCAT(union_id, '_', ward_no), '123456', 3, $union_id, 1, 'Health Assistant' FROM epi_center_temp";
                $resultSqlCreateHAAuthentication = mysqli_query($conn, $sqlCreateHAAuthentication);
                //HA Authentication Query Ends

                $sqlTruncateEpiCenterTable = "DELETE FROM epi_schedule_temp WHERE union_id = $union_id AND epi_year_ec = $epi_year AND epi_year_es = $epi_year";
                $resultSqlTruncateEpiCenterTable = mysqli_query($conn, $sqlTruncateEpiCenterTable);

                $sqlJoinEpiScheduleTemp="INSERT INTO epi_schedule_temp (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, schedule_id, epi_year_ec, dateID, jan_date, feb_date, mar_date, apr_date, may_date, jun_date, jul_date, aug_date, sep_date, oct_date, nov_date, dec_date, ward_id, epi_year_es) SELECT epi_center.center_id, epi_center.ward_no, epi_center.sub_block_name, epi_center.center_name, epi_center.from_house, epi_center.to_house, epi_center.center_type, epi_center.ha_details, epi_center.union_id, epi_center.schedule_id, epi_center.epi_year, at_schedule_final.at_dateID, at_schedule_final.at_jan, at_schedule_final.at_feb, at_schedule_final.at_mar, at_schedule_final.at_apr, at_schedule_final.at_may, at_schedule_final.at_jun, at_schedule_final.at_jul, at_schedule_final.at_aug, at_schedule_final.at_sep, at_schedule_final.at_oct, at_schedule_final.at_nov, at_schedule_final.at_dec, at_schedule_final.ward_id, at_schedule_final.epi_year FROM epi_center JOIN at_schedule_final ON epi_center.center_id = at_schedule_final.at_dateID WHERE at_schedule_final.epi_year = $epi_year AND epi_center.union_id = $union_id AND epi_center.epi_year = $epi_year";
                $resultSqlJoinEpiScheduleTemp = mysqli_query($conn, $sqlJoinEpiScheduleTemp);

                //redirecting button information
                echo "<form method='post' action='../data_info/epi_center_table_index.php'>";
                echo "<strong>Saturday-Tuesday</strong> EPI Schedule Session is being created for Year ".$epi_year.". To view/modification <button type='submit' name='click_here' class='btn btn-warning btn-xs'>Click Here</button>";
                echo "</from>";
                echo "<br>";
                echo "<br>";
           }
		?>
</div>
<?php include_once('../footer.php');?>