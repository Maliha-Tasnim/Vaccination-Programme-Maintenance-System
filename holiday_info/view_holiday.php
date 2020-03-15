<?php
  $page_title = 'Holiday List';
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
include '../holiday_info/view_db_controller.php';
$db_handle = new DBController();
$countryResult = $db_handle->runQuery("SELECT DISTINCT holiday_year FROM holiday_final ORDER BY holiday_year ASC");
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Add/Update Govt. Holiday Schedule</h2>
            <small><strong>Note:</strong> For final modification you have to follow the instruction from the menu option called Rechange EPI Schedule. Before do this, at first you have to follow the instruction of <strong>EPI Session Scheduler</strong> then follow the instruction of <strong>Rechange EPI Schedule</strong>.</p></small>
            <hr>
            </div>
    <form method="POST" name="search" action="../holiday_info/view_holiday.php">
         <div class="col-md-12">
        <h5><strong>Please select a year for modification...</strong></h5>
        </div>
        <div id="form-group">
            <div class="col-md-4">
                <select id="Place" name="holiday_year[]" class="form-control form-control-lg">
                        <?php
                        if (! empty($countryResult)) 
                        {
                            foreach ($countryResult as $key => $value) 
                            {
                                echo '<option value="' . $countryResult[$key]['holiday_year'] . '">' . $countryResult[$key]['holiday_year'] . '</option>';
                            }
                        }
                        ?>
                </select>
                <br>
            </div>
            <div class="col-md-4">
            <button id="Filter" class="btn btn-primary btn-md btn-block">SEARCH HOLIDAY</button>
            </div>
            <div class="col-md-4">
            <a href="../holiday_info/view_add_year.php" type="button" class="btn btn-warning btn-md btn-block" id="Addyear" role="button">ADD HOLIDAY</a>
            </div>
            <?php
            if (! empty($_POST['holiday_year'])) 
            {
                echo "<table class='table table-bordered' width='100%'>
                <tbody>
                <tr>
                    <th>Title</th>
                    <th class='text-right'>Date</th>
                    <th class='text-right'>Month</th>
                    <th class='text-right'>Year</th>
                    <th class='text-right'>Update</th>
                    <th class='text-right'>Delete</th>
                </tr>";
            ?>
                         
            <?php
                $query = "SELECT * from holiday_final";
                $i = 0;
                $selectedOptionCount = count($_POST['holiday_year']);
                $selectedOption = "";
                
                while ($i < $selectedOptionCount) 
                {
                    $selectedOption = $selectedOption . "'" . $_POST['holiday_year'][$i] . "'";
                    if ($i < $selectedOptionCount - 1) 
                    {
                        $selectedOption = $selectedOption . ", ";
                    }
                    $i ++;
                }
                $query = $query . " WHERE holiday_year in (" . $selectedOption . ") ORDER BY holiday_month ASC";
                $result = $db_handle->runQuery($query);
            }
            if (! empty($result)) 
            {
                foreach ($result as $key => $value) 
                {
                ?>
                    <tr>
                        <td><?php echo $result[$key]['holiday_name']; ?></td>
                        <td class="text-right"><?php echo $result[$key]['holiday_date']; ?></td>
                        <td class="text-right"><?php echo $result[$key]['holiday_month']; ?></td>
                         <td class="text-right"><?php echo $result[$key]['holiday_year']; ?></td>
                        <td class="text-right">
                            <a href="../holiday_info/view_edit_year.php?id=<?php echo $result[$key]['id']; ?>"><i class="glyphicon glyphicon-pencil"></i> EDIT</a>
                        </td class="text-right">
                        <td class="text-right">
                            <a href="../holiday_info/view_delete_year.php?id=<?php echo $result[$key]['id']; ?>"><i class="glyphicon glyphicon-remove"></i> DELETE</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                    
                </tbody>
            </table>
            <?php
            }
            ?>
    </form>
        </div>
    </div>
</div>
  <?php include_once('../footer.php'); ?>
