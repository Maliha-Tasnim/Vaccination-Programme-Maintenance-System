<?php
include_once('../header.php');
require_once ("db_connection.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "central_db";

$dayOne="";
$dayTwo="";

global $epi_year;
//event day for January
global $eventDateJan01;
global $eventDateJan02;
global $eventDateJan03;
global $eventDateJan04;
global $eventDateJan05;
global $eventDateJan06;
global $eventDateJan07;
global $eventDateJan08;
global $eventDateJan09;
global $eventDateJan10;

//event day for February
global $eventDateFeb01;
global $eventDateFeb02;
global $eventDateFeb03;
global $eventDateFeb04;
global $eventDateFeb05;
global $eventDateFeb06;
global $eventDateFeb07;
global $eventDateFeb08;
global $eventDateFeb09;
global $eventDateFeb10;

//event day for March
global $eventDateMar01;
global $eventDateMar02;
global $eventDateMar03;
global $eventDateMar04;
global $eventDateMar05;
global $eventDateMar06;
global $eventDateMar07;
global $eventDateMar08;
global $eventDateMar09;
global $eventDateMar10;

//event day for April
global $eventDateApr01;
global $eventDateApr02;
global $eventDateApr03;
global $eventDateApr04;
global $eventDateApr05;
global $eventDateApr06;
global $eventDateApr07;
global $eventDateApr08;
global $eventDateApr09;
global $eventDateApr10;

//event day for May
global $eventDateMay01;
global $eventDateMay02;
global $eventDateMay03;
global $eventDateMay04;
global $eventDateMay05;
global $eventDateMay06;
global $eventDateMay07;
global $eventDateMay08;
global $eventDateMay09;
global $eventDateMay10;

//event day for June
global $eventDateJun01;
global $eventDateJun02;
global $eventDateJun03;
global $eventDateJun04;
global $eventDateJun05;
global $eventDateJun06;
global $eventDateJun07;
global $eventDateJun08;
global $eventDateJun09;
global $eventDateJun10;

//event day for July
global $eventDateJul01;
global $eventDateJul02;
global $eventDateJul03;
global $eventDateJul04;
global $eventDateJul05;
global $eventDateJul06;
global $eventDateJul07;
global $eventDateJul08;
global $eventDateJul09;
global $eventDateJul10;

//event day for August
global $eventDateAug01;
global $eventDateAug02;
global $eventDateAug03;
global $eventDateAug04;
global $eventDateAug05;
global $eventDateAug06;
global $eventDateAug07;
global $eventDateAug08;
global $eventDateAug09;
global $eventDateAug10;

//event day for September
global $eventDateSep01;
global $eventDateSep02;
global $eventDateSep03;
global $eventDateSep04;
global $eventDateSep05;
global $eventDateSep06;
global $eventDateSep07;
global $eventDateSep08;
global $eventDateSep09;
global $eventDateSep10;

//event day for October
global $eventDateOct01;
global $eventDateOct02;
global $eventDateOct03;
global $eventDateOct04;
global $eventDateOct05;
global $eventDateOct06;
global $eventDateOct07;
global $eventDateOct08;
global $eventDateOct09;
global $eventDateOct10;

//event day for November
global $eventDateNov01;
global $eventDateNov02;
global $eventDateNov03;
global $eventDateNov04;
global $eventDateNov05;
global $eventDateNov06;
global $eventDateNov07;
global $eventDateNov08;
global $eventDateNov09;
global $eventDateNov10;

//event day for December
global $eventDateDec01;
global $eventDateDec02;
global $eventDateDec03;
global $eventDateDec04;
global $eventDateDec05;
global $eventDateDec06;
global $eventDateDec07;
global $eventDateDec08;
global $eventDateDec09;
global $eventDateDec10;

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//weekday connection START
$sqlDayOne = "SELECT Name FROM days WHERE days_id='2'";
$resultDayOne = mysqli_query($conn, $sqlDayOne);

if (mysqli_num_rows($resultDayOne) > 0) {
    while($row = mysqli_fetch_assoc($resultDayOne)) {
        $dayOne = $row["Name"];
    }
} else {
    echo "Error";
}

$sqlDayTwo = "SELECT Name FROM days WHERE days_id='5'";
$resultDayTwo = mysqli_query($conn, $sqlDayTwo);

if (mysqli_num_rows($resultDayTwo) > 0) {
    while($row = mysqli_fetch_assoc($resultDayTwo)) {
        $dayTwo = $row["Name"];
    }
} else {
    echo "Error";
}
//weekday connection END

//SELECT EPI YEAR START
$select_query = "SELECT epi_year FROM year";
$select_query_run = mysqli_query($conn, $select_query);

echo "<form method='post' action=''>";
echo "<select name='epi_year' class='form-control form-control-lg'>";
while ($row = $select_query_run->fetch_assoc())
{

   echo '<option value="'.$row['epi_year'].'">'.$row['epi_year'].'</option>';
}
echo "</select>";
echo '<br><button class="btn btn-primary" type="submit" name="submit" >Submit</button>';
echo '</form>';

if(isset($_POST["submit"]))
{
 
$epi_year=$_POST["epi_year"];
echo "<form method='post' action=''>";
echo '</br>' . "<strong>Sunday-Wednesday</strong> EPI Schedule is being created/rechanged for Year ".$epi_year.". To view/modification <button type='submit' name='click_here' class='btn btn-warning btn-xs'>Click Here</button>";
echo "</from>";
}
else
{
    $epi_year=2018;
}
//SELECT EPI YEAR END

//holiday for January Connection Start
$sqlEventDateJan01 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 1 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1";
$resultEventDateJan01 = mysqli_query($conn, $sqlEventDateJan01);
if (mysqli_num_rows($resultEventDateJan01) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJan01)) {
        $eventDateJan01 = $row["holiday_date"];
    }
} else {
    $eventDateJan01 = 0;
}
/**/
$sqlEventDateJan02 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 1 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1,1";
$resultEventDateJan02 = mysqli_query($conn, $sqlEventDateJan02);
if (mysqli_num_rows($resultEventDateJan02) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJan02)) {
        $eventDateJan02 = $row["holiday_date"];
    }
} else {
    $eventDateJan02 = 0;
}
/**/
$sqlEventDateJan03 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 1 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 2,1";
$resultEventDateJan03 = mysqli_query($conn, $sqlEventDateJan03);
if (mysqli_num_rows($resultEventDateJan03) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJan03)) {
        $eventDateJan03 = $row["holiday_date"];
    }
} else {
    $eventDateJan03 = 0;
}
/**/
$sqlEventDateJan04 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 1 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 3,1";
$resultEventDateJan04 = mysqli_query($conn, $sqlEventDateJan04);
if (mysqli_num_rows($resultEventDateJan04) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJan04)) {
        $eventDateJan04 = $row["holiday_date"];
    }
} else {
    $eventDateJan04 = 0;
}
/**/
$sqlEventDateJan05 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 1 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 4,1";
$resultEventDateJan05 = mysqli_query($conn, $sqlEventDateJan05);
if (mysqli_num_rows($resultEventDateJan05) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJan05)) {
        $eventDateJan05 = $row["holiday_date"];
    }
} else {
    $eventDateJan05 = 0;
}
/**/
$sqlEventDateJan06 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 1 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 5,1";
$resultEventDateJan06 = mysqli_query($conn, $sqlEventDateJan06);
if (mysqli_num_rows($resultEventDateJan06) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJan06)) {
        $eventDateJan06 = $row["holiday_date"];
    }
} else {
    $eventDateJan06 = 0;
}
/**/
$sqlEventDateJan07 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 1 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 6,1";
$resultEventDateJan07 = mysqli_query($conn, $sqlEventDateJan07);
if (mysqli_num_rows($resultEventDateJan07) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJan07)) {
        $eventDateJan07 = $row["holiday_date"];
    }
} else {
    $eventDateJan07 = 0;
}
/**/
$sqlEventDateJan08 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 1 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 7,1";
$resultEventDateJan08 = mysqli_query($conn, $sqlEventDateJan08);
if (mysqli_num_rows($resultEventDateJan08) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJan08)) {
        $eventDateJan08 = $row["holiday_date"];
    }
} else {
    $eventDateJan08 = 0;
}
/**/
$sqlEventDateJan09 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 1 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 8,1";
$resultEventDateJan09 = mysqli_query($conn, $sqlEventDateJan09);
if (mysqli_num_rows($resultEventDateJan09) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJan09)) {
        $eventDateJan09 = $row["holiday_date"];
    }
} else {
    $eventDateJan09 = 0;
}
/**/
$sqlEventDateJan10 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 1 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 9,1";
$resultEventDateJan10 = mysqli_query($conn, $sqlEventDateJan10);
if (mysqli_num_rows($resultEventDateJan10) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJan10)) {
        $eventDateJan10 = $row["holiday_date"];
    }
} else {
    $eventDateJan10 = 0;
}
//holiday for January Connection End

