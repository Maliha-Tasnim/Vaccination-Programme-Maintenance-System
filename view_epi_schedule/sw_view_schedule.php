<?php
  $page_title = 'SW Schedule List';
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
include '../view_epi_schedule/sw_view_db_controller.php';
$db_handle = new DBController();
$countryResult = $db_handle->runQuery("SELECT DISTINCT epi_year FROM sw_schedule_final ORDER BY sw_dateID ASC");
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">Modify <strong>Sunday-Wednesday</strong> EPI Schedule</h3>
            <hr>
            <small><p class="text-center">For final modification you have to follow the instruction from the menu option called Rechange EPI Schedule.</p></small>
            </div>
    <form method="POST" name="search" action="../view_epi_schedule/sw_view_schedule.php">
         <div class="col-lg-12">
        <h5><strong>Please select a year for modification...</strong></h5>
        </div>
        <div id="form-group">
            <div class="col-lg-6">
                <select id="Place" name="epi_year[]" class="form-control form-control-lg">
                        <?php
                        if (! empty($countryResult)) 
                        {
                            foreach ($countryResult as $key => $value) 
                            {
                                echo '<option value="' . $countryResult[$key]['epi_year'] . '">' . $countryResult[$key]['epi_year'] . '</option>';
                            }
                        }
                        ?>
                </select>
                <br>
            </div>
            <div class="col-lg-6">
            <button id="Filter" class="btn btn-primary btn-md btn-block">SEARCH SCHEDULE</button>
            </div>
            <?php
            if (! empty($_POST['epi_year'])) 
            {
                echo "<table class='table table-bordered' width='100%'>
                <tbody>
                <tr>
                    <th>Ward No.</th>
                    <th class='text-right'>Jan</th>
                    <th class='text-right'>Feb</th>
                    <th class='text-right'>Mar</th>
                    <th class='text-right'>Apr</th>
                    <th class='text-right'>May</th>
                    <th class='text-right'>Jun</th>
                    <th class='text-right'>Jul</th>
                    <th class='text-right'>Aug</th>
                    <th class='text-right'>Sep</th>
                    <th class='text-right'>Oct</th>
                    <th class='text-right'>Nov</th>
                    <th class='text-right'>Dec</th>
                    <th class='text-right'>Year</th>
                    <th class='text-right'>Action</th>
                </tr>";
            ?>
                         
            <?php
                $query = "SELECT * from sw_schedule_final";
                $i = 0;
                $selectedOptionCount = count($_POST['epi_year']);
                $selectedOption = "";
                
                while ($i < $selectedOptionCount) 
                {
                    $selectedOption = $selectedOption . "'" . $_POST['epi_year'][$i] . "'";
                    if ($i < $selectedOptionCount - 1) 
                    {
                        $selectedOption = $selectedOption . ", ";
                    }
                    $i ++;
                }
                $query = $query . " WHERE epi_year in (" . $selectedOption . ") ORDER BY sw_dateID ASC";
                $result = $db_handle->runQuery($query);
            }
            if (! empty($result)) 
            {
                foreach ($result as $key => $value) 
                {
                ?>
                    <tr>
                        <td><?php echo $result[$key]['ward_id']; ?></td>
                        <td class="text-right"><?php echo $result[$key]['sw_jan']; ?></td>
                        <td class="text-right"><?php echo $result[$key]['sw_feb']; ?></td>
                         <td class="text-right"><?php echo $result[$key]['sw_mar']; ?></td>
                        <td class="text-right"><?php echo $result[$key]['sw_apr']; ?></td>
                         <td class="text-right"><?php echo $result[$key]['sw_may']; ?></td>
                         <td class="text-right"><?php echo $result[$key]['sw_jun']; ?></td>
                        <td class="text-right"><?php echo $result[$key]['sw_jul']; ?></td>
                         <td class="text-right"><?php echo $result[$key]['sw_aug']; ?></td>
                         <td class="text-right"><?php echo $result[$key]['sw_sep']; ?></td>
                        <td class="text-right"><?php echo $result[$key]['sw_oct']; ?></td>
                         <td class="text-right"><?php echo $result[$key]['sw_nov']; ?></td>
                         <td class="text-right"><?php echo $result[$key]['sw_dec']; ?></td>
                         <td class="text-right"><?php echo $result[$key]['epi_year']; ?></td>
                        <td class="text-right">
                            <a href="../view_epi_schedule/sw_view_edit_year.php?id=<?php echo $result[$key]['id']; ?>"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                        </td class="text-right">
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
