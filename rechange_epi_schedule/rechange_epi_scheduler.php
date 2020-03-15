<?php
  $page_title = 'Rechange EPI Schedule';
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
            <h2 class="text-center">Instruction</h2>
            <hr>
            <div class="outer-scontainer">
        <div class="row">
          <div class="jumbotron">
            <div class="container">
              <h4 class="display-3">
              	<article>
              	You are going to rechange all EPI Center Session Schedule from your chosen year that you will select.
              	Please select the year from the drop down menu for rechanging EPI Center Session Schedule.
              	<br><br>
              	<strong>Noted That,</strong> All the EPI Center Information will be updated based on selected year schedule. Session Schedule will be remain same. 
              </article>
              </h4>
              <br>
            <?php
              	$conn = mysqli_connect("localhost", "root", "", "central_db");
              	$select_query = "SELECT epi_year FROM year";
				$select_query_run = mysqli_query($conn, $select_query);

				echo "<form method='post' action=''>";
				echo "<select name='epi_year' class='form-control form-control-lg'>";
				while ($row = $select_query_run->fetch_assoc())
				{

				   echo '<option value="'.$row['epi_year'].'">'.$row['epi_year'].'</option>';
				}
				echo "</select>";
				echo '<br><button class="btn btn-primary" type="submit" name="submit" >Submit</button>';
				echo '</form>';

				if(isset($_POST["submit"]))
				{
				 
				$epi_year=$_POST["epi_year"];
				echo "<form method='post' action=''>";

				//truncate epi_center_temp_year
				$sqlTruncateEpiCenterTempYear_first = "TRUNCATE TABLE epi_center_temp_year";
				$resultSqlTruncateEpiCenterTempYear_first = mysqli_query($conn, $sqlTruncateEpiCenterTempYear_first);

				//truncate epi_schedule_temp_year
				$sqlTruncateEpiScheduleTempYear_first = "TRUNCATE TABLE epi_schedule_temp_year";
				$resultSqlTruncateEpiScheduleTempYear_first = mysqli_query($conn, $sqlTruncateEpiScheduleTempYear_first);

				//insert epi_center_temp_year
				$sqlInsertEpiCenterTempYear = "INSERT INTO epi_center_temp_year (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, schedule_id) SELECT center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, schedule_id FROM epi_center WHERE epi_year = $epi_year";
				$resultSqlInsertEpiCenterTempYear = mysqli_query($conn, $sqlInsertEpiCenterTempYear);

				//update year on epi_center_temp_year
				$sqlUpdateYearOnEpiCenterTempYear = "UPDATE epi_center_temp_year SET epi_year = $epi_year";
				$resultSqlUpdateYearOnEpiCenterTempYear = mysqli_query($conn, $sqlUpdateYearOnEpiCenterTempYear);

				$sqlEpiCenterDeleteDuplication = "DELETE FROM epi_center WHERE epi_year = $epi_year";
                $resultSqlEpiCenterDeleteDuplication = mysqli_query($conn, $sqlEpiCenterDeleteDuplication);

				//copy mr schedule
				$sqlCopyMR = "INSERT INTO epi_schedule_temp_year (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, schedule_id, epi_year_ec, dateID, jan_date, feb_date, mar_date, apr_date, may_date, jun_date, jul_date, aug_date, sep_date, oct_date, nov_date, dec_date, ward_id, epi_year_es) SELECT epi_center_temp_year.center_id, epi_center_temp_year.ward_no, epi_center_temp_year.sub_block_name, epi_center_temp_year.center_name, epi_center_temp_year.from_house, epi_center_temp_year.to_house, epi_center_temp_year.center_type, epi_center_temp_year.ha_details, epi_center_temp_year.union_id, epi_center_temp_year.schedule_id, epi_center_temp_year.epi_year, mr_schedule_final.mr_dateID, mr_schedule_final.mr_jan, mr_schedule_final.mr_feb, mr_schedule_final.mr_mar, mr_schedule_final.mr_apr, mr_schedule_final.mr_may, mr_schedule_final.mr_jun, mr_schedule_final.mr_jul, mr_schedule_final.mr_aug, mr_schedule_final.mr_sep, mr_schedule_final.mr_oct, mr_schedule_final.mr_nov, mr_schedule_final.mr_dec, mr_schedule_final.ward_id, mr_schedule_final.epi_year FROM epi_center_temp_year JOIN mr_schedule_final ON epi_center_temp_year.center_id = mr_schedule_final.mr_dateID WHERE mr_schedule_final.epi_year = $epi_year AND epi_center_temp_year.schedule_id = 1 AND epi_center_temp_year.epi_year = $epi_year";
				$resultSqlCopyMR = mysqli_query($conn, $sqlCopyMR);

				//copy sw schedule
				$sqlCopySW = "INSERT INTO epi_schedule_temp_year (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, schedule_id, epi_year_ec, dateID, jan_date, feb_date, mar_date, apr_date, may_date, jun_date, jul_date, aug_date, sep_date, oct_date, nov_date, dec_date, ward_id, epi_year_es) SELECT epi_center_temp_year.center_id, epi_center_temp_year.ward_no, epi_center_temp_year.sub_block_name, epi_center_temp_year.center_name, epi_center_temp_year.from_house, epi_center_temp_year.to_house, epi_center_temp_year.center_type, epi_center_temp_year.ha_details, epi_center_temp_year.union_id, epi_center_temp_year.schedule_id, epi_center_temp_year.epi_year, sw_schedule_final.sw_dateID, sw_schedule_final.sw_jan, sw_schedule_final.sw_feb, sw_schedule_final.sw_mar, sw_schedule_final.sw_apr, sw_schedule_final.sw_may, sw_schedule_final.sw_jun, sw_schedule_final.sw_jul, sw_schedule_final.sw_aug, sw_schedule_final.sw_sep, sw_schedule_final.sw_oct, sw_schedule_final.sw_nov, sw_schedule_final.sw_dec, sw_schedule_final.ward_id, sw_schedule_final.epi_year FROM epi_center_temp_year JOIN sw_schedule_final ON epi_center_temp_year.center_id = sw_schedule_final.sw_dateID WHERE sw_schedule_final.epi_year = $epi_year AND epi_center_temp_year.schedule_id = 2 AND epi_center_temp_year.epi_year = $epi_year";
                $resultSqlCopySW = mysqli_query($conn, $sqlCopySW);

                //copy at schedule
                $sqlCopyAT="INSERT INTO epi_schedule_temp_year (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, schedule_id, epi_year_ec, dateID, jan_date, feb_date, mar_date, apr_date, may_date, jun_date, jul_date, aug_date, sep_date, oct_date, nov_date, dec_date, ward_id, epi_year_es) SELECT epi_center_temp_year.center_id, epi_center_temp_year.ward_no, epi_center_temp_year.sub_block_name, epi_center_temp_year.center_name, epi_center_temp_year.from_house, epi_center_temp_year.to_house, epi_center_temp_year.center_type, epi_center_temp_year.ha_details, epi_center_temp_year.union_id, epi_center_temp_year.schedule_id, epi_center_temp_year.epi_year, at_schedule_final.at_dateID, at_schedule_final.at_jan, at_schedule_final.at_feb, at_schedule_final.at_mar, at_schedule_final.at_apr, at_schedule_final.at_may, at_schedule_final.at_jun, at_schedule_final.at_jul, at_schedule_final.at_aug, at_schedule_final.at_sep, at_schedule_final.at_oct, at_schedule_final.at_nov, at_schedule_final.at_dec, at_schedule_final.ward_id, at_schedule_final.epi_year FROM epi_center_temp_year JOIN at_schedule_final ON epi_center_temp_year.center_id = at_schedule_final.at_dateID WHERE at_schedule_final.epi_year = $epi_year AND epi_center_temp_year.schedule_id = 3 AND epi_center_temp_year.epi_year = $epi_year";
                $resultSqlCopyAT = mysqli_query($conn, $sqlCopyAT);

                $sqlInsertEpiCenterTable = "INSERT INTO epi_center (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, epi_year, schedule_id) SELECT center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, epi_year, schedule_id FROM epi_center_temp_year";
                $resultSqlInsertEpiCenterTable = mysqli_query($conn, $sqlInsertEpiCenterTable);

                $sqlEpiScheduleDeleteDuplication = "DELETE FROM epi_schedule WHERE epi_year_ec = $epi_year AND epi_year_es = $epi_year";
    			$resultSqlEpiScheduleDeleteDuplication = mysqli_query($conn, $sqlEpiScheduleDeleteDuplication);

    			$sqlCopyTable = "INSERT INTO epi_schedule (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, schedule_id, epi_year_ec, dateID, jan_date, feb_date, mar_date, apr_date, may_date, jun_date, jul_date, aug_date, sep_date, oct_date, nov_date, dec_date, ward_id, epi_year_es) SELECT center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, schedule_id, epi_year_ec, dateID, jan_date, feb_date, mar_date, apr_date, may_date, jun_date, jul_date, aug_date, sep_date, oct_date, nov_date, dec_date, ward_id, epi_year_es FROM epi_schedule_temp_year";
    			$resultSqlCopyTable = mysqli_query($conn, $sqlCopyTable);

    			//truncate epi_center_temp_year
				$sqlTruncateEpiCenterTempYear_last = "TRUNCATE TABLE epi_center_temp_year";
				$resultSqlTruncateEpiCenterTempYear_last = mysqli_query($conn, $sqlTruncateEpiCenterTempYear_last);

				//truncate epi_schedule_temp_year
				$sqlTruncateEpiScheduleTempYear_last = "TRUNCATE TABLE epi_schedule_temp_year";
				$resultSqlTruncateEpiScheduleTempYear_last = mysqli_query($conn, $sqlTruncateEpiScheduleTempYear_last);
				?>
				<script type="text/javascript">
    				window.location = "../year_wise_scheduler/epi_thanks.php";
				</script>
				<?php 
				echo "</from>";
				}
				else
				{
				    $epi_year=2018;
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