//holiday for February Connection Start
$sqlEventDateFeb01 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 2 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1";
$resultEventDateFeb01 = mysqli_query($conn, $sqlEventDateFeb01);
if (mysqli_num_rows($resultEventDateFeb01) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateFeb01)) {
        $eventDateFeb01 = $row["holiday_date"];
    }
} else {
    $eventDateFeb01 = 0;
}
/**/
$sqlEventDateFeb02 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 2 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1,1";
$resultEventDateFeb02 = mysqli_query($conn, $sqlEventDateFeb02);
if (mysqli_num_rows($resultEventDateFeb02) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateFeb02)) {
        $eventDateFeb02 = $row["holiday_date"];
    }
} else {
    $eventDateFeb02 = 0;
}
/**/
$sqlEventDateFeb03 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 2 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 2,1";
$resultEventDateFeb03 = mysqli_query($conn, $sqlEventDateFeb03);
if (mysqli_num_rows($resultEventDateFeb03) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateFeb03)) {
        $eventDateFeb03 = $row["holiday_date"];
    }
} else {
    $eventDateFeb03 = 0;
}
/**/
$sqlEventDateFeb04 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 2 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 3,1";
$resultEventDateFeb04 = mysqli_query($conn, $sqlEventDateFeb04);
if (mysqli_num_rows($resultEventDateFeb04) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateFeb04)) {
        $eventDateFeb04 = $row["holiday_date"];
    }
} else {
    $eventDateFeb04 = 0;
}
/**/
$sqlEventDateFeb05 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 2 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 4,1";
$resultEventDateFeb05 = mysqli_query($conn, $sqlEventDateFeb05);
if (mysqli_num_rows($resultEventDateFeb05) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateFeb05)) {
        $eventDateFeb05 = $row["holiday_date"];
    }
} else {
    $eventDateFeb05 = 0;
}
/**/
$sqlEventDateFeb06 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 2 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 5,1";
$resultEventDateFeb06 = mysqli_query($conn, $sqlEventDateFeb06);
if (mysqli_num_rows($resultEventDateFeb06) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateFeb06)) {
        $eventDateFeb06 = $row["holiday_date"];
    }
} else {
    $eventDateFeb06 = 0;
}
/**/
$sqlEventDateFeb07 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 2 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 6,1";
$resultEventDateFeb07 = mysqli_query($conn, $sqlEventDateFeb07);
if (mysqli_num_rows($resultEventDateFeb07) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateFeb07)) {
        $eventDateFeb07 = $row["holiday_date"];
    }
} else {
    $eventDateFeb07 = 0;
}
/**/
$sqlEventDateFeb08 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 2 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 7,1";
$resultEventDateFeb08 = mysqli_query($conn, $sqlEventDateFeb08);
if (mysqli_num_rows($resultEventDateFeb08) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateFeb08)) {
        $eventDateFeb08 = $row["holiday_date"];
    }
} else {
    $eventDateFeb08 = 0;
}
/**/
$sqlEventDateFeb09 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 2 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 8,1";
$resultEventDateFeb09 = mysqli_query($conn, $sqlEventDateFeb09);
if (mysqli_num_rows($resultEventDateFeb09) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateFeb09)) {
        $eventDateFeb09 = $row["holiday_date"];
    }
} else {
    $eventDateFeb09 = 0;
}
/**/
$sqlEventDateFeb10 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 2 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 9,1";
$resultEventDateFeb10 = mysqli_query($conn, $sqlEventDateFeb10);
if (mysqli_num_rows($resultEventDateFeb10) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateFeb10)) {
        $eventDateFeb10 = $row["holiday_date"];
    }
} else {
    $eventDateFeb10 = 0;
}
//holiday for February Connection End

