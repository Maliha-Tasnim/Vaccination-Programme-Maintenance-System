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
//$eventDateApr01 = 0;
//$eventDateApr02 = 0;
//$eventDateApr03 = 0;
//$eventDateApr04 = 0;
//$eventDateApr05 = 0;
//$eventDateApr06 = 0;
//$eventDateApr07 = 0;
//$eventDateApr08 = 0;
//$eventDateApr09 = 0;
//$eventDateApr10 = 0;

//value fetch from DB
/*$dayOne = "Monday";
$dayTwo = "Thursday";*/
$dayFriday = "Friday";

//value fetch from DB
$month = 4;

//value fetch from DB
/*$epi_year = 2018;*/

//value fetch from DB
$eventmonth = 4;

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

    if($eventmonth == $intmonth && ($eventDateApr01 == $intDateHoliday || $eventDateApr02 == $intDateHoliday || $eventDateApr03 == $intDateHoliday || $eventDateApr04 == $intDateHoliday || $eventDateApr05 == $intDateHoliday || $eventDateApr06 == $intDateHoliday || $eventDateApr07 == $intDateHoliday || $eventDateApr08 == $intDateHoliday || $eventDateApr09 == $intDateHoliday || $eventDateApr10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateApr01 || $incrementDayOne == $eventDateApr02 || $incrementDayOne == $eventDateApr03 || $incrementDayOne == $eventDateApr04 || $incrementDayOne == $eventDateApr05 || $incrementDayOne == $eventDateApr06 || $incrementDayOne == $eventDateApr07 || $incrementDayOne == $eventDateApr08 || $incrementDayOne == $eventDateApr09 || $incrementDayOne == $eventDateApr10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateApr01 || $decrementDayTwo == $eventDateApr02 || $decrementDayTwo == $eventDateApr03 || $decrementDayTwo == $eventDateApr04 || $decrementDayTwo == $eventDateApr05 || $decrementDayTwo == $eventDateApr06 || $decrementDayTwo == $eventDateApr07 || $decrementDayTwo == $eventDateApr08 || $decrementDayTwo == $eventDateApr09 || $decrementDayTwo == $eventDateApr10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_apr=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_apr=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_apr=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateApr01 || $decrementDayTwo == $eventDateApr02 || $decrementDayTwo == $eventDateApr03 || $decrementDayTwo == $eventDateApr04 || $decrementDayTwo == $eventDateApr05 || $decrementDayTwo == $eventDateApr06 || $decrementDayTwo == $eventDateApr07 || $decrementDayTwo == $eventDateApr08 || $decrementDayTwo == $eventDateApr09 || $decrementDayTwo == $eventDateApr10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_apr=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }

            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_apr=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_apr=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE mr_schedule_w1 SET mr_apr=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE mr_schedule_w1 SET mr_apr=$intDateRegularDay, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateApr01 == $intDateHoliday || $eventDateApr02 == $intDateHoliday || $eventDateApr03 == $intDateHoliday || $eventDateApr04 == $intDateHoliday || $eventDateApr05 == $intDateHoliday || $eventDateApr06 == $intDateHoliday || $eventDateApr07 == $intDateHoliday || $eventDateApr08 == $intDateHoliday || $eventDateApr09 == $intDateHoliday || $eventDateApr10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateApr01 || $incrementDayOne == $eventDateApr02 || $incrementDayOne == $eventDateApr03 || $incrementDayOne == $eventDateApr04 || $incrementDayOne == $eventDateApr05 || $incrementDayOne == $eventDateApr06 || $incrementDayOne == $eventDateApr07 || $incrementDayOne == $eventDateApr08 || $incrementDayOne == $eventDateApr09 || $incrementDayOne == $eventDateApr10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateApr01 || $decrementDayTwo == $eventDateApr02 || $decrementDayTwo == $eventDateApr03 || $decrementDayTwo == $eventDateApr04 || $decrementDayTwo == $eventDateApr05 || $decrementDayTwo == $eventDateApr06 || $decrementDayTwo == $eventDateApr07 || $decrementDayTwo == $eventDateApr08 || $decrementDayTwo == $eventDateApr09 || $decrementDayTwo == $eventDateApr10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_apr=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_apr=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_apr=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateApr01 || $decrementDayTwo == $eventDateApr02 || $decrementDayTwo == $eventDateApr03 || $decrementDayTwo == $eventDateApr04 || $decrementDayTwo == $eventDateApr05 || $decrementDayTwo == $eventDateApr06 || $decrementDayTwo == $eventDateApr07 || $decrementDayTwo == $eventDateApr08 || $decrementDayTwo == $eventDateApr09 || $decrementDayTwo == $eventDateApr10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_apr=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_apr=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_apr=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateApr01 || $decrementDayTwo == $eventDateApr02 || $decrementDayTwo == $eventDateApr03 || $decrementDayTwo == $eventDateApr04 || $decrementDayTwo == $eventDateApr05 || $decrementDayTwo == $eventDateApr06 || $decrementDayTwo == $eventDateApr07 || $decrementDayTwo == $eventDateApr08 || $decrementDayTwo == $eventDateApr09 || $decrementDayTwo == $eventDateApr10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_apr=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_apr=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w1 SET mr_apr=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE mr_schedule_w1 SET mr_apr=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE mr_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE mr_schedule_w1 SET mr_apr=$intDateRegularDay, epi_year=$epi_year WHERE mr_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_1 SQL START-----//
    $nullSQL = "UPDATE mr_schedule_w1 SET mr_apr=NULL, epi_year=$epi_year WHERE mr_dateID=9";
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

    if($eventmonth == $intmonth && ($eventDateApr01 == $intDateHoliday || $eventDateApr02 == $intDateHoliday || $eventDateApr03 == $intDateHoliday || $eventDateApr04 == $intDateHoliday || $eventDateApr05 == $intDateHoliday || $eventDateApr06 == $intDateHoliday || $eventDateApr07 == $intDateHoliday || $eventDateApr08 == $intDateHoliday || $eventDateApr09 == $intDateHoliday || $eventDateApr10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateApr01 || $incrementDayOne == $eventDateApr02 || $incrementDayOne == $eventDateApr03 || $incrementDayOne == $eventDateApr04 || $incrementDayOne == $eventDateApr05 || $incrementDayOne == $eventDateApr06 || $incrementDayOne == $eventDateApr07 || $incrementDayOne == $eventDateApr08 || $incrementDayOne == $eventDateApr09 || $incrementDayOne == $eventDateApr10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateApr01 || $decrementDayTwo == $eventDateApr02 || $decrementDayTwo == $eventDateApr03 || $decrementDayTwo == $eventDateApr04 || $decrementDayTwo == $eventDateApr05 || $decrementDayTwo == $eventDateApr06 || $decrementDayTwo == $eventDateApr07 || $decrementDayTwo == $eventDateApr08 || $decrementDayTwo == $eventDateApr09 || $decrementDayTwo == $eventDateApr10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_apr=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateApr01 || $decrementDayTwo == $eventDateApr02 || $decrementDayTwo == $eventDateApr03 || $decrementDayTwo == $eventDateApr04 || $decrementDayTwo == $eventDateApr05 || $decrementDayTwo == $eventDateApr06 || $decrementDayTwo == $eventDateApr07 || $decrementDayTwo == $eventDateApr08 || $decrementDayTwo == $eventDateApr09 || $decrementDayTwo == $eventDateApr10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_apr=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE mr_schedule_w2 SET mr_apr=$incrementDayOne, epi_year=$epi_year WHERE mr_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE mr_schedule_w2 SET mr_apr=$intDateRegularDay, epi_year=$epi_year WHERE mr_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateApr01 == $intDateHoliday || $eventDateApr02 == $intDateHoliday || $eventDateApr03 == $intDateHoliday || $eventDateApr04 == $intDateHoliday || $eventDateApr05 == $intDateHoliday || $eventDateApr06 == $intDateHoliday || $eventDateApr07 == $intDateHoliday || $eventDateApr08 == $intDateHoliday || $eventDateApr09 == $intDateHoliday || $eventDateApr10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateApr01 || $incrementDayOne == $eventDateApr02 || $incrementDayOne == $eventDateApr03 || $incrementDayOne == $eventDateApr04 || $incrementDayOne == $eventDateApr05 || $incrementDayOne == $eventDateApr06 || $incrementDayOne == $eventDateApr07 || $incrementDayOne == $eventDateApr08 || $incrementDayOne == $eventDateApr09 || $incrementDayOne == $eventDateApr10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateApr01 || $decrementDayTwo == $eventDateApr02 || $decrementDayTwo == $eventDateApr03 || $decrementDayTwo == $eventDateApr04 || $decrementDayTwo == $eventDateApr05 || $decrementDayTwo == $eventDateApr06 || $decrementDayTwo == $eventDateApr07 || $decrementDayTwo == $eventDateApr08 || $decrementDayTwo == $eventDateApr09 || $decrementDayTwo == $eventDateApr10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_apr=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateApr01 || $decrementDayTwo == $eventDateApr02 || $decrementDayTwo == $eventDateApr03 || $decrementDayTwo == $eventDateApr04 || $decrementDayTwo == $eventDateApr05 || $decrementDayTwo == $eventDateApr06 || $decrementDayTwo == $eventDateApr07 || $decrementDayTwo == $eventDateApr08 || $decrementDayTwo == $eventDateApr09 || $decrementDayTwo == $eventDateApr10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_apr=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateApr01 || $decrementDayTwo == $eventDateApr02 || $decrementDayTwo == $eventDateApr03 || $decrementDayTwo == $eventDateApr04 || $decrementDayTwo == $eventDateApr05 || $decrementDayTwo == $eventDateApr06 || $decrementDayTwo == $eventDateApr07 || $decrementDayTwo == $eventDateApr08 || $decrementDayTwo == $eventDateApr09 || $decrementDayTwo == $eventDateApr10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w2 SET mr_apr=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE mr_schedule_w2 SET mr_apr=$incrementDayOne, epi_year=$epi_year WHERE mr_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE mr_schedule_w2 SET mr_apr=$intDateRegularDay, epi_year=$epi_year WHERE mr_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_2 SQL START-----//
    $nullSQL = "UPDATE mr_schedule_w2 SET mr_apr=NULL, epi_year=$epi_year WHERE mr_dateID=9";
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

    if($eventmonth == $intmonth && ($eventDateApr01 == $intDateHoliday || $eventDateApr02 == $intDateHoliday || $eventDateApr03 == $intDateHoliday || $eventDateApr04 == $intDateHoliday || $eventDateApr05 == $intDateHoliday || $eventDateApr06 == $intDateHoliday || $eventDateApr07 == $intDateHoliday || $eventDateApr08 == $intDateHoliday || $eventDateApr09 == $intDateHoliday || $eventDateApr10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateApr01 || $incrementDayOne == $eventDateApr02 || $incrementDayOne == $eventDateApr03 || $incrementDayOne == $eventDateApr04 || $incrementDayOne == $eventDateApr05 || $incrementDayOne == $eventDateApr06 || $incrementDayOne == $eventDateApr07 || $incrementDayOne == $eventDateApr08 || $incrementDayOne == $eventDateApr09 || $incrementDayOne == $eventDateApr10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateApr01 || $decrementDayTwo == $eventDateApr02 || $decrementDayTwo == $eventDateApr03 || $decrementDayTwo == $eventDateApr04 || $decrementDayTwo == $eventDateApr05 || $decrementDayTwo == $eventDateApr06 || $decrementDayTwo == $eventDateApr07 || $decrementDayTwo == $eventDateApr08 || $decrementDayTwo == $eventDateApr09 || $decrementDayTwo == $eventDateApr10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_apr=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateApr01 || $decrementDayTwo == $eventDateApr02 || $decrementDayTwo == $eventDateApr03 || $decrementDayTwo == $eventDateApr04 || $decrementDayTwo == $eventDateApr05 || $decrementDayTwo == $eventDateApr06 || $decrementDayTwo == $eventDateApr07 || $decrementDayTwo == $eventDateApr08 || $decrementDayTwo == $eventDateApr09 || $decrementDayTwo == $eventDateApr10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_apr=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE mr_schedule_w3 SET mr_apr=$incrementDayOne, epi_year=$epi_year WHERE mr_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE mr_schedule_w3 SET mr_apr=$intDateRegularDay, epi_year=$epi_year WHERE mr_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateApr01 == $intDateHoliday || $eventDateApr02 == $intDateHoliday || $eventDateApr03 == $intDateHoliday || $eventDateApr04 == $intDateHoliday || $eventDateApr05 == $intDateHoliday || $eventDateApr06 == $intDateHoliday || $eventDateApr07 == $intDateHoliday || $eventDateApr08 == $intDateHoliday || $eventDateApr09 == $intDateHoliday || $eventDateApr10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateApr01 || $incrementDayOne == $eventDateApr02 || $incrementDayOne == $eventDateApr03 || $incrementDayOne == $eventDateApr04 || $incrementDayOne == $eventDateApr05 || $incrementDayOne == $eventDateApr06 || $incrementDayOne == $eventDateApr07 || $incrementDayOne == $eventDateApr08 || $incrementDayOne == $eventDateApr09 || $incrementDayOne == $eventDateApr10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateApr01 || $decrementDayTwo == $eventDateApr02 || $decrementDayTwo == $eventDateApr03 || $decrementDayTwo == $eventDateApr04 || $decrementDayTwo == $eventDateApr05 || $decrementDayTwo == $eventDateApr06 || $decrementDayTwo == $eventDateApr07 || $decrementDayTwo == $eventDateApr08 || $decrementDayTwo == $eventDateApr09 || $decrementDayTwo == $eventDateApr10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_apr=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateApr01 || $decrementDayTwo == $eventDateApr02 || $decrementDayTwo == $eventDateApr03 || $decrementDayTwo == $eventDateApr04 || $decrementDayTwo == $eventDateApr05 || $decrementDayTwo == $eventDateApr06 || $decrementDayTwo == $eventDateApr07 || $decrementDayTwo == $eventDateApr08 || $decrementDayTwo == $eventDateApr09 || $decrementDayTwo == $eventDateApr10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_apr=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateApr01 || $decrementDayTwo == $eventDateApr02 || $decrementDayTwo == $eventDateApr03 || $decrementDayTwo == $eventDateApr04 || $decrementDayTwo == $eventDateApr05 || $decrementDayTwo == $eventDateApr06 || $decrementDayTwo == $eventDateApr07 || $decrementDayTwo == $eventDateApr08 || $decrementDayTwo == $eventDateApr09 || $decrementDayTwo == $eventDateApr10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_apr=$incrementDayThree, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE mr_schedule_w3 SET mr_apr=$decrementDayTwo, epi_year=$epi_year WHERE mr_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE mr_schedule_w3 SET mr_apr=$incrementDayOne, epi_year=$epi_year WHERE mr_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE mr_schedule_w3 SET mr_apr=$intDateRegularDay, epi_year=$epi_year WHERE mr_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_3 SQL START-----//
    $nullSQL = "UPDATE mr_schedule_w3 SET mr_apr=NULL, epi_year=$epi_year WHERE mr_dateID=9";
    $result = mysqli_query($conn, $nullSQL);
    //-----NULL Ward_3 SQL END-----//
}