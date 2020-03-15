<?php
  $page_title = 'Holiday Scheduler';
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
$conn = mysqli_connect("localhost", "root", "", "central_db");
global $year;
$sql = "SELECT holiday_year FROM holiday_events";
$result = mysqli_query($conn, $sql);
while($row = $result->fetch_assoc())
   $year = $row["holiday_year"];

if(isset($_POST['save']))
{

    $sqlDeleteTable = "DELETE FROM holiday_final WHERE holiday_year = $year";
    $resultDeleteTable = mysqli_query($conn, $sqlDeleteTable);

    $sqlCopyTable = "INSERT INTO holiday_final (holiday_name,
    holiday_date, holiday_month, holiday_year) SELECT holiday_name, holiday_date, holiday_month, holiday_year FROM holiday_events WHERE holiday_year = $year";
    $resultCopyTable = mysqli_query($conn, $sqlCopyTable);

    $sqlInsertYear = "INSERT INTO year (epi_year) VALUES ($year)";
    $resultInsertYear = mysqli_query($conn, $sqlInsertYear);

    $sqlIgnoreDuplicate = "ALTER IGNORE TABLE year ADD CONSTRAINT year_unique UNIQUE (epi_year)";
    $resultIgnoreDuplicate = mysqli_query($conn, $sqlIgnoreDuplicate);
    ?>
    <script type="text/javascript">
		window.location = "../holiday_info/epi_thanks.php";
	</script>
	<?php
}

if(isset($_POST['update']))
{
	$sqlDeleteTable = "DELETE FROM holiday_final WHERE holiday_year = $year";
	$resultDeleteTable = mysqli_query($conn, $sqlDeleteTable);
    
    $sqlCopyTable = "INSERT INTO holiday_final (holiday_name,
    holiday_date, holiday_month, holiday_year) SELECT holiday_name, holiday_date, holiday_month, holiday_year FROM holiday_events WHERE holiday_year = $year";
    $resultCopyTable = mysqli_query($conn, $sqlCopyTable);

    $message = "Govt. holiday schedule is successfully updated.<br><br>";
}
?>
<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

		<!-- Metis Menu Plugin JavaScript -->
		<script src="../libs/dist/metisMenu/metisMenu.min.js"></script>

		<!-- Custom Theme JavaScript -->
		<script src="../libs/js/sb-admin-2.js"></script>
	</head>
	<div id="page-wrapper">
    	<div class="row">
        	<div class="col-lg-12">

    <h2 class="text-center">
    	<?php
    	if ($year == null || $year == '') 
    	{
    		echo "No Govt. Holiday Schedule Found";
    	}
    	else
    		echo "Govt. Holiday Schedule - " .$year;
    	?>	
    </h2>
    <hr>
			<div class="outer-scontainer">
				<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
				<div align="left">
					<form method="post">
						<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-success btn-sm">Add Holiday</button>
                		<button type="submit" class="btn btn-primary btn-sm" name="save">Save</button>
                		<button type="submit" class="btn btn-info btn-sm" name="update">Update</button>
            		</form>
				</div>
				<br />

				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Holiday Title</th>
							<th>Date</th>
                            <th>Month</th>
                            <th>Year</th>
							<th>Modify</th>
							<th>Remove</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Holiday</h4>
				</div>
				<div class="modal-body">
					<label>Select Holiday</label>
                    <select name="holiday_name" id="holiday_name" class="form-control">
                        <option value="Language Martyrs Day">Language Martyrs' Day</option>
                        <option value="Sheikh Mujibur Rahman birthday">Sheikh Mujibur Rahman's birthday</option>
                        <option value="Independence Day">Independence Day</option>
                        <option value="Bengali New Year">Bengali New Year</option>
                        <option value="Buddha Purnima">Buddha Purnima</option>
                        <option value="May Day">May Day</option>
                        <option value="Shab e-Barat">Shab e-Barat</option>
                        <option value="Night of Destiny">Night of Destiny</option>
                        <option value="Jumatul Bidah">Jumatul Bidah</option>
                        <option value="Eid ul-Fitr Holiday 1">Eid ul-Fitr Holiday 1</option>
                        <option value="Eid ul-Fitr Holiday 2">Eid ul-Fitr Holiday 2</option>
                        <option value="Eid ul-Fitr Holiday 3">Eid ul-Fitr Holiday 3</option>
                        <option value="National Mourning Day">National Mourning Day</option>
                        <option value="Eid ul-Adha Holiday 1">Eid ul-Adha Holiday 1</option>
                        <option value="Eid ul-Adha Holiday 2">Eid ul-Adha Holiday 2</option>
                        <option value="Eid ul-Adha Holiday 3">Eid ul-Adha Holiday 3</option>
                        <option value="Janmashtami">Janmashtami</option>
                        <option value="Ashura">Ashura</option>
                        <option value="Durga Puja">Durga Puja</option>
                        <option value="Eid e-Milad-un Nabi">Eid e-Milad-un Nabi</option>
                        <option value="Victory Day">Victory Day</option>
                        <option value="Christmas Day">Christmas Day</option>
                        <option value="Optional Holiday 1">Optional Holiday 1</option>
                        <option value="Optional Holiday 2">Optional Holiday 2</option>
                        <option value="Optional Holiday 3">Optional Holiday 3</option>
                        <option value="Optional Holiday 4">Optional Holiday 4</option>
                        <option value="Optional Holiday 5">Optional Holiday 5</option>
                    </select>
					<br />
					<label>Enter Date</label>
                    	<input type="number" name="holiday_date" id="holiday_date" class="form-control" min="1" max="31">
					<br />
                    <label>Select Month</label>
                    <select name="holiday_month" id="holiday_month" class="form-control">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <br />
                    <label>Enter Year</label>
                    	<input type="number" name="holiday_year" id="holiday_year" class="form-control" min="2018" max="9999">
                    <br />
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Add Holiday");
		$('#action').val("Add");
		$('#operation').val("Add");
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"../holiday_info/fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var holiday_name = $('#holiday_name').val();
		var holiday_date = $('#holiday_date').val();
        var holiday_month = $('#holiday_month').val();
        var holiday_year = $('#holiday_year').val();
		if(holiday_name != '' && holiday_date != '' && holiday_month != '' && holiday_year != '')
		{
			$.ajax({
				url:"../holiday_info/insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("All Fields are Required");
		}
	});
	
	$(document).on('click', '.update', function(){
		var user_id = $(this).attr("id");
		$.ajax({
			url:"../holiday_info/fetch_single.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#holiday_name').val(data.holiday_name);
				$('#holiday_date').val(data.holiday_date);
                $('#holiday_month').val(data.holiday_month);
                $('#holiday_year').val(data.holiday_year);
				$('.modal-title').text("Edit Holiday");
				$('#user_id').val(user_id);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"../holiday_info/delete.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
});
</script>