//holiday for March Connection Start
$sqlEventDateMar01 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 3 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1";
$resultEventDateMar01 = mysqli_query($conn, $sqlEventDateMar01);
if (mysqli_num_rows($resultEventDateMar01) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMar01)) {
        $eventDateMar01 = $row["holiday_date"];
    }
} else {
    $eventDateMar01 = 0;
}
/**/
$sqlEventDateMar02 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 3 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1,1";
$resultEventDateMar02 = mysqli_query($conn, $sqlEventDateMar02);
if (mysqli_num_rows($resultEventDateMar02) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMar02)) {
        $eventDateMar02 = $row["holiday_date"];
    }
} else {
    $eventDateMar02 = 0;
}
/**/
$sqlEventDateMar03 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 3 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 2,1";
$resultEventDateMar03 = mysqli_query($conn, $sqlEventDateMar03);
if (mysqli_num_rows($resultEventDateMar03) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMar03)) {
        $eventDateMar03 = $row["holiday_date"];
    }
} else {
    $eventDateMar03 = 0;
}
/**/
$sqlEventDateMar04 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 3 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 3,1";
$resultEventDateMar04 = mysqli_query($conn, $sqlEventDateMar04);
if (mysqli_num_rows($resultEventDateMar04) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMar04)) {
        $eventDateMar04 = $row["holiday_date"];
    }
} else {
    $eventDateMar04 = 0;
}
/**/
$sqlEventDateMar05 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 3 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 4,1";
$resultEventDateMar05 = mysqli_query($conn, $sqlEventDateMar05);
if (mysqli_num_rows($resultEventDateMar05) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMar05)) {
        $eventDateMar05 = $row["holiday_date"];
    }
} else {
    $eventDateMar05 = 0;
}
/**/
$sqlEventDateMar06 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 3 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 5,1";
$resultEventDateMar06 = mysqli_query($conn, $sqlEventDateMar06);
if (mysqli_num_rows($resultEventDateMar06) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMar06)) {
        $eventDateMar06 = $row["holiday_date"];
    }
} else {
    $eventDateMar06 = 0;
}
/**/
$sqlEventDateMar07 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 3 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 6,1";
$resultEventDateMar07 = mysqli_query($conn, $sqlEventDateMar07);
if (mysqli_num_rows($resultEventDateMar07) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMar07)) {
        $eventDateMar07 = $row["holiday_date"];
    }
} else {
    $eventDateMar07 = 0;
}
/**/
$sqlEventDateMar08 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 3 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 7,1";
$resultEventDateMar08 = mysqli_query($conn, $sqlEventDateMar08);
if (mysqli_num_rows($resultEventDateMar08) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMar08)) {
        $eventDateMar08 = $row["holiday_date"];
    }
} else {
    $eventDateMar08 = 0;
}
/**/
$sqlEventDateMar09 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 3 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 8,1";
$resultEventDateMar09 = mysqli_query($conn, $sqlEventDateMar09);
if (mysqli_num_rows($resultEventDateMar09) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMar09)) {
        $eventDateMar09 = $row["holiday_date"];
    }
} else {
    $eventDateMar09 = 0;
}
/**/
$sqlEventDateMar10 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 3 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 9,1";
$resultEventDateMar10 = mysqli_query($conn, $sqlEventDateMar10);
if (mysqli_num_rows($resultEventDateMar10) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMar10)) {
        $eventDateMar10 = $row["holiday_date"];
    }
} else {
    $eventDateMar10 = 0;
}
//holiday for March Connection End

//holiday for April Connection Start
$sqlEventDateApr01 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 4 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1";
$resultEventDateApr01 = mysqli_query($conn, $sqlEventDateApr01);
if (mysqli_num_rows($resultEventDateApr01) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateApr01)) {
        $eventDateApr01 = $row["holiday_date"];
    }
} else {
    $eventDateApr01 = 0;
}
/**/
$sqlEventDateApr02 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 4 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1,1";
$resultEventDateApr02 = mysqli_query($conn, $sqlEventDateApr02);
if (mysqli_num_rows($resultEventDateApr02) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateApr02)) {
        $eventDateApr02 = $row["holiday_date"];
    }
} else {
    $eventDateApr02 = 0;
}
/**/
$sqlEventDateApr03 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 4 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 2,1";
$resultEventDateApr03 = mysqli_query($conn, $sqlEventDateApr03);
if (mysqli_num_rows($resultEventDateApr03) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateApr03)) {
        $eventDateApr03 = $row["holiday_date"];
    }
} else {
    $eventDateApr03 = 0;
}
/**/
$sqlEventDateApr04 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 4 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 3,1";
$resultEventDateApr04 = mysqli_query($conn, $sqlEventDateApr04);
if (mysqli_num_rows($resultEventDateApr04) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateApr04)) {
        $eventDateApr04 = $row["holiday_date"];
    }
} else {
    $eventDateApr04 = 0;
}
/**/
$sqlEventDateApr05 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 4 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 4,1";
$resultEventDateApr05 = mysqli_query($conn, $sqlEventDateApr05);
if (mysqli_num_rows($resultEventDateApr05) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateApr05)) {
        $eventDateApr05 = $row["holiday_date"];
    }
} else {
    $eventDateApr05 = 0;
}
/**/
$sqlEventDateApr06 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 4 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 5,1";
$resultEventDateApr06 = mysqli_query($conn, $sqlEventDateApr06);
if (mysqli_num_rows($resultEventDateApr06) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateApr06)) {
        $eventDateApr06 = $row["holiday_date"];
    }
} else {
    $eventDateApr06 = 0;
}
/**/
$sqlEventDateApr07 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 4 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 6,1";
$resultEventDateApr07 = mysqli_query($conn, $sqlEventDateApr07);
if (mysqli_num_rows($resultEventDateApr07) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateApr07)) {
        $eventDateApr07 = $row["holiday_date"];
    }
} else {
    $eventDateApr07 = 0;
}
/**/
$sqlEventDateApr08 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 4 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 7,1";
$resultEventDateApr08 = mysqli_query($conn, $sqlEventDateApr08);
if (mysqli_num_rows($resultEventDateApr08) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateApr08)) {
        $eventDateApr08 = $row["holiday_date"];
    }
} else {
    $eventDateApr08 = 0;
}
/**/
$sqlEventDateApr09 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 4 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 8,1";
$resultEventDateApr09 = mysqli_query($conn, $sqlEventDateApr09);
if (mysqli_num_rows($resultEventDateApr09) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateApr09)) {
        $eventDateApr09 = $row["holiday_date"];
    }
} else {
    $eventDateApr09 = 0;
}
/**/
$sqlEventDateApr10 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 4 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 9,1";
$resultEventDateApr10 = mysqli_query($conn, $sqlEventDateApr10);
if (mysqli_num_rows($resultEventDateApr10) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateApr10)) {
        $eventDateApr10 = $row["holiday_date"];
    }
} else {
    $eventDateApr10 = 0;
}
//holiday for April Connection End

