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
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-left">STEP :: 4</h2>
            <hr>
            <div class="outer-scontainer">
		        <div class="row">
		          <div class="jumbotron">
		            <div class="container">
		              <h4 class="display-3">
		              	<article>
		              	Please select a <strong>Union...</strong>
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
						global $union_id;
						$upazila_id;
						$upazila_id = $_SESSION['upazila_id'];
						
						$query_union = "SELECT * FROM union_council WHERE upazila_id = $upazila_id";
						$query_union_run = mysqli_query($con, $query_union);

						echo "<form method='post' action=''>";
						echo "<select name='union_id' class='form-control form-control-lg'>";
						while ($row = $query_union_run->fetch_assoc())
						{

						   echo '<option value="'.$row['union_id'].'">'.$row['union_name'].'</option>';
						}
						echo "</select>";
						echo '<br><button class="btn btn-primary" type="submit" name="submit_union">NEXT</button>';
						echo "&nbsp;&nbsp;&nbsp;&nbsp;";
						echo '<a class="btn btn-warning" href="../print_schedule/upazila_selection.php">PREVIOUS</a>';
						echo '</form>';

						if(isset($_POST["submit_union"]))
						{
							$union_id = $_POST["union_id"];
							$_SESSION['union_id'] = $union_id;
							?>
						<script type="text/javascript">
		    				window.location = "../print_schedule/year_selection.php";
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