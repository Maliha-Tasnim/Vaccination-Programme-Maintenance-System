<?php
require_once ("db_connection.php");
include_once ("sw_data_fetch.php");

//dbFile
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "central_db";

$conn = new mysqli($servername, $username, $password, $dbname);

//value fetch from DB
//$eventDateMay01 = 0;
//$eventDateMay02 = 0;
//$eventDateMay03 = 0;
//$eventDateMay04 = 0;
//$eventDateMay05 = 0;
//$eventDateMay06 = 0;
//$eventDateMay07 = 0;
//$eventDateMay08 = 0;
//$eventDateMay09 = 0;
//$eventDateMay10 = 0;

//value fetch from DB
/*$dayOne = "Monday";
$dayTwo = "Thursday";*/
$dayFriday = "Friday";

//value fetch from DB
$month = 5;

//value fetch from DB
/*$epi_year = 2018;*/

//value fetch from DB
$eventmonth = 5;

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

    if($eventmonth == $intmonth && ($eventDateMay01 == $intDateHoliday || $eventDateMay02 == $intDateHoliday || $eventDateMay03 == $intDateHoliday || $eventDateMay04 == $intDateHoliday || $eventDateMay05 == $intDateHoliday || $eventDateMay06 == $intDateHoliday || $eventDateMay07 == $intDateHoliday || $eventDateMay08 == $intDateHoliday || $eventDateMay09 == $intDateHoliday || $eventDateMay10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateMay01 || $incrementDayOne == $eventDateMay02 || $incrementDayOne == $eventDateMay03 || $incrementDayOne == $eventDateMay04 || $incrementDayOne == $eventDateMay05 || $incrementDayOne == $eventDateMay06 || $incrementDayOne == $eventDateMay07 || $incrementDayOne == $eventDateMay08 || $incrementDayOne == $eventDateMay09 || $incrementDayOne == $eventDateMay10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateMay01 || $decrementDayTwo == $eventDateMay02 || $decrementDayTwo == $eventDateMay03 || $decrementDayTwo == $eventDateMay04 || $decrementDayTwo == $eventDateMay05 || $decrementDayTwo == $eventDateMay06 || $decrementDayTwo == $eventDateMay07 || $decrementDayTwo == $eventDateMay08 || $decrementDayTwo == $eventDateMay09 || $decrementDayTwo == $eventDateMay10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_may=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_may=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_may=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateMay01 || $decrementDayTwo == $eventDateMay02 || $decrementDayTwo == $eventDateMay03 || $decrementDayTwo == $eventDateMay04 || $decrementDayTwo == $eventDateMay05 || $decrementDayTwo == $eventDateMay06 || $decrementDayTwo == $eventDateMay07 || $decrementDayTwo == $eventDateMay08 || $decrementDayTwo == $eventDateMay09 || $decrementDayTwo == $eventDateMay10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_may=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }

            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_may=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_may=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE sw_schedule_w1 SET sw_may=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE sw_schedule_w1 SET sw_may=$intDateRegularDay, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateMay01 == $intDateHoliday || $eventDateMay02 == $intDateHoliday || $eventDateMay03 == $intDateHoliday || $eventDateMay04 == $intDateHoliday || $eventDateMay05 == $intDateHoliday || $eventDateMay06 == $intDateHoliday || $eventDateMay07 == $intDateHoliday || $eventDateMay08 == $intDateHoliday || $eventDateMay09 == $intDateHoliday || $eventDateMay10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateMay01 || $incrementDayOne == $eventDateMay02 || $incrementDayOne == $eventDateMay03 || $incrementDayOne == $eventDateMay04 || $incrementDayOne == $eventDateMay05 || $incrementDayOne == $eventDateMay06 || $incrementDayOne == $eventDateMay07 || $incrementDayOne == $eventDateMay08 || $incrementDayOne == $eventDateMay09 || $incrementDayOne == $eventDateMay10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateMay01 || $decrementDayTwo == $eventDateMay02 || $decrementDayTwo == $eventDateMay03 || $decrementDayTwo == $eventDateMay04 || $decrementDayTwo == $eventDateMay05 || $decrementDayTwo == $eventDateMay06 || $decrementDayTwo == $eventDateMay07 || $decrementDayTwo == $eventDateMay08 || $decrementDayTwo == $eventDateMay09 || $decrementDayTwo == $eventDateMay10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_may=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_may=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_may=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateMay01 || $decrementDayTwo == $eventDateMay02 || $decrementDayTwo == $eventDateMay03 || $decrementDayTwo == $eventDateMay04 || $decrementDayTwo == $eventDateMay05 || $decrementDayTwo == $eventDateMay06 || $decrementDayTwo == $eventDateMay07 || $decrementDayTwo == $eventDateMay08 || $decrementDayTwo == $eventDateMay09 || $decrementDayTwo == $eventDateMay10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_may=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_may=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_may=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateMay01 || $decrementDayTwo == $eventDateMay02 || $decrementDayTwo == $eventDateMay03 || $decrementDayTwo == $eventDateMay04 || $decrementDayTwo == $eventDateMay05 || $decrementDayTwo == $eventDateMay06 || $decrementDayTwo == $eventDateMay07 || $decrementDayTwo == $eventDateMay08 || $decrementDayTwo == $eventDateMay09 || $decrementDayTwo == $eventDateMay10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_may=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_may=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_may=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE sw_schedule_w1 SET sw_may=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE sw_schedule_w1 SET sw_may=$intDateRegularDay, epi_year=$epi_year WHERE sw_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_1 SQL START-----//
    $nullSQL = "UPDATE sw_schedule_w1 SET sw_may=NULL, epi_year=$epi_year WHERE sw_dateID=9";
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

    if($eventmonth == $intmonth && ($eventDateMay01 == $intDateHoliday || $eventDateMay02 == $intDateHoliday || $eventDateMay03 == $intDateHoliday || $eventDateMay04 == $intDateHoliday || $eventDateMay05 == $intDateHoliday || $eventDateMay06 == $intDateHoliday || $eventDateMay07 == $intDateHoliday || $eventDateMay08 == $intDateHoliday || $eventDateMay09 == $intDateHoliday || $eventDateMay10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateMay01 || $incrementDayOne == $eventDateMay02 || $incrementDayOne == $eventDateMay03 || $incrementDayOne == $eventDateMay04 || $incrementDayOne == $eventDateMay05 || $incrementDayOne == $eventDateMay06 || $incrementDayOne == $eventDateMay07 || $incrementDayOne == $eventDateMay08 || $incrementDayOne == $eventDateMay09 || $incrementDayOne == $eventDateMay10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateMay01 || $decrementDayTwo == $eventDateMay02 || $decrementDayTwo == $eventDateMay03 || $decrementDayTwo == $eventDateMay04 || $decrementDayTwo == $eventDateMay05 || $decrementDayTwo == $eventDateMay06 || $decrementDayTwo == $eventDateMay07 || $decrementDayTwo == $eventDateMay08 || $decrementDayTwo == $eventDateMay09 || $decrementDayTwo == $eventDateMay10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_may=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateMay01 || $decrementDayTwo == $eventDateMay02 || $decrementDayTwo == $eventDateMay03 || $decrementDayTwo == $eventDateMay04 || $decrementDayTwo == $eventDateMay05 || $decrementDayTwo == $eventDateMay06 || $decrementDayTwo == $eventDateMay07 || $decrementDayTwo == $eventDateMay08 || $decrementDayTwo == $eventDateMay09 || $decrementDayTwo == $eventDateMay10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_may=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE sw_schedule_w2 SET sw_may=$incrementDayOne, epi_year=$epi_year WHERE sw_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE sw_schedule_w2 SET sw_may=$intDateRegularDay, epi_year=$epi_year WHERE sw_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateMay01 == $intDateHoliday || $eventDateMay02 == $intDateHoliday || $eventDateMay03 == $intDateHoliday || $eventDateMay04 == $intDateHoliday || $eventDateMay05 == $intDateHoliday || $eventDateMay06 == $intDateHoliday || $eventDateMay07 == $intDateHoliday || $eventDateMay08 == $intDateHoliday || $eventDateMay09 == $intDateHoliday || $eventDateMay10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateMay01 || $incrementDayOne == $eventDateMay02 || $incrementDayOne == $eventDateMay03 || $incrementDayOne == $eventDateMay04 || $incrementDayOne == $eventDateMay05 || $incrementDayOne == $eventDateMay06 || $incrementDayOne == $eventDateMay07 || $incrementDayOne == $eventDateMay08 || $incrementDayOne == $eventDateMay09 || $incrementDayOne == $eventDateMay10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateMay01 || $decrementDayTwo == $eventDateMay02 || $decrementDayTwo == $eventDateMay03 || $decrementDayTwo == $eventDateMay04 || $decrementDayTwo == $eventDateMay05 || $decrementDayTwo == $eventDateMay06 || $decrementDayTwo == $eventDateMay07 || $decrementDayTwo == $eventDateMay08 || $decrementDayTwo == $eventDateMay09 || $decrementDayTwo == $eventDateMay10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_may=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateMay01 || $decrementDayTwo == $eventDateMay02 || $decrementDayTwo == $eventDateMay03 || $decrementDayTwo == $eventDateMay04 || $decrementDayTwo == $eventDateMay05 || $decrementDayTwo == $eventDateMay06 || $decrementDayTwo == $eventDateMay07 || $decrementDayTwo == $eventDateMay08 || $decrementDayTwo == $eventDateMay09 || $decrementDayTwo == $eventDateMay10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_may=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateMay01 || $decrementDayTwo == $eventDateMay02 || $decrementDayTwo == $eventDateMay03 || $decrementDayTwo == $eventDateMay04 || $decrementDayTwo == $eventDateMay05 || $decrementDayTwo == $eventDateMay06 || $decrementDayTwo == $eventDateMay07 || $decrementDayTwo == $eventDateMay08 || $decrementDayTwo == $eventDateMay09 || $decrementDayTwo == $eventDateMay10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_may=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE sw_schedule_w2 SET sw_may=$incrementDayOne, epi_year=$epi_year WHERE sw_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE sw_schedule_w2 SET sw_may=$intDateRegularDay, epi_year=$epi_year WHERE sw_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_2 SQL START-----//
    $nullSQL = "UPDATE sw_schedule_w2 SET sw_may=NULL, epi_year=$epi_year WHERE sw_dateID=9";
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

    if($eventmonth == $intmonth && ($eventDateMay01 == $intDateHoliday || $eventDateMay02 == $intDateHoliday || $eventDateMay03 == $intDateHoliday || $eventDateMay04 == $intDateHoliday || $eventDateMay05 == $intDateHoliday || $eventDateMay06 == $intDateHoliday || $eventDateMay07 == $intDateHoliday || $eventDateMay08 == $intDateHoliday || $eventDateMay09 == $intDateHoliday || $eventDateMay10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateMay01 || $incrementDayOne == $eventDateMay02 || $incrementDayOne == $eventDateMay03 || $incrementDayOne == $eventDateMay04 || $incrementDayOne == $eventDateMay05 || $incrementDayOne == $eventDateMay06 || $incrementDayOne == $eventDateMay07 || $incrementDayOne == $eventDateMay08 || $incrementDayOne == $eventDateMay09 || $incrementDayOne == $eventDateMay10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateMay01 || $decrementDayTwo == $eventDateMay02 || $decrementDayTwo == $eventDateMay03 || $decrementDayTwo == $eventDateMay04 || $decrementDayTwo == $eventDateMay05 || $decrementDayTwo == $eventDateMay06 || $decrementDayTwo == $eventDateMay07 || $decrementDayTwo == $eventDateMay08 || $decrementDayTwo == $eventDateMay09 || $decrementDayTwo == $eventDateMay10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_may=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateMay01 || $decrementDayTwo == $eventDateMay02 || $decrementDayTwo == $eventDateMay03 || $decrementDayTwo == $eventDateMay04 || $decrementDayTwo == $eventDateMay05 || $decrementDayTwo == $eventDateMay06 || $decrementDayTwo == $eventDateMay07 || $decrementDayTwo == $eventDateMay08 || $decrementDayTwo == $eventDateMay09 || $decrementDayTwo == $eventDateMay10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_may=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE sw_schedule_w3 SET sw_may=$incrementDayOne, epi_year=$epi_year WHERE sw_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE sw_schedule_w3 SET sw_may=$intDateRegularDay, epi_year=$epi_year WHERE sw_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateMay01 == $intDateHoliday || $eventDateMay02 == $intDateHoliday || $eventDateMay03 == $intDateHoliday || $eventDateMay04 == $intDateHoliday || $eventDateMay05 == $intDateHoliday || $eventDateMay06 == $intDateHoliday || $eventDateMay07 == $intDateHoliday || $eventDateMay08 == $intDateHoliday || $eventDateMay09 == $intDateHoliday || $eventDateMay10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateMay01 || $incrementDayOne == $eventDateMay02 || $incrementDayOne == $eventDateMay03 || $incrementDayOne == $eventDateMay04 || $incrementDayOne == $eventDateMay05 || $incrementDayOne == $eventDateMay06 || $incrementDayOne == $eventDateMay07 || $incrementDayOne == $eventDateMay08 || $incrementDayOne == $eventDateMay09 || $incrementDayOne == $eventDateMay10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateMay01 || $decrementDayTwo == $eventDateMay02 || $decrementDayTwo == $eventDateMay03 || $decrementDayTwo == $eventDateMay04 || $decrementDayTwo == $eventDateMay05 || $decrementDayTwo == $eventDateMay06 || $decrementDayTwo == $eventDateMay07 || $decrementDayTwo == $eventDateMay08 || $decrementDayTwo == $eventDateMay09 || $decrementDayTwo == $eventDateMay10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_may=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateMay01 || $decrementDayTwo == $eventDateMay02 || $decrementDayTwo == $eventDateMay03 || $decrementDayTwo == $eventDateMay04 || $decrementDayTwo == $eventDateMay05 || $decrementDayTwo == $eventDateMay06 || $decrementDayTwo == $eventDateMay07 || $decrementDayTwo == $eventDateMay08 || $decrementDayTwo == $eventDateMay09 || $decrementDayTwo == $eventDateMay10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_may=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateMay01 || $decrementDayTwo == $eventDateMay02 || $decrementDayTwo == $eventDateMay03 || $decrementDayTwo == $eventDateMay04 || $decrementDayTwo == $eventDateMay05 || $decrementDayTwo == $eventDateMay06 || $decrementDayTwo == $eventDateMay07 || $decrementDayTwo == $eventDateMay08 || $decrementDayTwo == $eventDateMay09 || $decrementDayTwo == $eventDateMay10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_may=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_may=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE sw_schedule_w3 SET sw_may=$incrementDayOne, epi_year=$epi_year WHERE sw_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE sw_schedule_w3 SET sw_may=$intDateRegularDay, epi_year=$epi_year WHERE sw_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_3 SQL START-----//
    $nullSQL = "UPDATE sw_schedule_w3 SET sw_may=NULL, epi_year=$epi_year WHERE sw_dateID=9";
    $result = mysqli_query($conn, $nullSQL);
    //-----NULL Ward_3 SQL END-----//
}