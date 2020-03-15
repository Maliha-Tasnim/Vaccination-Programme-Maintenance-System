<?php
  $page_title = 'Reports/Bugs';
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
      <h1>Reports & Bugs</h1>
      <hr>
      <form>
      	<div class="col-lg-12">
      		<label>Name</label>
      		<input type="text" placeholder="enter your name" class="form-control">
      	</div>
      	<div class="col-lg-6">
      	<br>
      		<label>Issue</label>
		      <select class="form-control">
		        <option selected>Choose...</option>
		        <option>Scheduling Problem</option>
		        <option>Data Upload Issue</option>
		        <option>Registration Child Issue</option>
		        <option>Update Vaccine Info</option>
		        <option>Profile Modification</option>
		        <option>Vaccination Statistics</option>
		        <option>Others</option>
		      </select>
    	</div>
    	<div class="col-lg-6">
    	<br>
    		<label>Contact</label>
      		<input type="number" placeholder="enter your contact no" class="form-control">
    	</div>
    	<div class="col-lg-12">
    	<br>
		    <label>Details About Problems/Issues</label>
		    <textarea class="form-control" placeholder="describe problems/issues in details" rows="3"></textarea>
	  	</div>
	  	<div class="col-lg-4">
	  	<br>
		    <label>Attach Screenshot</label>
		    <input type="file" class="form-control-file">
		</div>
		<div class="col-lg-6">
	  	<br>
		    <label>Facing From</label>
		    <input type="date" class="form-control">
		</div>
		<div class="col-lg-2">
	  	<br>
		    <label>&nbsp;</label>
		    <input class="btn btn-primary btn-md btn-block" type="submit" value="SUBMIT">
		</div>
      </form>
    </div>
  </div>
</div>
<?php include_once('../footer.php'); ?>