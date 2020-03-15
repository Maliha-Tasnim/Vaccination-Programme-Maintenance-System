<?php
  $page_title = 'Registration Process';
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
            <h3 class="text-left">Step 1 | Provide the Following Information</h3>
            <hr>
            <div class="outer-scontainer">
		        <div class="row">
		          <div class="jumbotron">
		            <div class="container">
		            <article>
		            	<h4><strong>Instruction:</strong> Please enter your username and password, the username and the password you are using to login here. And also enter the Union ID and Ward No. Your Union ID is same as first portion of your username and Ward No is the last portion of your username.</h4>
		            </article>
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
						global $username;
						global $password;
						global $union_id;
						global $ward_no;
						global $epi_year;

						$query_year = "SELECT DISTINCT epi_year FROM epi_center ORDER BY epi_year ASC";
						$query_year_run = mysqli_query($con, $query_year);
						?>
						<form method="post" action="">
					      	<div class="col-lg-3">
							    <label>Username</label>
							    <input type="text" required class="form-control" name="username" value="<?php echo (isset($username)) ? $username: ''?>" placeholder="Enter Your Username">
							</div>
							<div class="col-lg-3">
							    <label>Password</label>
							    <input type="text" required class="form-control" name="password" value="<?php echo (isset($password)) ? $password: ''?>" placeholder="Enter Your Password">
							</div>
							<div class="col-lg-2">
							    <label>Union ID</label>
							    <input type="number" min="1" max="9999" required value="<?php echo (isset($union_id)) ? $union_id: ''?>" class="form-control" name="union_id" placeholder="Union ID">
							</div>
							<div class="col-lg-2">
							    <label>Ward No.</label>
							    <input type="number" required  min="1" max="3" value="<?php echo (isset($ward_no)) ? $ward_no: ''?>" class="form-control" name="ward_no" placeholder="Ward No.">
							</div>
							<div class="col-lg-2">
							    <label>EPI Year</label>
							    <select name='epi_year' class='form-control form-control-lg'>
								<?php
								while ($row = $query_year_run->fetch_assoc())
								{

								   echo '<option value="'.$row['epi_year'].'">'.$row['epi_year'].'</option>';
								}
								?>
								</select>
							</div>
						<div class="col-lg-4"><br><button class="btn btn-primary" type="submit" name="submit_details">NEXT</button></div>
						</form>
						<?php
						if(isset($_POST["submit_details"]))
						{
							$username = $_POST["username"];
							$_SESSION['username'] = $username;
							$password = $_POST["password"];
							$_SESSION['password'] = $password;
							$union_id = $_POST["union_id"];
							$_SESSION['union_id'] = $union_id;
							$ward_no = $_POST["ward_no"];
							$_SESSION['ward_no'] = $ward_no;
							$epi_year = $_POST["epi_year"];
							$_SESSION['epi_year'] = $epi_year;
							     
							$query = "SELECT * FROM users WHERE username = '". mysqli_real_escape_string($con, $username) ."' AND password = '". mysqli_real_escape_string($con, $password) ."' AND union_id = '". mysqli_real_escape_string($con, $union_id) ."' AND ward_no = '". mysqli_real_escape_string($con, $ward_no)."'";
							
							$result = mysqli_query($con, $query);
							if (mysqli_num_rows($result) == 1) 
							{
							?>
								<script type="text/javascript">
				    				window.location = "../epi_details_reg/center_selection.php";
								</script>
							<?php 
							}
							else 
							{
							echo "<div align='text-left' class='col-lg-12'><br>Your Username, Password, Union ID or Ward No does not match. Please recheck and try again.</div>";
							}   
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
