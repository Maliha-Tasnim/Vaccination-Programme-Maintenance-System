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
            <h2 class="text-left">STEP :: 5</h2>
            <hr>
            <div class="outer-scontainer">
		        <div class="row">
		          <div class="jumbotron">
		            <div class="container">
		              <h4 class="display-3">
		              	<article>
		              	Please select a <strong>Year...</strong>
		              </article>
		              </h4>
		              <br>
		            <?php
					$con = mysqli_connect("localhost","root","","central_db");

					// Check connection
					if (mysqli_connect_errno())
					  {
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();
					  }
					?>
					<?php
						global $epi_year;
						$union_id;
						$union_id = $_SESSION['union_id'];
						
						$query_year = "SELECT DISTINCT epi_year FROM epi_center WHERE union_id = $union_id";
						$query_year_run = mysqli_query($con, $query_year);

						echo "<form method='post' action=''>";
						echo "<select name='epi_year' class='form-control form-control-lg'>";
						while ($row = $query_year_run->fetch_assoc())
						{

						   echo '<option value="'.$row['epi_year'].'">'.$row['epi_year'].'</option>';
						}
						echo "</select>";
						echo '<br><button class="btn btn-primary" type="submit" name="submit_year">NEXT</button>';
						echo "&nbsp;&nbsp;&nbsp;&nbsp;";
						echo '<a class="btn btn-warning" href="../change_center_scheduler/union_selection.php">PREVIOUS</a><br><br>
						If there no values shown on dropdown menu, then the EPI information for the selected UNION is not uploaded/updated yet.&nbsp;<a class="btn btn-danger btn-xs" href="../main/admin.php">CLICK HERE TO EXIT</a>';
						echo '</form>';

						if(isset($_POST["submit_year"]))
						{
							$epi_year = $_POST["epi_year"];
							$_SESSION['epi_year'] = $epi_year;
							?>
						<script type="text/javascript">
		    				window.location = "../change_center_scheduler/schedule_selection.php";
						</script>
					<?php 
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