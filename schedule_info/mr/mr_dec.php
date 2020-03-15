<?php
require_once ("db_connection.php");
include_once ("mr_data_fetch.php");

//dbFile
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "central_db";

$conn = new mysqli($servername, $username, $password, $dbname);

//value fetch from DB
//$eventDateDec01 = 0;
//$eventDateDec02 = 0;
//$eventDateDec03 = 0;
//$eventDateDec04 = 0;
//$eventDateDec05 = 0;
//$eventDateDec06 = 0;
//$eventDateDec07 = 0;
//$eventDateDec08 = 0;
//$eventDateDec09 = 0;
//$eventDateDec10 = 0;

//value fetch from DB
/*$dayOne = "Monday";
$dayTwo = "Thursday";*/
$dayFriday = "Friday";

//value fetch from DB
$month = 12;

//value fetch from DB
/*$epi_year = 2018;*/

//value fetch from DB
$eventmonth = 12;

$number_of_dates = 4;

$startDate = mktime(0, 0, 0, $month, 1, $epi_year);
//ward 1
for ($i = 0; $i < $number_of_dates; $i++)
{
    $week1 = ($i*2)+1;
    $week2 = ($i*2)+2;

    $dateR = strtotime($dayOne . ($i * 1) . ' weeks', $startDate);
    $dateW = strtotime($dayFriday . ($i * 1) . ' weeks', $startDate);

    $month = date('m', $dateR).PHP_EOL;

    $dateHoliday = date('d', $dateR).PHP_EOL;
    $dateRegularday = date('d', $dateR).PHP_EOL;
    $dateFriday = date('d', $dateW).PHP_EOL;

    $intmonth = intval($month);

    $intDateHoliday = intval($dateHoliday);
    $intDateRegularDay = intval($dateRegularday);
    $intDateFriday = intval($dateFriday);

    if($eventmonth == $intmonth && ($eventDateDec01 == $intDateHoliday || $eventDateDec02 == $intDateHoliday || $eventDateDec03 == $intDateHoliday || $eventDateDec04 == $intDateHoliday || $eventDateDec05 == $intDateHoliday || $eventDateDec06 == $intDateHoliday || $eventDateDec07 == $intDateHoliday || $eventDateDec08 == $intDateHoliday || $eventDateDec09 == $intDateHoliday || $eventDateDec10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateDec01 || $incrementDayOne == $eventDateDec02 || $incrementDayOne == $eventDateDec03 || $incrementDayOne == $eventDateDec04 || $incrementDayOne == $eventDateDec05 || $incrementDayOne == $eventDateDec06 || $incrementDayOne == $eventDateDec07 || $incrementDayOne == $eventDateDec08 || $incrementDayOne == $eventDateDec09 || $incrementDayOne == $eventDateDec10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateDec01 || $decrementDayTwo == $eventDateDec02 || $decrementDayTwo == $eventDateDec03 || $decrementDayTwo == $eventDateDec04 || $decrementDayTwo == $eventDateDec05 || $decrementDayTwo == $eventDateDec06 || $decrementDayTwo == $eventDateDec07 || $decrementDayTwo == $eventDateDec08 || $decrementDayTwo == $eventDateDec09 || $decrementDayTwo == $eventDateDec10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_dec=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_dec=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_dec=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateDec01 || $decrementDayTwo == $eventDateDec02 || $decrementDayTwo == $eventDateDec03 || $decrementDayTwo == $eventDateDec04 || $decrementDayTwo == $eventDateDec05 || $decrementDayTwo == $eventDateDec06 || $decrementDayTwo == $eventDateDec07 || $decrementDayTwo == $eventDateDec08 || $decrementDayTwo == $eventDateDec09 || $decrementDayTwo == $eventDateDec10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_dec=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }

            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_dec=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_dec=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE mr_schedule_w1 SET mr_dec=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE mr_schedule_w1 SET mr_dec=$intDateRegularDay, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week1";
        $result = mysqli_query($conn, $sql);
    }

    /*--------------------------*/
    $dateR = strtotime($dayTwo . ($i * 1) . ' weeks', $startDate);
    $dateW = strtotime($dayFriday . ($i * 1) . ' weeks', $startDate);

    $month = date('m', $dateR).PHP_EOL;

    $dateHoliday = date('d', $dateR).PHP_EOL;
    $dateRegularday = date('d', $dateR).PHP_EOL;
    $dateFriday = date('d', $dateW).PHP_EOL;

    $intmonth = intval($month);

    $intDateHoliday = intval($dateHoliday);
    $intDateRegularDay = intval($dateRegularday);
    $intDateFriday = intval($dateFriday);

    if($eventmonth == $intmonth && ($eventDateDec01 == $intDateHoliday || $eventDateDec02 == $intDateHoliday || $eventDateDec03 == $intDateHoliday || $eventDateDec04 == $intDateHoliday || $eventDateDec05 == $intDateHoliday || $eventDateDec06 == $intDateHoliday || $eventDateDec07 == $intDateHoliday || $eventDateDec08 == $intDateHoliday || $eventDateDec09 == $intDateHoliday || $eventDateDec10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateDec01 || $incrementDayOne == $eventDateDec02 || $incrementDayOne == $eventDateDec03 || $incrementDayOne == $eventDateDec04 || $incrementDayOne == $eventDateDec05 || $incrementDayOne == $eventDateDec06 || $incrementDayOne == $eventDateDec07 || $incrementDayOne == $eventDateDec08 || $incrementDayOne == $eventDateDec09 || $incrementDayOne == $eventDateDec10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateDec01 || $decrementDayTwo == $eventDateDec02 || $decrementDayTwo == $eventDateDec03 || $decrementDayTwo == $eventDateDec04 || $decrementDayTwo == $eventDateDec05 || $decrementDayTwo == $eventDateDec06 || $decrementDayTwo == $eventDateDec07 || $decrementDayTwo == $eventDateDec08 || $decrementDayTwo == $eventDateDec09 || $decrementDayTwo == $eventDateDec10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_dec=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_dec=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_dec=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateDec01 || $decrementDayTwo == $eventDateDec02 || $decrementDayTwo == $eventDateDec03 || $decrementDayTwo == $eventDateDec04 || $decrementDayTwo == $eventDateDec05 || $decrementDayTwo == $eventDateDec06 || $decrementDayTwo == $eventDateDec07 || $decrementDayTwo == $eventDateDec08 || $decrementDayTwo == $eventDateDec09 || $decrementDayTwo == $eventDateDec10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_dec=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_dec=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_dec=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateDec01 || $decrementDayTwo == $eventDateDec02 || $decrementDayTwo == $eventDateDec03 || $decrementDayTwo == $eventDateDec04 || $decrementDayTwo == $eventDateDec05 || $decrementDayTwo == $eventDateDec06 || $decrementDayTwo == $eventDateDec07 || $decrementDayTwo == $eventDateDec08 || $decrementDayTwo == $eventDateDec09 || $decrementDayTwo == $eventDateDec10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_dec=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_dec=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_dec=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE mr_schedule_w1 SET mr_dec=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE mr_schedule_w1 SET mr_dec=$intDateRegularDay, epi_year=$epi_year WHERE mr_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_1 SQL START-----//
    $nullSQL = "UPDATE mr_schedule_w1 SET mr_dec=NULL, epi_year=$epi_year WHERE mr_dateID=9";
    $result = mysqli_query($conn, $nullSQL);
    //-----NULL Ward_1 SQL END-----//
}

//ward 2
//echo "<br>";
for ($i = 0; $i < $number_of_dates; $i++)
{
    $week1 = ($i*2)+1;
    $week2 = ($i*2)+2;

    $dateR = strtotime($dayOne . ($i * 1) . ' weeks', $startDate);
    $dateW = strtotime($dayFriday . ($i * 1) . ' weeks', $startDate);

    $month = date('m', $dateR).PHP_EOL;

    $dateHoliday = date('d', $dateR).PHP_EOL;
    $dateRegularday = date('d', $dateR).PHP_EOL;
    $dateFriday = date('d', $dateW).PHP_EOL;

    $intmonth = intval($month);

    $intDateHoliday = intval($dateHoliday);
    $intDateRegularDay = intval($dateRegularday);
    $intDateFriday = intval($dateFriday);

    if($eventmonth == $intmonth && ($eventDateDec01 == $intDateHoliday || $eventDateDec02 == $intDateHoliday || $eventDateDec03 == $intDateHoliday || $eventDateDec04 == $intDateHoliday || $eventDateDec05 == $intDateHoliday || $eventDateDec06 == $intDateHoliday || $eventDateDec07 == $intDateHoliday || $eventDateDec08 == $intDateHoliday || $eventDateDec09 == $intDateHoliday || $eventDateDec10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateDec01 || $incrementDayOne == $eventDateDec02 || $incrementDayOne == $eventDateDec03 || $incrementDayOne == $eventDateDec04 || $incrementDayOne == $eventDateDec05 || $incrementDayOne == $eventDateDec06 || $incrementDayOne == $eventDateDec07 || $incrementDayOne == $eventDateDec08 || $incrementDayOne == $eventDateDec09 || $incrementDayOne == $eventDateDec10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateDec01 || $decrementDayTwo == $eventDateDec02 || $decrementDayTwo == $eventDateDec03 || $decrementDayTwo == $eventDateDec04 || $decrementDayTwo == $eventDateDec05 || $decrementDayTwo == $eventDateDec06 || $decrementDayTwo == $eventDateDec07 || $decrementDayTwo == $eventDateDec08 || $decrementDayTwo == $eventDateDec09 || $decrementDayTwo == $eventDateDec10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_dec=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateDec01 || $decrementDayTwo == $eventDateDec02 || $decrementDayTwo == $eventDateDec03 || $decrementDayTwo == $eventDateDec04 || $decrementDayTwo == $eventDateDec05 || $decrementDayTwo == $eventDateDec06 || $decrementDayTwo == $eventDateDec07 || $decrementDayTwo == $eventDateDec08 || $decrementDayTwo == $eventDateDec09 || $decrementDayTwo == $eventDateDec10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_dec=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE mr_schedule_w2 SET mr_dec=$incrementDayOne, epi_year=$epi_year WHERE mr_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE mr_schedule_w2 SET mr_dec=$intDateRegularDay, epi_year=$epi_year WHERE mr_dateID=$week1";
        $result = mysqli_query($conn, $sql);
    }

    /*--------------------------*/
    $dateR = strtotime($dayTwo . ($i * 1) . ' weeks', $startDate);
    $dateW = strtotime($dayFriday . ($i * 1) . ' weeks', $startDate);

    $month = date('m', $dateR).PHP_EOL;

    $dateHoliday = date('d', $dateR).PHP_EOL;
    $dateRegularday = date('d', $dateR).PHP_EOL;
    $dateFriday = date('d', $dateW).PHP_EOL;

    $intmonth = intval($month);

    $intDateHoliday = intval($dateHoliday);
    $intDateRegularDay = intval($dateRegularday);
    $intDateFriday = intval($dateFriday);

    if($eventmonth == $intmonth && ($eventDateDec01 == $intDateHoliday || $eventDateDec02 == $intDateHoliday || $eventDateDec03 == $intDateHoliday || $eventDateDec04 == $intDateHoliday || $eventDateDec05 == $intDateHoliday || $eventDateDec06 == $intDateHoliday || $eventDateDec07 == $intDateHoliday || $eventDateDec08 == $intDateHoliday || $eventDateDec09 == $intDateHoliday || $eventDateDec10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateDec01 || $incrementDayOne == $eventDateDec02 || $incrementDayOne == $eventDateDec03 || $incrementDayOne == $eventDateDec04 || $incrementDayOne == $eventDateDec05 || $incrementDayOne == $eventDateDec06 || $incrementDayOne == $eventDateDec07 || $incrementDayOne == $eventDateDec08 || $incrementDayOne == $eventDateDec09 || $incrementDayOne == $eventDateDec10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateDec01 || $decrementDayTwo == $eventDateDec02 || $decrementDayTwo == $eventDateDec03 || $decrementDayTwo == $eventDateDec04 || $decrementDayTwo == $eventDateDec05 || $decrementDayTwo == $eventDateDec06 || $decrementDayTwo == $eventDateDec07 || $decrementDayTwo == $eventDateDec08 || $decrementDayTwo == $eventDateDec09 || $decrementDayTwo == $eventDateDec10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_dec=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateDec01 || $decrementDayTwo == $eventDateDec02 || $decrementDayTwo == $eventDateDec03 || $decrementDayTwo == $eventDateDec04 || $decrementDayTwo == $eventDateDec05 || $decrementDayTwo == $eventDateDec06 || $decrementDayTwo == $eventDateDec07 || $decrementDayTwo == $eventDateDec08 || $decrementDayTwo == $eventDateDec09 || $decrementDayTwo == $eventDateDec10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_dec=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateDec01 || $decrementDayTwo == $eventDateDec02 || $decrementDayTwo == $eventDateDec03 || $decrementDayTwo == $eventDateDec04 || $decrementDayTwo == $eventDateDec05 || $decrementDayTwo == $eventDateDec06 || $decrementDayTwo == $eventDateDec07 || $decrementDayTwo == $eventDateDec08 || $decrementDayTwo == $eventDateDec09 || $decrementDayTwo == $eventDateDec10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_dec=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE mr_schedule_w2 SET mr_dec=$incrementDayOne, epi_year=$epi_year WHERE mr_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE mr_schedule_w2 SET mr_dec=$intDateRegularDay, epi_year=$epi_year WHERE mr_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_2 SQL START-----//
    $nullSQL = "UPDATE mr_schedule_w2 SET mr_dec=NULL, epi_year=$epi_year WHERE mr_dateID=9";
    $result = mysqli_query($conn, $nullSQL);
    //-----NULL Ward_2 SQL END-----//
}

//ward 3
//echo "<br>";
for ($i = 0; $i < $number_of_dates; $i++)
{
    $week1 = ($i*2)+1;
    $week2 = ($i*2)+2;

    $dateR = strtotime($dayOne . ($i * 1) . ' weeks', $startDate);
    $dateW = strtotime($dayFriday . ($i * 1) . ' weeks', $startDate);

    $month = date('m', $dateR).PHP_EOL;

    $dateHoliday = date('d', $dateR).PHP_EOL;
    $dateRegularday = date('d', $dateR).PHP_EOL;
    $dateFriday = date('d', $dateW).PHP_EOL;

    $intmonth = intval($month);

    $intDateHoliday = intval($dateHoliday);
    $intDateRegularDay = intval($dateRegularday);
    $intDateFriday = intval($dateFriday);

    if($eventmonth == $intmonth && ($eventDateDec01 == $intDateHoliday || $eventDateDec02 == $intDateHoliday || $eventDateDec03 == $intDateHoliday || $eventDateDec04 == $intDateHoliday || $eventDateDec05 == $intDateHoliday || $eventDateDec06 == $intDateHoliday || $eventDateDec07 == $intDateHoliday || $eventDateDec08 == $intDateHoliday || $eventDateDec09 == $intDateHoliday || $eventDateDec10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateDec01 || $incrementDayOne == $eventDateDec02 || $incrementDayOne == $eventDateDec03 || $incrementDayOne == $eventDateDec04 || $incrementDayOne == $eventDateDec05 || $incrementDayOne == $eventDateDec06 || $incrementDayOne == $eventDateDec07 || $incrementDayOne == $eventDateDec08 || $incrementDayOne == $eventDateDec09 || $incrementDayOne == $eventDateDec10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateDec01 || $decrementDayTwo == $eventDateDec02 || $decrementDayTwo == $eventDateDec03 || $decrementDayTwo == $eventDateDec04 || $decrementDayTwo == $eventDateDec05 || $decrementDayTwo == $eventDateDec06 || $decrementDayTwo == $eventDateDec07 || $decrementDayTwo == $eventDateDec08 || $decrementDayTwo == $eventDateDec09 || $decrementDayTwo == $eventDateDec10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_dec=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateDec01 || $decrementDayTwo == $eventDateDec02 || $decrementDayTwo == $eventDateDec03 || $decrementDayTwo == $eventDateDec04 || $decrementDayTwo == $eventDateDec05 || $decrementDayTwo == $eventDateDec06 || $decrementDayTwo == $eventDateDec07 || $decrementDayTwo == $eventDateDec08 || $decrementDayTwo == $eventDateDec09 || $decrementDayTwo == $eventDateDec10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_dec=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE mr_schedule_w3 SET mr_dec=$incrementDayOne, epi_year=$epi_year WHERE mr_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE mr_schedule_w3 SET mr_dec=$intDateRegularDay, epi_year=$epi_year WHERE mr_dateID=$week1";
        $result = mysqli_query($conn, $sql);
    }

    /*--------------------------*/
    $dateR = strtotime($dayTwo . ($i * 1) . ' weeks', $startDate);
    $dateW = strtotime($dayFriday . ($i * 1) . ' weeks', $startDate);

    $month = date('m', $dateR).PHP_EOL;

    $dateHoliday = date('d', $dateR).PHP_EOL;
    $dateRegularday = date('d', $dateR).PHP_EOL;
    $dateFriday = date('d', $dateW).PHP_EOL;

    $intmonth = intval($month);

    $intDateHoliday = intval($dateHoliday);
    $intDateRegularDay = intval($dateRegularday);
    $intDateFriday = intval($dateFriday);

    if($eventmonth == $intmonth && ($eventDateDec01 == $intDateHoliday || $eventDateDec02 == $intDateHoliday || $eventDateDec03 == $intDateHoliday || $eventDateDec04 == $intDateHoliday || $eventDateDec05 == $intDateHoliday || $eventDateDec06 == $intDateHoliday || $eventDateDec07 == $intDateHoliday || $eventDateDec08 == $intDateHoliday || $eventDateDec09 == $intDateHoliday || $eventDateDec10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateDec01 || $incrementDayOne == $eventDateDec02 || $incrementDayOne == $eventDateDec03 || $incrementDayOne == $eventDateDec04 || $incrementDayOne == $eventDateDec05 || $incrementDayOne == $eventDateDec06 || $incrementDayOne == $eventDateDec07 || $incrementDayOne == $eventDateDec08 || $incrementDayOne == $eventDateDec09 || $incrementDayOne == $eventDateDec10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateDec01 || $decrementDayTwo == $eventDateDec02 || $decrementDayTwo == $eventDateDec03 || $decrementDayTwo == $eventDateDec04 || $decrementDayTwo == $eventDateDec05 || $decrementDayTwo == $eventDateDec06 || $decrementDayTwo == $eventDateDec07 || $decrementDayTwo == $eventDateDec08 || $decrementDayTwo == $eventDateDec09 || $decrementDayTwo == $eventDateDec10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_dec=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateDec01 || $decrementDayTwo == $eventDateDec02 || $decrementDayTwo == $eventDateDec03 || $decrementDayTwo == $eventDateDec04 || $decrementDayTwo == $eventDateDec05 || $decrementDayTwo == $eventDateDec06 || $decrementDayTwo == $eventDateDec07 || $decrementDayTwo == $eventDateDec08 || $decrementDayTwo == $eventDateDec09 || $decrementDayTwo == $eventDateDec10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_dec=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateDec01 || $decrementDayTwo == $eventDateDec02 || $decrementDayTwo == $eventDateDec03 || $decrementDayTwo == $eventDateDec04 || $decrementDayTwo == $eventDateDec05 || $decrementDayTwo == $eventDateDec06 || $decrementDayTwo == $eventDateDec07 || $decrementDayTwo == $eventDateDec08 || $decrementDayTwo == $eventDateDec09 || $decrementDayTwo == $eventDateDec10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_dec=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_dec=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE mr_schedule_w3 SET mr_dec=$incrementDayOne, epi_year=$epi_year WHERE mr_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE mr_schedule_w3 SET mr_dec=$intDateRegularDay, epi_year=$epi_year WHERE mr_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_3 SQL START-----//
    $nullSQL = "UPDATE mr_schedule_w3 SET mr_dec=NULL, epi_year=$epi_year WHERE mr_dateID=9";
    $result = mysqli_query($conn, $nullSQL);
    //-----NULL Ward_3 SQL END-----//
}