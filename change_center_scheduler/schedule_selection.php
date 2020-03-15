<?php
  $page_title = 'Change Schedule';
  require_once('../load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(3);
//pull out all user form database
 $all_users = find_all_user();
?>
<?php include_once('../header.php'); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-left">STEP :: 6</h2>
            <hr>
            <div class="outer-scontainer">
		        <div class="row">
		          <div class="jumbotron">
		            <div class="container">
		            <?php
					$con = mysqli_connect("localhost","root","","central_db");

					// Check connection
					if (mysqli_connect_errno())
					  {
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();
					  }
					?>
					<?php
						global $schedule_id;
						$epi_year;
						$epi_year = $_SESSION['epi_year'];

						$union_id;
						$union_id = $_SESSION['union_id'];
						
						$query = "SELECT DISTINCT schedule_id FROM epi_center WHERE epi_year = $epi_year AND union_id = $union_id";
						$query_run = mysqli_query($con, $query);

						while ($row = $query_run->fetch_assoc())
						{
							if ($row['schedule_id'] == 1) 
							{
								echo'<h4 class="display-3">
						              	<article>
						              	Current schedule of selected union is <strong>Monday-Thursday</strong>. You can change the union\'s schedule from below.
						              	</article>
						              </h4>
						              <br>';
							}
							elseif ($row['schedule_id'] == 2) 
							{
								echo'<h4 class="display-3">
						              	<article>
						              	Current schedule of selected union is <strong>Sunday-Wednesday</strong>. You can change the union\'s schedule from below.
						              	</article>
						              </h4>
						              <br>';
							}
							elseif ($row['schedule_id'] == 3) 
							{
								echo'<h4 class="display-3">
						              	<article>
						              	Current schedule of selected union is <strong>Saturday-Tuesday</strong>. You can change the union\'s schedule from below.
						              	</article>
						              </h4>
						              <br>';
							}
						}

						echo'
						<form method="post" action="../change_center_scheduler/schedule_selection.php">
							  <select name="option_id" class="form-control form-control-lg">
							    <option value="1">Monday - Thursday</option>
							    <option value="2">Sunday - Wednesday</option>
							    <option value="3">Saturday - Tuesday</option>
							  </select>
							  <br>
							  <input type="submit" value="SUBMIT" class="btn btn-danger"/>
							  &nbsp;&nbsp;&nbsp;&nbsp;
							  <a class="btn btn-warning" href="../change_center_scheduler/year_selection.php">PREVIOUS</a>
						</form>';

						$option = isset($_POST['option_id']) ? $_POST['option_id'] : false;
						if ($option == 1) 
						{
							$update_schedule_id = "UPDATE epi_center SET schedule_id = $option WHERE union_id = $union_id AND epi_year = $epi_year";
					        $update_schedule_id_run = mysqli_query($con, $update_schedule_id);

					        $truncate_epi_center_temp_change = "TRUNCATE TABLE epi_center_temp_change";
                			$truncate_epi_center_temp_change_run = mysqli_query($con, $truncate_epi_center_temp_change);

                			$insert_epi_center_temp_change_from_epi_center = "INSERT INTO epi_center_temp_change (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, epi_year, schedule_id) SELECT center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, epi_year, schedule_id FROM epi_center WHERE epi_center.epi_year = $epi_year AND epi_center.union_id = $union_id";
                			$insert_epi_center_temp_change_from_epi_center_run = mysqli_query($con, $insert_epi_center_temp_change_from_epi_center);

                			$truncate_epi_scheule_temp_change = "TRUNCATE TABLE epi_schedule_temp_change";
                			$truncate_epi_scheule_temp_change_run = mysqli_query($con, $truncate_epi_scheule_temp_change);

                			$insert_epi_schedule_temp_change = "INSERT INTO epi_schedule_temp_change (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, schedule_id, epi_year_ec, dateID, jan_date, feb_date, mar_date, apr_date, may_date, jun_date, jul_date, aug_date, sep_date, oct_date, nov_date, dec_date, ward_id, epi_year_es) SELECT epi_center_temp_change.center_id, epi_center_temp_change.ward_no, epi_center_temp_change.sub_block_name, epi_center_temp_change.center_name, epi_center_temp_change.from_house, epi_center_temp_change.to_house, epi_center_temp_change.center_type, epi_center_temp_change.ha_details, epi_center_temp_change.union_id, epi_center_temp_change.schedule_id, epi_center_temp_change.epi_year, mr_schedule_final.mr_dateID, mr_schedule_final.mr_jan, mr_schedule_final.mr_feb, mr_schedule_final.mr_mar, mr_schedule_final.mr_apr, mr_schedule_final.mr_may, mr_schedule_final.mr_jun, mr_schedule_final.mr_jul, mr_schedule_final.mr_aug, mr_schedule_final.mr_sep, mr_schedule_final.mr_oct, mr_schedule_final.mr_nov, mr_schedule_final.mr_dec, mr_schedule_final.ward_id, mr_schedule_final.epi_year FROM epi_center_temp_change JOIN mr_schedule_final ON epi_center_temp_change.center_id = mr_schedule_final.mr_dateID WHERE mr_schedule_final.epi_year = $epi_year AND epi_center_temp_change.union_id = $union_id AND epi_center_temp_change.epi_year = $epi_year";
                			$insert_epi_schedule_temp_change_run = mysqli_query($con, $insert_epi_schedule_temp_change);
							
							echo "<form method='post' action='../change_center_scheduler/epi_center_table_index.php'>";
			                echo "<br><strong>Monday-Thursday</strong> EPI Schedule Session is being changed for selected union and year. For final review or basic modification, please <button type='submit' name='click_here' class='btn btn-success btn-xs'>Click Here</button>";
			                echo "</from>";
						}
						elseif ($option == 2) 
						{
							$update_schedule_id = "UPDATE epi_center SET schedule_id = $option WHERE union_id = $union_id AND epi_year = $epi_year";
					        $update_schedule_id_run = mysqli_query($con, $update_schedule_id);

					        $truncate_epi_center_temp_change = "TRUNCATE TABLE epi_center_temp_change";
                			$truncate_epi_center_temp_change_run = mysqli_query($con, $truncate_epi_center_temp_change);

                			$insert_epi_center_temp_change_from_epi_center = "INSERT INTO epi_center_temp_change (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, epi_year, schedule_id) SELECT center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, epi_year, schedule_id FROM epi_center WHERE epi_center.epi_year = $epi_year AND epi_center.union_id = $union_id";
                			$insert_epi_center_temp_change_from_epi_center_run = mysqli_query($con, $insert_epi_center_temp_change_from_epi_center);

                			$truncate_epi_scheule_temp_change = "TRUNCATE TABLE epi_schedule_temp_change";
                			$truncate_epi_scheule_temp_change_run = mysqli_query($con, $truncate_epi_scheule_temp_change);

                			$insert_epi_schedule_temp_change = "INSERT INTO epi_schedule_temp_change (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, schedule_id, epi_year_ec, dateID, jan_date, feb_date, mar_date, apr_date, may_date, jun_date, jul_date, aug_date, sep_date, oct_date, nov_date, dec_date, ward_id, epi_year_es) SELECT epi_center_temp_change.center_id, epi_center_temp_change.ward_no, epi_center_temp_change.sub_block_name, epi_center_temp_change.center_name, epi_center_temp_change.from_house, epi_center_temp_change.to_house, epi_center_temp_change.center_type, epi_center_temp_change.ha_details, epi_center_temp_change.union_id, epi_center_temp_change.schedule_id, epi_center_temp_change.epi_year, sw_schedule_final.sw_dateID, sw_schedule_final.sw_jan, sw_schedule_final.sw_feb, sw_schedule_final.sw_mar, sw_schedule_final.sw_apr, sw_schedule_final.sw_may, sw_schedule_final.sw_jun, sw_schedule_final.sw_jul, sw_schedule_final.sw_aug, sw_schedule_final.sw_sep, sw_schedule_final.sw_oct, sw_schedule_final.sw_nov, sw_schedule_final.sw_dec, sw_schedule_final.ward_id, sw_schedule_final.epi_year FROM epi_center_temp_change JOIN sw_schedule_final ON epi_center_temp_change.center_id = sw_schedule_final.sw_dateID WHERE sw_schedule_final.epi_year = $epi_year AND epi_center_temp_change.union_id = $union_id AND epi_center_temp_change.epi_year = $epi_year";
                			$insert_epi_schedule_temp_change_run = mysqli_query($con, $insert_epi_schedule_temp_change);
							
							echo "<form method='post' action='../change_center_scheduler/epi_center_table_index.php'>";
			                echo "<br><strong>Sunday-Wednesday</strong> EPI Schedule Session is being changed for selected union and year. For final review or basic modification, please <button type='submit' name='click_here' class='btn btn-success btn-xs'>Click Here</button>";
			                echo "</from>";
						}
						elseif ($option == 3) 
						{
							$update_schedule_id = "UPDATE epi_center SET schedule_id = $option WHERE union_id = $union_id AND epi_year = $epi_year";
					        $update_schedule_id_run = mysqli_query($con, $update_schedule_id);

					        $truncate_epi_center_temp_change = "TRUNCATE TABLE epi_center_temp_change";
                			$truncate_epi_center_temp_change_run = mysqli_query($con, $truncate_epi_center_temp_change);

                			$insert_epi_center_temp_change_from_epi_center = "INSERT INTO epi_center_temp_change (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, epi_year, schedule_id) SELECT center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, epi_year, schedule_id FROM epi_center WHERE epi_center.epi_year = $epi_year AND epi_center.union_id = $union_id";
                			$insert_epi_center_temp_change_from_epi_center_run = mysqli_query($con, $insert_epi_center_temp_change_from_epi_center);

                			$truncate_epi_scheule_temp_change = "TRUNCATE TABLE epi_schedule_temp_change";
                			$truncate_epi_scheule_temp_change_run = mysqli_query($con, $truncate_epi_scheule_temp_change);

                			$insert_epi_schedule_temp_change = "INSERT INTO epi_schedule_temp_change (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, schedule_id, epi_year_ec, dateID, jan_date, feb_date, mar_date, apr_date, may_date, jun_date, jul_date, aug_date, sep_date, oct_date, nov_date, dec_date, ward_id, epi_year_es) SELECT epi_center_temp_change.center_id, epi_center_temp_change.ward_no, epi_center_temp_change.sub_block_name, epi_center_temp_change.center_name, epi_center_temp_change.from_house, epi_center_temp_change.to_house, epi_center_temp_change.center_type, epi_center_temp_change.ha_details, epi_center_temp_change.union_id, epi_center_temp_change.schedule_id, epi_center_temp_change.epi_year, at_schedule_final.at_dateID, at_schedule_final.at_jan, at_schedule_final.at_feb, at_schedule_final.at_mar, at_schedule_final.at_apr, at_schedule_final.at_may, at_schedule_final.at_jun, at_schedule_final.at_jul, at_schedule_final.at_aug, at_schedule_final.at_sep, at_schedule_final.at_oct, at_schedule_final.at_nov, at_schedule_final.at_dec, at_schedule_final.ward_id, at_schedule_final.epi_year FROM epi_center_temp_change JOIN at_schedule_final ON epi_center_temp_change.center_id = at_schedule_final.at_dateID WHERE at_schedule_final.epi_year = $epi_year AND epi_center_temp_change.union_id = $union_id AND epi_center_temp_change.epi_year = $epi_year";
                			$insert_epi_schedule_temp_change_run = mysqli_query($con, $insert_epi_schedule_temp_change);
							
							echo "<form method='post' action='../change_center_scheduler/epi_center_table_index.php'>";
			                echo "<br><strong>Saturday-Tuesday</strong> EPI Schedule Session is being changed for selected union and year. For final review or basic modification, please <button type='submit' name='click_here' class='btn btn-success btn-xs'>Click Here</button>";
			                echo "</from>";
						}
					?>
		            </div>
		          </div>
		        </div>
        		<br>
      		</div>
        </div>
    </div>
</div>
<?php include_once('../footer.php'); ?>