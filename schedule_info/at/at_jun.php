<?php
require_once ("db_connection.php");
include_once ("at_data_fetch.php");

//dbFile
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "central_db";

$conn = new mysqli($servername, $username, $password, $dbname);

//value fetch from DB
//$eventDateJun01 = 0;
//$eventDateJun02 = 0;
//$eventDateJun03 = 0;
//$eventDateJun04 = 0;
//$eventDateJun05 = 0;
//$eventDateJun06 = 0;
//$eventDateJun07 = 0;
//$eventDateJun08 = 0;
//$eventDateJun09 = 0;
//$eventDateJun10 = 0;

//value fetch from DB
/*$dayOne = "Monday";
$dayTwo = "Thursday";*/
$dayFriday = "Friday";

//value fetch from DB
$month = 6;

//value fetch from DB
/*$epi_year = 2018;*/

//value fetch from DB
$eventmonth = 6;

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

    if($eventmonth == $intmonth && ($eventDateJun01 == $intDateHoliday || $eventDateJun02 == $intDateHoliday || $eventDateJun03 == $intDateHoliday || $eventDateJun04 == $intDateHoliday || $eventDateJun05 == $intDateHoliday || $eventDateJun06 == $intDateHoliday || $eventDateJun07 == $intDateHoliday || $eventDateJun08 == $intDateHoliday || $eventDateJun09 == $intDateHoliday || $eventDateJun10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateJun01 || $incrementDayOne == $eventDateJun02 || $incrementDayOne == $eventDateJun03 || $incrementDayOne == $eventDateJun04 || $incrementDayOne == $eventDateJun05 || $incrementDayOne == $eventDateJun06 || $incrementDayOne == $eventDateJun07 || $incrementDayOne == $eventDateJun08 || $incrementDayOne == $eventDateJun09 || $incrementDayOne == $eventDateJun10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJun01 || $decrementDayTwo == $eventDateJun02 || $decrementDayTwo == $eventDateJun03 || $decrementDayTwo == $eventDateJun04 || $decrementDayTwo == $eventDateJun05 || $decrementDayTwo == $eventDateJun06 || $decrementDayTwo == $eventDateJun07 || $decrementDayTwo == $eventDateJun08 || $decrementDayTwo == $eventDateJun09 || $decrementDayTwo == $eventDateJun10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_jun=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_jun=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_jun=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJun01 || $decrementDayTwo == $eventDateJun02 || $decrementDayTwo == $eventDateJun03 || $decrementDayTwo == $eventDateJun04 || $decrementDayTwo == $eventDateJun05 || $decrementDayTwo == $eventDateJun06 || $decrementDayTwo == $eventDateJun07 || $decrementDayTwo == $eventDateJun08 || $decrementDayTwo == $eventDateJun09 || $decrementDayTwo == $eventDateJun10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_jun=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }

            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_jun=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_jun=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w1 SET at_jun=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w1 SET at_jun=$intDateRegularDay, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateJun01 == $intDateHoliday || $eventDateJun02 == $intDateHoliday || $eventDateJun03 == $intDateHoliday || $eventDateJun04 == $intDateHoliday || $eventDateJun05 == $intDateHoliday || $eventDateJun06 == $intDateHoliday || $eventDateJun07 == $intDateHoliday || $eventDateJun08 == $intDateHoliday || $eventDateJun09 == $intDateHoliday || $eventDateJun10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateJun01 || $incrementDayOne == $eventDateJun02 || $incrementDayOne == $eventDateJun03 || $incrementDayOne == $eventDateJun04 || $incrementDayOne == $eventDateJun05 || $incrementDayOne == $eventDateJun06 || $incrementDayOne == $eventDateJun07 || $incrementDayOne == $eventDateJun08 || $incrementDayOne == $eventDateJun09 || $incrementDayOne == $eventDateJun10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJun01 || $decrementDayTwo == $eventDateJun02 || $decrementDayTwo == $eventDateJun03 || $decrementDayTwo == $eventDateJun04 || $decrementDayTwo == $eventDateJun05 || $decrementDayTwo == $eventDateJun06 || $decrementDayTwo == $eventDateJun07 || $decrementDayTwo == $eventDateJun08 || $decrementDayTwo == $eventDateJun09 || $decrementDayTwo == $eventDateJun10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_jun=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_jun=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_jun=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJun01 || $decrementDayTwo == $eventDateJun02 || $decrementDayTwo == $eventDateJun03 || $decrementDayTwo == $eventDateJun04 || $decrementDayTwo == $eventDateJun05 || $decrementDayTwo == $eventDateJun06 || $decrementDayTwo == $eventDateJun07 || $decrementDayTwo == $eventDateJun08 || $decrementDayTwo == $eventDateJun09 || $decrementDayTwo == $eventDateJun10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_jun=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_jun=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_jun=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJun01 || $decrementDayTwo == $eventDateJun02 || $decrementDayTwo == $eventDateJun03 || $decrementDayTwo == $eventDateJun04 || $decrementDayTwo == $eventDateJun05 || $decrementDayTwo == $eventDateJun06 || $decrementDayTwo == $eventDateJun07 || $decrementDayTwo == $eventDateJun08 || $decrementDayTwo == $eventDateJun09 || $decrementDayTwo == $eventDateJun10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_jun=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_jun=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_jun=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w1 SET at_jun=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w1 SET at_jun=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_1 SQL START-----//
    $nullSQL = "UPDATE at_schedule_w1 SET at_jun=NULL, epi_year=$epi_year WHERE at_dateID=9";
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

    if($eventmonth == $intmonth && ($eventDateJun01 == $intDateHoliday || $eventDateJun02 == $intDateHoliday || $eventDateJun03 == $intDateHoliday || $eventDateJun04 == $intDateHoliday || $eventDateJun05 == $intDateHoliday || $eventDateJun06 == $intDateHoliday || $eventDateJun07 == $intDateHoliday || $eventDateJun08 == $intDateHoliday || $eventDateJun09 == $intDateHoliday || $eventDateJun10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateJun01 || $incrementDayOne == $eventDateJun02 || $incrementDayOne == $eventDateJun03 || $incrementDayOne == $eventDateJun04 || $incrementDayOne == $eventDateJun05 || $incrementDayOne == $eventDateJun06 || $incrementDayOne == $eventDateJun07 || $incrementDayOne == $eventDateJun08 || $incrementDayOne == $eventDateJun09 || $incrementDayOne == $eventDateJun10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJun01 || $decrementDayTwo == $eventDateJun02 || $decrementDayTwo == $eventDateJun03 || $decrementDayTwo == $eventDateJun04 || $decrementDayTwo == $eventDateJun05 || $decrementDayTwo == $eventDateJun06 || $decrementDayTwo == $eventDateJun07 || $decrementDayTwo == $eventDateJun08 || $decrementDayTwo == $eventDateJun09 || $decrementDayTwo == $eventDateJun10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_jun=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJun01 || $decrementDayTwo == $eventDateJun02 || $decrementDayTwo == $eventDateJun03 || $decrementDayTwo == $eventDateJun04 || $decrementDayTwo == $eventDateJun05 || $decrementDayTwo == $eventDateJun06 || $decrementDayTwo == $eventDateJun07 || $decrementDayTwo == $eventDateJun08 || $decrementDayTwo == $eventDateJun09 || $decrementDayTwo == $eventDateJun10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_jun=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w2 SET at_jun=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w2 SET at_jun=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateJun01 == $intDateHoliday || $eventDateJun02 == $intDateHoliday || $eventDateJun03 == $intDateHoliday || $eventDateJun04 == $intDateHoliday || $eventDateJun05 == $intDateHoliday || $eventDateJun06 == $intDateHoliday || $eventDateJun07 == $intDateHoliday || $eventDateJun08 == $intDateHoliday || $eventDateJun09 == $intDateHoliday || $eventDateJun10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateJun01 || $incrementDayOne == $eventDateJun02 || $incrementDayOne == $eventDateJun03 || $incrementDayOne == $eventDateJun04 || $incrementDayOne == $eventDateJun05 || $incrementDayOne == $eventDateJun06 || $incrementDayOne == $eventDateJun07 || $incrementDayOne == $eventDateJun08 || $incrementDayOne == $eventDateJun09 || $incrementDayOne == $eventDateJun10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJun01 || $decrementDayTwo == $eventDateJun02 || $decrementDayTwo == $eventDateJun03 || $decrementDayTwo == $eventDateJun04 || $decrementDayTwo == $eventDateJun05 || $decrementDayTwo == $eventDateJun06 || $decrementDayTwo == $eventDateJun07 || $decrementDayTwo == $eventDateJun08 || $decrementDayTwo == $eventDateJun09 || $decrementDayTwo == $eventDateJun10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_jun=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJun01 || $decrementDayTwo == $eventDateJun02 || $decrementDayTwo == $eventDateJun03 || $decrementDayTwo == $eventDateJun04 || $decrementDayTwo == $eventDateJun05 || $decrementDayTwo == $eventDateJun06 || $decrementDayTwo == $eventDateJun07 || $decrementDayTwo == $eventDateJun08 || $decrementDayTwo == $eventDateJun09 || $decrementDayTwo == $eventDateJun10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_jun=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJun01 || $decrementDayTwo == $eventDateJun02 || $decrementDayTwo == $eventDateJun03 || $decrementDayTwo == $eventDateJun04 || $decrementDayTwo == $eventDateJun05 || $decrementDayTwo == $eventDateJun06 || $decrementDayTwo == $eventDateJun07 || $decrementDayTwo == $eventDateJun08 || $decrementDayTwo == $eventDateJun09 || $decrementDayTwo == $eventDateJun10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_jun=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w2 SET at_jun=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w2 SET at_jun=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_2 SQL START-----//
    $nullSQL = "UPDATE at_schedule_w2 SET at_jun=NULL, epi_year=$epi_year WHERE at_dateID=9";
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

    if($eventmonth == $intmonth && ($eventDateJun01 == $intDateHoliday || $eventDateJun02 == $intDateHoliday || $eventDateJun03 == $intDateHoliday || $eventDateJun04 == $intDateHoliday || $eventDateJun05 == $intDateHoliday || $eventDateJun06 == $intDateHoliday || $eventDateJun07 == $intDateHoliday || $eventDateJun08 == $intDateHoliday || $eventDateJun09 == $intDateHoliday || $eventDateJun10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateJun01 || $incrementDayOne == $eventDateJun02 || $incrementDayOne == $eventDateJun03 || $incrementDayOne == $eventDateJun04 || $incrementDayOne == $eventDateJun05 || $incrementDayOne == $eventDateJun06 || $incrementDayOne == $eventDateJun07 || $incrementDayOne == $eventDateJun08 || $incrementDayOne == $eventDateJun09 || $incrementDayOne == $eventDateJun10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJun01 || $decrementDayTwo == $eventDateJun02 || $decrementDayTwo == $eventDateJun03 || $decrementDayTwo == $eventDateJun04 || $decrementDayTwo == $eventDateJun05 || $decrementDayTwo == $eventDateJun06 || $decrementDayTwo == $eventDateJun07 || $decrementDayTwo == $eventDateJun08 || $decrementDayTwo == $eventDateJun09 || $decrementDayTwo == $eventDateJun10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_jun=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJun01 || $decrementDayTwo == $eventDateJun02 || $decrementDayTwo == $eventDateJun03 || $decrementDayTwo == $eventDateJun04 || $decrementDayTwo == $eventDateJun05 || $decrementDayTwo == $eventDateJun06 || $decrementDayTwo == $eventDateJun07 || $decrementDayTwo == $eventDateJun08 || $decrementDayTwo == $eventDateJun09 || $decrementDayTwo == $eventDateJun10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_jun=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w3 SET at_jun=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w3 SET at_jun=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateJun01 == $intDateHoliday || $eventDateJun02 == $intDateHoliday || $eventDateJun03 == $intDateHoliday || $eventDateJun04 == $intDateHoliday || $eventDateJun05 == $intDateHoliday || $eventDateJun06 == $intDateHoliday || $eventDateJun07 == $intDateHoliday || $eventDateJun08 == $intDateHoliday || $eventDateJun09 == $intDateHoliday || $eventDateJun10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateJun01 || $incrementDayOne == $eventDateJun02 || $incrementDayOne == $eventDateJun03 || $incrementDayOne == $eventDateJun04 || $incrementDayOne == $eventDateJun05 || $incrementDayOne == $eventDateJun06 || $incrementDayOne == $eventDateJun07 || $incrementDayOne == $eventDateJun08 || $incrementDayOne == $eventDateJun09 || $incrementDayOne == $eventDateJun10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJun01 || $decrementDayTwo == $eventDateJun02 || $decrementDayTwo == $eventDateJun03 || $decrementDayTwo == $eventDateJun04 || $decrementDayTwo == $eventDateJun05 || $decrementDayTwo == $eventDateJun06 || $decrementDayTwo == $eventDateJun07 || $decrementDayTwo == $eventDateJun08 || $decrementDayTwo == $eventDateJun09 || $decrementDayTwo == $eventDateJun10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_jun=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJun01 || $decrementDayTwo == $eventDateJun02 || $decrementDayTwo == $eventDateJun03 || $decrementDayTwo == $eventDateJun04 || $decrementDayTwo == $eventDateJun05 || $decrementDayTwo == $eventDateJun06 || $decrementDayTwo == $eventDateJun07 || $decrementDayTwo == $eventDateJun08 || $decrementDayTwo == $eventDateJun09 || $decrementDayTwo == $eventDateJun10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_jun=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJun01 || $decrementDayTwo == $eventDateJun02 || $decrementDayTwo == $eventDateJun03 || $decrementDayTwo == $eventDateJun04 || $decrementDayTwo == $eventDateJun05 || $decrementDayTwo == $eventDateJun06 || $decrementDayTwo == $eventDateJun07 || $decrementDayTwo == $eventDateJun08 || $decrementDayTwo == $eventDateJun09 || $decrementDayTwo == $eventDateJun10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_jun=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_jun=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w3 SET at_jun=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w3 SET at_jun=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_3 SQL START-----//
    $nullSQL = "UPDATE at_schedule_w3 SET at_jun=NULL, epi_year=$epi_year WHERE at_dateID=9";
    $result = mysqli_query($conn, $nullSQL);
    //-----NULL Ward_3 SQL END-----//
}