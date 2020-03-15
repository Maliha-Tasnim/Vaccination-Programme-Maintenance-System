<?php
  $page_title = 'Print Schedule';
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
$con = mysqli_connect("localhost","root","","central_db");

	// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<?php
	$union_id = $_SESSION['union_id'];
	$epi_year = $_SESSION['epi_year'];

	//query for collecting information
	$query_details_information = "SELECT division.division_name, district.district_name, upazila.upazila_name, union_council.union_name FROM division JOIN district ON district.division_id = division.division_id JOIN upazila ON upazila.district_id = district.district_id JOIN union_council ON union_council.upazila_id = upazila.upazila_id WHERE union_council.union_id = $union_id";
	$query_details_information_run = mysqli_query($con, $query_details_information);

	//query for fetching session
	$query_session = "SELECT DISTINCT schedule_id FROM epi_center WHERE epi_year = $epi_year AND union_id = $union_id";
	$query_session_run = mysqli_query($con, $query_session);

	while ($row = $query_session_run->fetch_assoc())
	{
		if ($row['schedule_id'] == 1) 
		{
			$session_day = "Mon-Thu";
		}
		elseif ($row['schedule_id'] == 2) 
		{
			$session_day = "Sun-Wed";
		}
		elseif ($row['schedule_id'] == 3) 
		{
			$session_day = "Sat-Tue";
		}
	}

	//query for generating schedule table
	$query_schedule = "SELECT * FROM epi_schedule WHERE union_id = $union_id AND epi_year_ec = $epi_year AND epi_year_es = $epi_year";
    $query_schedule_run = mysqli_query($con, $query_schedule);
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      	<div class="table-responsive" id="div_print">
    		<div class="table table-sm" align='center'>
      			<h4>Ward Based Session Plan [Upazilla]</h4>
      			<small> 
      				<?php while ($row = $query_details_information_run->fetch_assoc())
						{
							echo "<strong>Union: </strong>" . $row['union_name'];
							echo ".....<strong>Upazila: </strong>" . $row['upazila_name'];
							echo ".....<strong>District: </strong>" . $row['district_name'];
							echo ".....<strong>Division: </strong>" . $row['division_name'];
						};
						echo ".....<strong>Year: </strong>" . $epi_year;
						echo ".....<strong>Schedule: </strong>" . $session_day;
					?>
				</small>
				<?php
				if (mysqli_num_rows($query_schedule_run) > 0) 
        		{
        		?>
				<table class="table table-bordered table-striped" width="100%">
        		<thead>
        			<tr style="font-size: 10px">
		                <th class="text-center" width="1%">WN</th>
		                <th class="text-center" width="1%">SB</th>
		                <th class="text-center" width="5%">Center Name</th>
		                <th class="text-center" width="1%">FH#</th>
		                <th class="text-center" width="1%">TH#</th>
		                <th class="text-center" width="2%">CT</th>
		                <th class='text-center' width="1%">Jan</th>
	                    <th class='text-center' width="1%">Feb</th>
	                    <th class='text-center' width="1%">Mar</th>
	                    <th class='text-center' width="1%">Apr</th>
	                    <th class='text-center' width="1%">May</th>
	                    <th class='text-center' width="1%">Jun</th>
	                    <th class='text-center' width="1%">Jul</th>
	                    <th class='text-center' width="1%">Aug</th>
	                    <th class='text-center' width="1%">Sep</th>
	                    <th class='text-center' width="1%">Oct</th>
	                    <th class='text-center' width="1%">Nov</th>
	                    <th class='text-center' width="1%">Dec</th>
	                    <th class="text-center" width="77%">HA Details</th>
            		</tr>
        		</thead>
				<?php
            	while ($row = mysqli_fetch_array($query_schedule_run)) 
            	{
        		?>    
                <tbody>
	                <tr style="font-size: 10px">
	                    <td class="text-center"><?php  echo $row['ward_no']; ?></td>
	                    <td class="text-center"><?php  echo $row['sub_block_name']; ?></td>
	                    <td class="text-left"><?php  echo $row['center_name']; ?></td>
	                    <td class="text-center"><?php  echo $row['from_house']; ?></td>
	                    <td class="text-center"><?php  echo $row['to_house']; ?></td>
	                    <td class="text-center"><?php  echo $row['center_type']; ?></td>
	                    <td class="text-left"><?php  echo $row['jan_date']; ?></td>
	                    <td class="text-left"><?php  echo $row['feb_date']; ?></td>
	                    <td class="text-left"><?php  echo $row['mar_date']; ?></td>
	                    <td class="text-left"><?php  echo $row['apr_date']; ?></td>
	                    <td class="text-left"><?php  echo $row['may_date']; ?></td>
	                    <td class="text-left"><?php  echo $row['jun_date']; ?></td>
	                    <td class="text-left"><?php  echo $row['jul_date']; ?></td>
	                    <td class="text-left"><?php  echo $row['aug_date']; ?></td>
	                    <td class="text-left"><?php  echo $row['sep_date']; ?></td>
	                    <td class="text-left"><?php  echo $row['oct_date']; ?></td>
	                    <td class="text-left"><?php  echo $row['nov_date']; ?></td>
	                    <td class="text-left"><?php  echo $row['dec_date']; ?></td>
	                    <td class="text-left"><?php  echo $row['ha_details']; ?></td>
	                </tr>
	            <?php
	            }
	            ?>
            	</tbody>
    			</table>
        		<?php 
    			} 
    			?>
    			<p class="text-left">
    				<small>
    					<strong>Co-Ordinator Details</strong>
    					<br>
    					1. Name:....................................................
    					Designation:...................
    					Contact:....................................................
    					<br>
    					2. Name:....................................................
    					Designation:...................
    					Contact:....................................................
    				</small>
    			</p>
    			<p class="text-left">
    				<small>
    					<strong>Name: </strong>..................................................
    					<strong>Sign: </strong>
    					........................... MT[EPI],
    					Upazila Health Complex
    				</small>
    				<small>
    					<br>
    					<strong>Name: </strong>..................................................
    					<strong>Sign: </strong>
    					........................... UHOP,
    					Upazila Health Complex
    				</small>
    			</p>
    		</div>
  		</div>
  		<input name="b_print" type="button" class="ipt"   onClick="printdiv('div_print');" value=" Print EPI Schedule">
  		<br>
  		<br>
    </div>
  </div>
</div>
<?php include_once('../footer.php'); ?>
<script language="javascript">
	function printdiv(printpage)
	{
		var css = '@page { size: landscape; }', style = document.createElement('style');
		style.type = 'text/css';
		style.media = 'print';

		if (style.styleSheet)
		{
  			style.styleSheet.cssText = css;
		} 
		else 
		{
  			style.appendChild(document.createTextNode(css));
		}

		var newstr = document.all.item(printpage).innerHTML;
		var oldstr = document.body.innerHTML;
		document.body.innerHTML = newstr;
		window.print();
		document.body.innerHTML = oldstr;
		return false;
	}
</script>