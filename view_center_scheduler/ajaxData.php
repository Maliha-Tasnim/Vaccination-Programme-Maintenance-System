<?php
//Include database configuration file
include('../view_center_scheduler/db_connect.php');

/*$conn = mysqli_connect("localhost", "root", "", "central_db");
$sqlUnionId = "SELECT union_id FROM epi_center WHERE union_id = '" . $_POST['union_id'] . "'";
$resultSqlUnionId = mysqli_query($conn, $sqlUnionId);
if (mysqli_num_rows($resultSqlUnionId) != null) 
{
    while($row = mysqli_fetch_assoc($resultSqlUnionId)) 
    {
        $union_id = $row["union_id"];
    }
} 
else 
{
    $union_id = 0;
}*/

if(isset($_POST["division_id"]) && !empty($_POST["division_id"]))
{
    //Get all district data
    $query = $mysqli->query("SELECT * FROM district WHERE division_id = ".$_POST['division_id']." ORDER BY district_name ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display states list
    if($rowCount > 0)
    {
        echo '<option value="">Select District</option>';
        
        while($row = $query->fetch_assoc())
        {
            echo '<option value="'.$row['district_id'].'">'.$row['district_name'].'</option>';
        }
    }
    else
    {
        echo '<option value="">District Not Available</option>';
    }
}

if(isset($_POST["district_id"]) && !empty($_POST["district_id"]))
{
    //Get all upazila data
    $query = $mysqli->query("SELECT * FROM upazila WHERE district_id = ".$_POST['district_id']." ORDER BY upazila_name ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display upazilas list
    if($rowCount > 0)
    {
        echo '<option value="">Select Upazila</option>';
        
        while($row = $query->fetch_assoc())
        {
            echo '<option value="'.$row['upazila_id'].'">'.$row['upazila_name'].'</option>';
        }
    }
    else
    {
        echo '<option value="">Upazila Not Available</option>';
    }
}

if(isset($_POST["upazila_id"]) && !empty($_POST["upazila_id"]))
{
    //Get all union data
    $query = $mysqli->query("SELECT * FROM union_council WHERE upazila_id = ".$_POST['upazila_id']." ORDER BY union_name ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display unions list
    if($rowCount > 0)
    {
        echo '<option value="">Select Union</option>';
        
        while($row = $query->fetch_assoc())
        {
            echo '<option value="'.$row['union_id'].'">'.$row['union_name'].'</option>';
        }
    }
    else
    {
        echo '<option value="">Union Not Available</option>';
    }
}

if(isset($_POST["union_id"]) && !empty($_POST["union_id"]))
{
    
    $union_id;
    $union_id = $_POST["union_id"];

    session_start();
    $_SESSION["union_id"] = $union_id;
    //Get all union data
    $query = $mysqli->query("SELECT DISTINCT epi_year FROM epi_center WHERE union_id = ".$_POST['union_id']." ORDER BY epi_year ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display unions list
    if($rowCount > 0)
    {
        echo '<option value="">Select Year</option>';
        
        while($row = $query->fetch_assoc())
        {
            echo '<option value="'.$row['epi_year'].'">'.$row['epi_year'].'</option>';
        }
    }
    else
    {
        echo '<option value="">Year Not Available</option>';
    }
}

//edited
if(isset($_POST["epi_year"]) && !empty($_POST["epi_year"]))
{
    
    $epi_year;
    $epi_year = $_POST["epi_year"];

    session_start();
    $union_id = $_SESSION["union_id"];

    //Get all union data
    $query = $mysqli->query("SELECT * FROM epi_schedule WHERE epi_year_ec = '$epi_year' AND union_id = '$union_id'");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display unions list
    if($rowCount > 0)
    {
        echo "<table class='table table-bordered'>
            <tr><td colspan='19' class='text-center'>The below information are shown based on your uploaded Union Council's EPI Center data.<td></tr>
            <tr>
                <th>Ward No</th>
                <th>Sub-Block</th>
                <th>Center Name</th>
                <th>From House</th>
                <th>To House</th>
                <th>Center Type</th>
                <th>JAN</th>
                <th>FEB</th>
                <th>MAR</th>
                <th>APR</th>
                <th>MAY</th>
                <th>JUN</th>
                <th>JUL</th>
                <th>AUG</th>
                <th>SEP</th>
                <th>OCT</th>
                <th>NOV</th>
                <th>DEC</th>
                <th>HA Details</th>
            </tr>";

        while($row = $query->fetch_assoc())
        {
            echo "<tr>";
            echo "<td>" . $row['ward_no'] . "</td>";
            echo "<td>" . $row['sub_block_name'] . "</td>";
            echo "<td>" . $row['center_name'] . "</td>";
            echo "<td>" . $row['from_house'] . "</td>";
            echo "<td>" . $row['to_house'] . "</td>";
            echo "<td>" . $row['center_type'] . "</td>";
            echo "<td>" . $row['jan_date'] . "</td>";
            echo "<td>" . $row['feb_date'] . "</td>";
            echo "<td>" . $row['mar_date'] . "</td>";
            echo "<td>" . $row['apr_date'] . "</td>";
            echo "<td>" . $row['may_date'] . "</td>";
            echo "<td>" . $row['jun_date'] . "</td>";
            echo "<td>" . $row['jul_date'] . "</td>";
            echo "<td>" . $row['aug_date'] . "</td>";
            echo "<td>" . $row['sep_date'] . "</td>";
            echo "<td>" . $row['oct_date'] . "</td>";
            echo "<td>" . $row['nov_date'] . "</td>";
            echo "<td>" . $row['dec_date'] . "</td>";
            echo "<td>" . $row['ha_details'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "<br>";
        echo "<h3 align='center'>Sorry, No Available Information!</h3>";
        echo "<hr>";
    }
}
?>