//holiday for May Connection Start
$sqlEventDateMay01 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 5 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1";
$resultEventDateMay01 = mysqli_query($conn, $sqlEventDateMay01);
if (mysqli_num_rows($resultEventDateMay01) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMay01)) {
        $eventDateMay01 = $row["holiday_date"];
    }
} else {
    $eventDateMay01 = 0;
}
/**/
$sqlEventDateMay02 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 5 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1,1";
$resultEventDateMay02 = mysqli_query($conn, $sqlEventDateMay02);
if (mysqli_num_rows($resultEventDateMay02) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMay02)) {
        $eventDateMay02 = $row["holiday_date"];
    }
} else {
    $eventDateMay02 = 0;
}
/**/
$sqlEventDateMay03 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 5 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 2,1";
$resultEventDateMay03 = mysqli_query($conn, $sqlEventDateMay03);
if (mysqli_num_rows($resultEventDateMay03) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMay03)) {
        $eventDateMay03 = $row["holiday_date"];
    }
} else {
    $eventDateMay03 = 0;
}
/**/
$sqlEventDateMay04 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 5 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 3,1";
$resultEventDateMay04 = mysqli_query($conn, $sqlEventDateMay04);
if (mysqli_num_rows($resultEventDateMay04) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMay04)) {
        $eventDateMay04 = $row["holiday_date"];
    }
} else {
    $eventDateMay04 = 0;
}
/**/
$sqlEventDateMay05 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 5 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 4,1";
$resultEventDateMay05 = mysqli_query($conn, $sqlEventDateMay05);
if (mysqli_num_rows($resultEventDateMay05) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMay05)) {
        $eventDateMay05 = $row["holiday_date"];
    }
} else {
    $eventDateMay05 = 0;
}
/**/
$sqlEventDateMay06 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 5 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 5,1";
$resultEventDateMay06 = mysqli_query($conn, $sqlEventDateMay06);
if (mysqli_num_rows($resultEventDateMay06) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMay06)) {
        $eventDateMay06 = $row["holiday_date"];
    }
} else {
    $eventDateMay06 = 0;
}
/**/
$sqlEventDateMay07 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 5 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 6,1";
$resultEventDateMay07 = mysqli_query($conn, $sqlEventDateMay07);
if (mysqli_num_rows($resultEventDateMay07) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMay07)) {
        $eventDateMay07 = $row["holiday_date"];
    }
} else {
    $eventDateMay07 = 0;
}
/**/
$sqlEventDateMay08 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 5 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 7,1";
$resultEventDateMay08 = mysqli_query($conn, $sqlEventDateMay08);
if (mysqli_num_rows($resultEventDateMay08) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMay08)) {
        $eventDateMay08 = $row["holiday_date"];
    }
} else {
    $eventDateMay08 = 0;
}
/**/
$sqlEventDateMay09 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 5 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 8,1";
$resultEventDateMay09 = mysqli_query($conn, $sqlEventDateMay09);
if (mysqli_num_rows($resultEventDateMay09) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMay09)) {
        $eventDateMay09 = $row["holiday_date"];
    }
} else {
    $eventDateMay09 = 0;
}
/**/
$sqlEventDateMay10 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 5 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 9,1";
$resultEventDateMay10 = mysqli_query($conn, $sqlEventDateMay10);
if (mysqli_num_rows($resultEventDateMay10) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateMay10)) {
        $eventDateMay10 = $row["holiday_date"];
    }
} else {
    $eventDateMay10 = 0;
}
//holiday for May Connection End

