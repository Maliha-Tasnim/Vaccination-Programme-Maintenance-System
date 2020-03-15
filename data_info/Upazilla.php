<?php
  $page_title = 'Upload Upazila';
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

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        fgetcsv($file);
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsertupa = "INSERT into upazila (Upazila_ID,Upazila_Name,District_ID) values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "')";
            $resultupa = mysqli_query($conn, $sqlInsertupa);
            
             if (! empty($resultupa)) {
                $type = "success";
                $message = "CSV data has been successfully imported.";
            } else {
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

    <h2 class="text-center">Import Upazila CSV File Into DB</h2>
    <hr>
    
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    <div class="outer-scontainer">
            <div class="row">

            <form class="col-lg-12" action="" method="post"
                name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                <div class="input-row">
                    <label class="control-label">Choose Upazila CSV File</label> <br>
                    <br><input type="file" name="file" id="file" accept=".csv"> <br>
                    <button type="submit" id="submit" name="import" class="btn btn-primary">Import</button> 

                    <a href="../data_info/delete_upazilla.php" class="btn btn-danger btn-danger" data-toggle="tooltip" title="Remove">Delete</a>

                    <br /></div></form></div> 
                    
        <br>
               <?php
            $sqlSelect = "SELECT * FROM upazila";
            $result = mysqli_query($conn, $sqlSelect);
            
            if (mysqli_num_rows($result) > 0) {
                ?>
            <table id='upazilaTable' class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-left" width="20%">Upazila ID</th>
                    <th class="text-left" width="20%">Upazila Name</th>
                    <th class="text-left" width="20%">District ID</th>
                    

                </tr>
            </thead>
<?php
                
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    
                <tbody>
                <tr>
                    <td width="20%" class="text-left"><?php  echo $row['upazila_id']; ?></td>
                    <td width="20%" class="text-left"><?php  echo $row['upazila_name']; ?></td>
                    <td width="20%" class="text-left"><?php  echo $row['district_id']; ?></td>
                </tr>
                    <?php
                }
                ?>
                </tbody>
        </table>
        <?php } ?>
    </div>
  </div>
</div>
  <?php include_once('../footer.php'); ?>