//holiday for June Connection Start
$sqlEventDateJun01 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 6 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1";
$resultEventDateJun01 = mysqli_query($conn, $sqlEventDateJun01);
if (mysqli_num_rows($resultEventDateJun01) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJun01)) {
        $eventDateJun01 = $row["holiday_date"];
    }
} else {
    $eventDateJun01 = 0;
}
/**/
$sqlEventDateJun02 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 6 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1,1";
$resultEventDateJun02 = mysqli_query($conn, $sqlEventDateJun02);
if (mysqli_num_rows($resultEventDateJun02) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJun02)) {
        $eventDateJun02 = $row["holiday_date"];
    }
} else {
    $eventDateJun02 = 0;
}
/**/
$sqlEventDateJun03 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 6 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 2,1";
$resultEventDateJun03 = mysqli_query($conn, $sqlEventDateJun03);
if (mysqli_num_rows($resultEventDateJun03) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJun03)) {
        $eventDateJun03 = $row["holiday_date"];
    }
} else {
    $eventDateJun03 = 0;
}
/**/
$sqlEventDateJun04 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 6 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 3,1";
$resultEventDateJun04 = mysqli_query($conn, $sqlEventDateJun04);
if (mysqli_num_rows($resultEventDateJun04) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJun04)) {
        $eventDateJun04 = $row["holiday_date"];
    }
} else {
    $eventDateJun04 = 0;
}
/**/
$sqlEventDateJun05 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 6 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 4,1";
$resultEventDateJun05 = mysqli_query($conn, $sqlEventDateJun05);
if (mysqli_num_rows($resultEventDateJun05) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJun05)) {
        $eventDateJun05 = $row["holiday_date"];
    }
} else {
    $eventDateJun05 = 0;
}
/**/
$sqlEventDateJun06 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 6 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 5,1";
$resultEventDateJun06 = mysqli_query($conn, $sqlEventDateJun06);
if (mysqli_num_rows($resultEventDateJun06) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJun06)) {
        $eventDateJun06 = $row["holiday_date"];
    }
} else {
    $eventDateJun06 = 0;
}
/**/
$sqlEventDateJun07 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 6 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 6,1";
$resultEventDateJun07 = mysqli_query($conn, $sqlEventDateJun07);
if (mysqli_num_rows($resultEventDateJun07) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJun07)) {
        $eventDateJun07 = $row["holiday_date"];
    }
} else {
    $eventDateJun07 = 0;
}
/**/
$sqlEventDateJun08 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 6 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 7,1";
$resultEventDateJun08 = mysqli_query($conn, $sqlEventDateJun08);
if (mysqli_num_rows($resultEventDateJun08) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJun08)) {
        $eventDateJun08 = $row["holiday_date"];
    }
} else {
    $eventDateJun08 = 0;
}
/**/
$sqlEventDateJun09 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 6 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 8,1";
$resultEventDateJun09 = mysqli_query($conn, $sqlEventDateJun09);
if (mysqli_num_rows($resultEventDateJun09) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJun09)) {
        $eventDateJun09 = $row["holiday_date"];
    }
} else {
    $eventDateJun09 = 0;
}
/**/
$sqlEventDateJun10 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 6 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 9,1";
$resultEventDateJun10 = mysqli_query($conn, $sqlEventDateJun10);
if (mysqli_num_rows($resultEventDateJun10) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJun10)) {
        $eventDateJun10 = $row["holiday_date"];
    }
} else {
    $eventDateJun10 = 0;
}
//holiday for June Connection End

//holiday for July Connection Start
$sqlEventDateJul01 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 7 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1";
$resultEventDateJul01 = mysqli_query($conn, $sqlEventDateJul01);
if (mysqli_num_rows($resultEventDateJul01) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJul01)) {
        $eventDateJul01 = $row["holiday_date"];
    }
} else {
    $eventDateJul01 = 0;
}
/**/
$sqlEventDateJul02 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 7 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1,1";
$resultEventDateJul02 = mysqli_query($conn, $sqlEventDateJul02);
if (mysqli_num_rows($resultEventDateJul02) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJul02)) {
        $eventDateJul02 = $row["holiday_date"];
    }
} else {
    $eventDateJul02 = 0;
}
/**/
$sqlEventDateJul03 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 7 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 2,1";
$resultEventDateJul03 = mysqli_query($conn, $sqlEventDateJul03);
if (mysqli_num_rows($resultEventDateJul03) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJul03)) {
        $eventDateJul03 = $row["holiday_date"];
    }
} else {
    $eventDateJul03 = 0;
}
/**/
$sqlEventDateJul04 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 7 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 3,1";
$resultEventDateJul04 = mysqli_query($conn, $sqlEventDateJul04);
if (mysqli_num_rows($resultEventDateJul04) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJul04)) {
        $eventDateJul04 = $row["holiday_date"];
    }
} else {
    $eventDateJul04 = 0;
}
/**/
$sqlEventDateJul05 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 7 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 4,1";
$resultEventDateJul05 = mysqli_query($conn, $sqlEventDateJul05);
if (mysqli_num_rows($resultEventDateJul05) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJul05)) {
        $eventDateJul05 = $row["holiday_date"];
    }
} else {
    $eventDateJul05 = 0;
}
/**/
$sqlEventDateJul06 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 7 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 5,1";
$resultEventDateJul06 = mysqli_query($conn, $sqlEventDateJul06);
if (mysqli_num_rows($resultEventDateJul06) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJul06)) {
        $eventDateJul06 = $row["holiday_date"];
    }
} else {
    $eventDateJul06 = 0;
}
/**/
$sqlEventDateJul07 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 7 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 6,1";
$resultEventDateJul07 = mysqli_query($conn, $sqlEventDateJul07);
if (mysqli_num_rows($resultEventDateJul07) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJul07)) {
        $eventDateJul07 = $row["holiday_date"];
    }
} else {
    $eventDateJul07 = 0;
}
/**/
$sqlEventDateJul08 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 7 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 7,1";
$resultEventDateJul08 = mysqli_query($conn, $sqlEventDateJul08);
if (mysqli_num_rows($resultEventDateJul08) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJul08)) {
        $eventDateJul08 = $row["holiday_date"];
    }
} else {
    $eventDateJul08 = 0;
}
/**/
$sqlEventDateJul09 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 7 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 8,1";
$resultEventDateJul09 = mysqli_query($conn, $sqlEventDateJul09);
if (mysqli_num_rows($resultEventDateJul09) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJul09)) {
        $eventDateJul09 = $row["holiday_date"];
    }
} else {
    $eventDateJul09 = 0;
}
/**/
$sqlEventDateJul10 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 7 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 9,1";
$resultEventDateJul10 = mysqli_query($conn, $sqlEventDateJul10);
if (mysqli_num_rows($resultEventDateJul10) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateJul10)) {
        $eventDateJul10 = $row["holiday_date"];
    }
} else {
    $eventDateJul10 = 0;
}
//holiday for July Connection End

//holiday for August Connection Start
$sqlEventDateAug01 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 8 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1";
$resultEventDateAug01 = mysqli_query($conn, $sqlEventDateAug01);
if (mysqli_num_rows($resultEventDateAug01) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateAug01)) {
        $eventDateAug01 = $row["holiday_date"];
    }
} else {
    $eventDateAug01 = 0;
}
/**/
$sqlEventDateAug02 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 8 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1,1";
$resultEventDateAug02 = mysqli_query($conn, $sqlEventDateAug02);
if (mysqli_num_rows($resultEventDateAug02) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateAug02)) {
        $eventDateAug02 = $row["holiday_date"];
    }
} else {
    $eventDateAug02 = 0;
}
/**/
$sqlEventDateAug03 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 8 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 2,1";
$resultEventDateAug03 = mysqli_query($conn, $sqlEventDateAug03);
if (mysqli_num_rows($resultEventDateAug03) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateAug03)) {
        $eventDateAug03 = $row["holiday_date"];
    }
} else {
    $eventDateAug03 = 0;
}
/**/
$sqlEventDateAug04 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 8 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 3,1";
$resultEventDateAug04 = mysqli_query($conn, $sqlEventDateAug04);
if (mysqli_num_rows($resultEventDateAug04) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateAug04)) {
        $eventDateAug04 = $row["holiday_date"];
    }
} else {
    $eventDateAug04 = 0;
}
/**/
$sqlEventDateAug05 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 8 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 4,1";
$resultEventDateAug05 = mysqli_query($conn, $sqlEventDateAug05);
if (mysqli_num_rows($resultEventDateAug05) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateAug05)) {
        $eventDateAug05 = $row["holiday_date"];
    }
} else {
    $eventDateAug05 = 0;
}
/**/
$sqlEventDateAug06 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 8 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 5,1";
$resultEventDateAug06 = mysqli_query($conn, $sqlEventDateAug06);
if (mysqli_num_rows($resultEventDateAug06) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateAug06)) {
        $eventDateAug06 = $row["holiday_date"];
    }
} else {
    $eventDateAug06 = 0;
}
/**/
$sqlEventDateAug07 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 8 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 6,1";
$resultEventDateAug07 = mysqli_query($conn, $sqlEventDateAug07);
if (mysqli_num_rows($resultEventDateAug07) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateAug07)) {
        $eventDateAug07 = $row["holiday_date"];
    }
} else {
    $eventDateAug07 = 0;
}
/**/
$sqlEventDateAug08 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 8 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 7,1";
$resultEventDateAug08 = mysqli_query($conn, $sqlEventDateAug08);
if (mysqli_num_rows($resultEventDateAug08) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateAug08)) {
        $eventDateAug08 = $row["holiday_date"];
    }
} else {
    $eventDateAug08 = 0;
}
/**/
$sqlEventDateAug09 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 8 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 8,1";
$resultEventDateAug09 = mysqli_query($conn, $sqlEventDateAug09);
if (mysqli_num_rows($resultEventDateAug09) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateAug09)) {
        $eventDateAug09 = $row["holiday_date"];
    }
} else {
    $eventDateAug09 = 0;
}
/**/
$sqlEventDateAug10 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 8 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 9,1";
$resultEventDateAug10 = mysqli_query($conn, $sqlEventDateAug10);
if (mysqli_num_rows($resultEventDateAug10) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateAug10)) {
        $eventDateAug10 = $row["holiday_date"];
    }
} else {
    $eventDateAug10 = 0;
}
//holiday for August Connection End

//holiday for September Connection Start
$sqlEventDateSep01 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 9 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1";
$resultEventDateSep01 = mysqli_query($conn, $sqlEventDateSep01);
if (mysqli_num_rows($resultEventDateSep01) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateSep01)) {
        $eventDateSep01 = $row["holiday_date"];
    }
} else {
    $eventDateSep01 = 0;
}
/**/
$sqlEventDateSep02 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 9 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1,1";
$resultEventDateSep02 = mysqli_query($conn, $sqlEventDateSep02);
if (mysqli_num_rows($resultEventDateSep02) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateSep02)) {
        $eventDateSep02 = $row["holiday_date"];
    }
} else {
    $eventDateSep02 = 0;
}
/**/
$sqlEventDateSep03 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 9 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 2,1";
$resultEventDateSep03 = mysqli_query($conn, $sqlEventDateSep03);
if (mysqli_num_rows($resultEventDateSep03) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateSep03)) {
        $eventDateSep03 = $row["holiday_date"];
    }
} else {
    $eventDateSep03 = 0;
}
/**/
$sqlEventDateSep04 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 9 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 3,1";
$resultEventDateSep04 = mysqli_query($conn, $sqlEventDateSep04);
if (mysqli_num_rows($resultEventDateSep04) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateSep04)) {
        $eventDateSep04 = $row["holiday_date"];
    }
} else {
    $eventDateSep04 = 0;
}
/**/
$sqlEventDateSep05 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 9 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 4,1";
$resultEventDateSep05 = mysqli_query($conn, $sqlEventDateSep05);
if (mysqli_num_rows($resultEventDateSep05) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateSep05)) {
        $eventDateSep05 = $row["holiday_date"];
    }
} else {
    $eventDateSep05 = 0;
}
/**/
$sqlEventDateSep06 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 9 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 5,1";
$resultEventDateSep06 = mysqli_query($conn, $sqlEventDateSep06);
if (mysqli_num_rows($resultEventDateSep06) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateSep06)) {
        $eventDateSep06 = $row["holiday_date"];
    }
} else {
    $eventDateSep06 = 0;
}
/**/
$sqlEventDateSep07 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 9 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 6,1";
$resultEventDateSep07 = mysqli_query($conn, $sqlEventDateSep07);
if (mysqli_num_rows($resultEventDateSep07) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateSep07)) {
        $eventDateSep07 = $row["holiday_date"];
    }
} else {
    $eventDateSep07 = 0;
}
/**/
$sqlEventDateSep08 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 9 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 7,1";
$resultEventDateSep08 = mysqli_query($conn, $sqlEventDateSep08);
if (mysqli_num_rows($resultEventDateSep08) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateSep08)) {
        $eventDateSep08 = $row["holiday_date"];
    }
} else {
    $eventDateSep08 = 0;
}
/**/
$sqlEventDateSep09 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 9 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 8,1";
$resultEventDateSep09 = mysqli_query($conn, $sqlEventDateSep09);
if (mysqli_num_rows($resultEventDateSep09) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateSep09)) {
        $eventDateSep09 = $row["holiday_date"];
    }
} else {
    $eventDateSep09 = 0;
}
/**/
$sqlEventDateSep10 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 9 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 9,1";
$resultEventDateSep10 = mysqli_query($conn, $sqlEventDateSep10);
if (mysqli_num_rows($resultEventDateSep10) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateSep10)) {
        $eventDateSep10 = $row["holiday_date"];
    }
} else {
    $eventDateSep10 = 0;
}
//holiday for September Connection End

//holiday for October Connection Start
$sqlEventDateOct01 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 10 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1";
$resultEventDateOct01 = mysqli_query($conn, $sqlEventDateOct01);
if (mysqli_num_rows($resultEventDateOct01) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateOct01)) {
        $eventDateOct01 = $row["holiday_date"];
    }
} else {
    $eventDateOct01 = 0;
}
/**/
$sqlEventDateOct02 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 10 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1,1";
$resultEventDateOct02 = mysqli_query($conn, $sqlEventDateOct02);
if (mysqli_num_rows($resultEventDateOct02) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateOct02)) {
        $eventDateOct02 = $row["holiday_date"];
    }
} else {
    $eventDateOct02 = 0;
}
/**/
$sqlEventDateOct03 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 10 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 2,1";
$resultEventDateOct03 = mysqli_query($conn, $sqlEventDateOct03);
if (mysqli_num_rows($resultEventDateOct03) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateOct03)) {
        $eventDateOct03 = $row["holiday_date"];
    }
} else {
    $eventDateOct03 = 0;
}
/**/
$sqlEventDateOct04 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 10 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 3,1";
$resultEventDateOct04 = mysqli_query($conn, $sqlEventDateOct04);
if (mysqli_num_rows($resultEventDateOct04) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateOct04)) {
        $eventDateOct04 = $row["holiday_date"];
    }
} else {
    $eventDateOct04 = 0;
}
/**/
$sqlEventDateOct05 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 10 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 4,1";
$resultEventDateOct05 = mysqli_query($conn, $sqlEventDateOct05);
if (mysqli_num_rows($resultEventDateOct05) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateOct05)) {
        $eventDateOct05 = $row["holiday_date"];
    }
} else {
    $eventDateOct05 = 0;
}
/**/
$sqlEventDateOct06 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 10 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 5,1";
$resultEventDateOct06 = mysqli_query($conn, $sqlEventDateOct06);
if (mysqli_num_rows($resultEventDateOct06) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateOct06)) {
        $eventDateOct06 = $row["holiday_date"];
    }
} else {
    $eventDateOct06 = 0;
}
/**/
$sqlEventDateOct07 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 10 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 6,1";
$resultEventDateOct07 = mysqli_query($conn, $sqlEventDateOct07);
if (mysqli_num_rows($resultEventDateOct07) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateOct07)) {
        $eventDateOct07 = $row["holiday_date"];
    }
} else {
    $eventDateOct07 = 0;
}
/**/
$sqlEventDateOct08 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 10 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 7,1";
$resultEventDateOct08 = mysqli_query($conn, $sqlEventDateOct08);
if (mysqli_num_rows($resultEventDateOct08) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateOct08)) {
        $eventDateOct08 = $row["holiday_date"];
    }
} else {
    $eventDateOct08 = 0;
}
/**/
$sqlEventDateOct09 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 10 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 8,1";
$resultEventDateOct09 = mysqli_query($conn, $sqlEventDateOct09);
if (mysqli_num_rows($resultEventDateOct09) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateOct09)) {
        $eventDateOct09 = $row["holiday_date"];
    }
} else {
    $eventDateOct09 = 0;
}
/**/
$sqlEventDateOct10 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 10 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 9,1";
$resultEventDateOct10 = mysqli_query($conn, $sqlEventDateOct10);
if (mysqli_num_rows($resultEventDateOct10) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateOct10)) {
        $eventDateOct10 = $row["holiday_date"];
    }
} else {
    $eventDateOct10 = 0;
}
//holiday for October Connection End

//holiday for November Connection Start
$sqlEventDateNov01 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 11 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1";
$resultEventDateNov01 = mysqli_query($conn, $sqlEventDateNov01);
if (mysqli_num_rows($resultEventDateNov01) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateNov01)) {
        $eventDateNov01 = $row["holiday_date"];
    }
} else {
    $eventDateNov01 = 0;
}
/**/
$sqlEventDateNov02 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 11 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1,1";
$resultEventDateNov02 = mysqli_query($conn, $sqlEventDateNov02);
if (mysqli_num_rows($resultEventDateNov02) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateNov02)) {
        $eventDateNov02 = $row["holiday_date"];
    }
} else {
    $eventDateNov02 = 0;
}
/**/
$sqlEventDateNov03 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 11 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 2,1";
$resultEventDateNov03 = mysqli_query($conn, $sqlEventDateNov03);
if (mysqli_num_rows($resultEventDateNov03) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateNov03)) {
        $eventDateNov03 = $row["holiday_date"];
    }
} else {
    $eventDateNov03 = 0;
}
/**/
$sqlEventDateNov04 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 11 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 3,1";
$resultEventDateNov04 = mysqli_query($conn, $sqlEventDateNov04);
if (mysqli_num_rows($resultEventDateNov04) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateNov04)) {
        $eventDateNov04 = $row["holiday_date"];
    }
} else {
    $eventDateNov04 = 0;
}
/**/
$sqlEventDateNov05 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 11 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 4,1";
$resultEventDateNov05 = mysqli_query($conn, $sqlEventDateNov05);
if (mysqli_num_rows($resultEventDateNov05) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateNov05)) {
        $eventDateNov05 = $row["holiday_date"];
    }
} else {
    $eventDateNov05 = 0;
}
/**/
$sqlEventDateNov06 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 11 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 5,1";
$resultEventDateNov06 = mysqli_query($conn, $sqlEventDateNov06);
if (mysqli_num_rows($resultEventDateNov06) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateNov06)) {
        $eventDateNov06 = $row["holiday_date"];
    }
} else {
    $eventDateNov06 = 0;
}
/**/
$sqlEventDateNov07 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 11 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 6,1";
$resultEventDateNov07 = mysqli_query($conn, $sqlEventDateNov07);
if (mysqli_num_rows($resultEventDateNov07) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateNov07)) {
        $eventDateNov07 = $row["holiday_date"];
    }
} else {
    $eventDateNov07 = 0;
}
/**/
$sqlEventDateNov08 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 11 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 7,1";
$resultEventDateNov08 = mysqli_query($conn, $sqlEventDateNov08);
if (mysqli_num_rows($resultEventDateNov08) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateNov08)) {
        $eventDateNov08 = $row["holiday_date"];
    }
} else {
    $eventDateNov08 = 0;
}
/**/
$sqlEventDateNov09 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 11 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 8,1";
$resultEventDateNov09 = mysqli_query($conn, $sqlEventDateNov09);
if (mysqli_num_rows($resultEventDateNov09) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateNov09)) {
        $eventDateNov09 = $row["holiday_date"];
    }
} else {
    $eventDateNov09 = 0;
}
/**/
$sqlEventDateNov10 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 11 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 9,1";
$resultEventDateNov10 = mysqli_query($conn, $sqlEventDateNov10);
if (mysqli_num_rows($resultEventDateNov10) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateNov10)) {
        $eventDateNov10 = $row["holiday_date"];
    }
} else {
    $eventDateNov10 = 0;
}
//holiday for November Connection End

//holiday for December Connection Start
$sqlEventDateDec01 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 12 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1";
$resultEventDateDec01 = mysqli_query($conn, $sqlEventDateDec01);
if (mysqli_num_rows($resultEventDateDec01) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateDec01)) {
        $eventDateDec01 = $row["holiday_date"];
    }
} else {
    $eventDateDec01 = 0;
}
/**/
$sqlEventDateDec02 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 12 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 1,1";
$resultEventDateDec02 = mysqli_query($conn, $sqlEventDateDec02);
if (mysqli_num_rows($resultEventDateDec02) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateDec02)) {
        $eventDateDec02 = $row["holiday_date"];
    }
} else {
    $eventDateDec02 = 0;
}
/**/
$sqlEventDateDec03 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 12 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 2,1";
$resultEventDateDec03 = mysqli_query($conn, $sqlEventDateDec03);
if (mysqli_num_rows($resultEventDateDec03) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateDec03)) {
        $eventDateDec03 = $row["holiday_date"];
    }
} else {
    $eventDateDec03 = 0;
}
/**/
$sqlEventDateDec04 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 12 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 3,1";
$resultEventDateDec04 = mysqli_query($conn, $sqlEventDateDec04);
if (mysqli_num_rows($resultEventDateDec04) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateDec04)) {
        $eventDateDec04 = $row["holiday_date"];
    }
} else {
    $eventDateDec04 = 0;
}
/**/
$sqlEventDateDec05 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 12 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 4,1";
$resultEventDateDec05 = mysqli_query($conn, $sqlEventDateDec05);
if (mysqli_num_rows($resultEventDateDec05) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateDec05)) {
        $eventDateDec05 = $row["holiday_date"];
    }
} else {
    $eventDateDec05 = 0;
}
/**/
$sqlEventDateDec06 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 12 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 5,1";
$resultEventDateDec06 = mysqli_query($conn, $sqlEventDateDec06);
if (mysqli_num_rows($resultEventDateDec06) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateDec06)) {
        $eventDateDec06 = $row["holiday_date"];
    }
} else {
    $eventDateDec06 = 0;
}
/**/
$sqlEventDateDec07 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 12 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 6,1";
$resultEventDateDec07 = mysqli_query($conn, $sqlEventDateDec07);
if (mysqli_num_rows($resultEventDateDec07) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateDec07)) {
        $eventDateDec07 = $row["holiday_date"];
    }
} else {
    $eventDateDec07 = 0;
}
/**/
$sqlEventDateDec08 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 12 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 7,1";
$resultEventDateDec08 = mysqli_query($conn, $sqlEventDateDec08);
if (mysqli_num_rows($resultEventDateDec08) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateDec08)) {
        $eventDateDec08 = $row["holiday_date"];
    }
} else {
    $eventDateDec08 = 0;
}
/**/
$sqlEventDateDec09 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 12 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 8,1";
$resultEventDateDec09 = mysqli_query($conn, $sqlEventDateDec09);
if (mysqli_num_rows($resultEventDateDec09) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateDec09)) {
        $eventDateDec09 = $row["holiday_date"];
    }
} else {
    $eventDateDec09 = 0;
}
/**/
$sqlEventDateDec10 = "SELECT holiday_date FROM holiday_final WHERE holiday_month = 12 AND holiday_year = $epi_year ORDER BY holiday_date LIMIT 9,1";
$resultEventDateDec10 = mysqli_query($conn, $sqlEventDateDec10);
if (mysqli_num_rows($resultEventDateDec10) != null) {
    while($row = mysqli_fetch_assoc($resultEventDateDec10)) {
        $eventDateDec10 = $row["holiday_date"];
    }
} else {
    $eventDateDec10 = 0;
}
//holiday for December Connection End

if(isset($_POST["click_here"]))
{
    $sqlFinal_SW="TRUNCATE TABLE sw_schedule";
    $result_sqlFinal_SW = mysqli_query($conn, $sqlFinal_SW);
    
    $sql="INSERT INTO sw_schedule (sw_jan, sw_feb, sw_mar, sw_apr, sw_may, sw_jun, sw_jul, sw_aug, sw_sep, sw_oct, sw_nov, sw_dec, ward_id, epi_year, schedule_id) SELECT sw_jan, sw_feb, sw_mar, sw_apr, sw_may, sw_jun, sw_jul, sw_aug, sw_sep, sw_oct, sw_nov, sw_dec, ward_id, epi_year, schedule_id FROM sw_schedule_w1 UNION SELECT sw_jan, sw_feb, sw_mar, sw_apr, sw_may, sw_jun, sw_jul, sw_aug, sw_sep, sw_oct, sw_nov, sw_dec, ward_id, epi_year, schedule_id FROM sw_schedule_w2 UNION SELECT sw_jan, sw_feb, sw_mar, sw_apr, sw_may, sw_jun, sw_jul, sw_aug, sw_sep, sw_oct, sw_nov, sw_dec, ward_id, epi_year, schedule_id FROM sw_schedule_w3";
    $result = mysqli_query($conn, $sql);
?>
<script type="text/javascript">
    window.location = "../schedule_info/sw_table_index.php";
</script> 
<?php
}

$conn->close();
?>