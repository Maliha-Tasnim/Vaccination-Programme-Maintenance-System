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
//$eventDateJan01 = 0;
//$eventDateJan02 = 0;
//$eventDateJan03 = 0;
//$eventDateJan04 = 0;
//$eventDateJan05 = 0;
//$eventDateJan06 = 0;
//$eventDateJan07 = 0;
//$eventDateJan08 = 0;
//$eventDateJan09 = 0;
//$eventDateJan10 = 0;

//value fetch from DB
/*$dayOne = "Monday";
$dayTwo = "Thursday";*/
$dayFriday = "Friday";

//value fetch from DB
$month = 1;

//value fetch from DB
/*$epi_year = 2018;*/

//value fetch from DB
$eventmonth = 1;

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

    if($eventmonth == $intmonth && ($eventDateJan01 == $intDateHoliday || $eventDateJan02 == $intDateHoliday || $eventDateJan03 == $intDateHoliday || $eventDateJan04 == $intDateHoliday || $eventDateJan05 == $intDateHoliday || $eventDateJan06 == $intDateHoliday || $eventDateJan07 == $intDateHoliday || $eventDateJan08 == $intDateHoliday || $eventDateJan09 == $intDateHoliday || $eventDateJan10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateJan01 || $incrementDayOne == $eventDateJan02 || $incrementDayOne == $eventDateJan03 || $incrementDayOne == $eventDateJan04 || $incrementDayOne == $eventDateJan05 || $incrementDayOne == $eventDateJan06 || $incrementDayOne == $eventDateJan07 || $incrementDayOne == $eventDateJan08 || $incrementDayOne == $eventDateJan09 || $incrementDayOne == $eventDateJan10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJan01 || $decrementDayTwo == $eventDateJan02 || $decrementDayTwo == $eventDateJan03 || $decrementDayTwo == $eventDateJan04 || $decrementDayTwo == $eventDateJan05 || $decrementDayTwo == $eventDateJan06 || $decrementDayTwo == $eventDateJan07 || $decrementDayTwo == $eventDateJan08 || $decrementDayTwo == $eventDateJan09 || $decrementDayTwo == $eventDateJan10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_Jan=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_Jan=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_Jan=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJan01 || $decrementDayTwo == $eventDateJan02 || $decrementDayTwo == $eventDateJan03 || $decrementDayTwo == $eventDateJan04 || $decrementDayTwo == $eventDateJan05 || $decrementDayTwo == $eventDateJan06 || $decrementDayTwo == $eventDateJan07 || $decrementDayTwo == $eventDateJan08 || $decrementDayTwo == $eventDateJan09 || $decrementDayTwo == $eventDateJan10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_Jan=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }

            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_Jan=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_Jan=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w1 SET at_Jan=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w1 SET at_Jan=$intDateRegularDay, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateJan01 == $intDateHoliday || $eventDateJan02 == $intDateHoliday || $eventDateJan03 == $intDateHoliday || $eventDateJan04 == $intDateHoliday || $eventDateJan05 == $intDateHoliday || $eventDateJan06 == $intDateHoliday || $eventDateJan07 == $intDateHoliday || $eventDateJan08 == $intDateHoliday || $eventDateJan09 == $intDateHoliday || $eventDateJan10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateJan01 || $incrementDayOne == $eventDateJan02 || $incrementDayOne == $eventDateJan03 || $incrementDayOne == $eventDateJan04 || $incrementDayOne == $eventDateJan05 || $incrementDayOne == $eventDateJan06 || $incrementDayOne == $eventDateJan07 || $incrementDayOne == $eventDateJan08 || $incrementDayOne == $eventDateJan09 || $incrementDayOne == $eventDateJan10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJan01 || $decrementDayTwo == $eventDateJan02 || $decrementDayTwo == $eventDateJan03 || $decrementDayTwo == $eventDateJan04 || $decrementDayTwo == $eventDateJan05 || $decrementDayTwo == $eventDateJan06 || $decrementDayTwo == $eventDateJan07 || $decrementDayTwo == $eventDateJan08 || $decrementDayTwo == $eventDateJan09 || $decrementDayTwo == $eventDateJan10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_Jan=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_Jan=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_Jan=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJan01 || $decrementDayTwo == $eventDateJan02 || $decrementDayTwo == $eventDateJan03 || $decrementDayTwo == $eventDateJan04 || $decrementDayTwo == $eventDateJan05 || $decrementDayTwo == $eventDateJan06 || $decrementDayTwo == $eventDateJan07 || $decrementDayTwo == $eventDateJan08 || $decrementDayTwo == $eventDateJan09 || $decrementDayTwo == $eventDateJan10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_Jan=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_Jan=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_Jan=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJan01 || $decrementDayTwo == $eventDateJan02 || $decrementDayTwo == $eventDateJan03 || $decrementDayTwo == $eventDateJan04 || $decrementDayTwo == $eventDateJan05 || $decrementDayTwo == $eventDateJan06 || $decrementDayTwo == $eventDateJan07 || $decrementDayTwo == $eventDateJan08 || $decrementDayTwo == $eventDateJan09 || $decrementDayTwo == $eventDateJan10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_Jan=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_Jan=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_Jan=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w1 SET at_Jan=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w1 SET at_Jan=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_1 SQL START-----//
    $nullSQL = "UPDATE at_schedule_w1 SET at_Jan=NULL, epi_year=$epi_year WHERE at_dateID=9";
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

    if($eventmonth == $intmonth && ($eventDateJan01 == $intDateHoliday || $eventDateJan02 == $intDateHoliday || $eventDateJan03 == $intDateHoliday || $eventDateJan04 == $intDateHoliday || $eventDateJan05 == $intDateHoliday || $eventDateJan06 == $intDateHoliday || $eventDateJan07 == $intDateHoliday || $eventDateJan08 == $intDateHoliday || $eventDateJan09 == $intDateHoliday || $eventDateJan10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateJan01 || $incrementDayOne == $eventDateJan02 || $incrementDayOne == $eventDateJan03 || $incrementDayOne == $eventDateJan04 || $incrementDayOne == $eventDateJan05 || $incrementDayOne == $eventDateJan06 || $incrementDayOne == $eventDateJan07 || $incrementDayOne == $eventDateJan08 || $incrementDayOne == $eventDateJan09 || $incrementDayOne == $eventDateJan10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJan01 || $decrementDayTwo == $eventDateJan02 || $decrementDayTwo == $eventDateJan03 || $decrementDayTwo == $eventDateJan04 || $decrementDayTwo == $eventDateJan05 || $decrementDayTwo == $eventDateJan06 || $decrementDayTwo == $eventDateJan07 || $decrementDayTwo == $eventDateJan08 || $decrementDayTwo == $eventDateJan09 || $decrementDayTwo == $eventDateJan10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_Jan=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJan01 || $decrementDayTwo == $eventDateJan02 || $decrementDayTwo == $eventDateJan03 || $decrementDayTwo == $eventDateJan04 || $decrementDayTwo == $eventDateJan05 || $decrementDayTwo == $eventDateJan06 || $decrementDayTwo == $eventDateJan07 || $decrementDayTwo == $eventDateJan08 || $decrementDayTwo == $eventDateJan09 || $decrementDayTwo == $eventDateJan10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_Jan=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w2 SET at_Jan=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w2 SET at_Jan=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateJan01 == $intDateHoliday || $eventDateJan02 == $intDateHoliday || $eventDateJan03 == $intDateHoliday || $eventDateJan04 == $intDateHoliday || $eventDateJan05 == $intDateHoliday || $eventDateJan06 == $intDateHoliday || $eventDateJan07 == $intDateHoliday || $eventDateJan08 == $intDateHoliday || $eventDateJan09 == $intDateHoliday || $eventDateJan10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateJan01 || $incrementDayOne == $eventDateJan02 || $incrementDayOne == $eventDateJan03 || $incrementDayOne == $eventDateJan04 || $incrementDayOne == $eventDateJan05 || $incrementDayOne == $eventDateJan06 || $incrementDayOne == $eventDateJan07 || $incrementDayOne == $eventDateJan08 || $incrementDayOne == $eventDateJan09 || $incrementDayOne == $eventDateJan10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJan01 || $decrementDayTwo == $eventDateJan02 || $decrementDayTwo == $eventDateJan03 || $decrementDayTwo == $eventDateJan04 || $decrementDayTwo == $eventDateJan05 || $decrementDayTwo == $eventDateJan06 || $decrementDayTwo == $eventDateJan07 || $decrementDayTwo == $eventDateJan08 || $decrementDayTwo == $eventDateJan09 || $decrementDayTwo == $eventDateJan10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_Jan=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJan01 || $decrementDayTwo == $eventDateJan02 || $decrementDayTwo == $eventDateJan03 || $decrementDayTwo == $eventDateJan04 || $decrementDayTwo == $eventDateJan05 || $decrementDayTwo == $eventDateJan06 || $decrementDayTwo == $eventDateJan07 || $decrementDayTwo == $eventDateJan08 || $decrementDayTwo == $eventDateJan09 || $decrementDayTwo == $eventDateJan10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_Jan=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJan01 || $decrementDayTwo == $eventDateJan02 || $decrementDayTwo == $eventDateJan03 || $decrementDayTwo == $eventDateJan04 || $decrementDayTwo == $eventDateJan05 || $decrementDayTwo == $eventDateJan06 || $decrementDayTwo == $eventDateJan07 || $decrementDayTwo == $eventDateJan08 || $decrementDayTwo == $eventDateJan09 || $decrementDayTwo == $eventDateJan10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_Jan=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w2 SET at_Jan=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w2 SET at_Jan=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_2 SQL START-----//
    $nullSQL = "UPDATE at_schedule_w2 SET at_Jan=NULL, epi_year=$epi_year WHERE at_dateID=9";
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

    if($eventmonth == $intmonth && ($eventDateJan01 == $intDateHoliday || $eventDateJan02 == $intDateHoliday || $eventDateJan03 == $intDateHoliday || $eventDateJan04 == $intDateHoliday || $eventDateJan05 == $intDateHoliday || $eventDateJan06 == $intDateHoliday || $eventDateJan07 == $intDateHoliday || $eventDateJan08 == $intDateHoliday || $eventDateJan09 == $intDateHoliday || $eventDateJan10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateJan01 || $incrementDayOne == $eventDateJan02 || $incrementDayOne == $eventDateJan03 || $incrementDayOne == $eventDateJan04 || $incrementDayOne == $eventDateJan05 || $incrementDayOne == $eventDateJan06 || $incrementDayOne == $eventDateJan07 || $incrementDayOne == $eventDateJan08 || $incrementDayOne == $eventDateJan09 || $incrementDayOne == $eventDateJan10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJan01 || $decrementDayTwo == $eventDateJan02 || $decrementDayTwo == $eventDateJan03 || $decrementDayTwo == $eventDateJan04 || $decrementDayTwo == $eventDateJan05 || $decrementDayTwo == $eventDateJan06 || $decrementDayTwo == $eventDateJan07 || $decrementDayTwo == $eventDateJan08 || $decrementDayTwo == $eventDateJan09 || $decrementDayTwo == $eventDateJan10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_Jan=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJan01 || $decrementDayTwo == $eventDateJan02 || $decrementDayTwo == $eventDateJan03 || $decrementDayTwo == $eventDateJan04 || $decrementDayTwo == $eventDateJan05 || $decrementDayTwo == $eventDateJan06 || $decrementDayTwo == $eventDateJan07 || $decrementDayTwo == $eventDateJan08 || $decrementDayTwo == $eventDateJan09 || $decrementDayTwo == $eventDateJan10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_Jan=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w3 SET at_Jan=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w3 SET at_Jan=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateJan01 == $intDateHoliday || $eventDateJan02 == $intDateHoliday || $eventDateJan03 == $intDateHoliday || $eventDateJan04 == $intDateHoliday || $eventDateJan05 == $intDateHoliday || $eventDateJan06 == $intDateHoliday || $eventDateJan07 == $intDateHoliday || $eventDateJan08 == $intDateHoliday || $eventDateJan09 == $intDateHoliday || $eventDateJan10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateJan01 || $incrementDayOne == $eventDateJan02 || $incrementDayOne == $eventDateJan03 || $incrementDayOne == $eventDateJan04 || $incrementDayOne == $eventDateJan05 || $incrementDayOne == $eventDateJan06 || $incrementDayOne == $eventDateJan07 || $incrementDayOne == $eventDateJan08 || $incrementDayOne == $eventDateJan09 || $incrementDayOne == $eventDateJan10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJan01 || $decrementDayTwo == $eventDateJan02 || $decrementDayTwo == $eventDateJan03 || $decrementDayTwo == $eventDateJan04 || $decrementDayTwo == $eventDateJan05 || $decrementDayTwo == $eventDateJan06 || $decrementDayTwo == $eventDateJan07 || $decrementDayTwo == $eventDateJan08 || $decrementDayTwo == $eventDateJan09 || $decrementDayTwo == $eventDateJan10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_Jan=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJan01 || $decrementDayTwo == $eventDateJan02 || $decrementDayTwo == $eventDateJan03 || $decrementDayTwo == $eventDateJan04 || $decrementDayTwo == $eventDateJan05 || $decrementDayTwo == $eventDateJan06 || $decrementDayTwo == $eventDateJan07 || $decrementDayTwo == $eventDateJan08 || $decrementDayTwo == $eventDateJan09 || $decrementDayTwo == $eventDateJan10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_Jan=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateJan01 || $decrementDayTwo == $eventDateJan02 || $decrementDayTwo == $eventDateJan03 || $decrementDayTwo == $eventDateJan04 || $decrementDayTwo == $eventDateJan05 || $decrementDayTwo == $eventDateJan06 || $decrementDayTwo == $eventDateJan07 || $decrementDayTwo == $eventDateJan08 || $decrementDayTwo == $eventDateJan09 || $decrementDayTwo == $eventDateJan10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_Jan=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_Jan=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w3 SET at_Jan=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w3 SET at_Jan=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_3 SQL START-----//
    $nullSQL = "UPDATE at_schedule_w3 SET at_Jan=NULL, epi_year=$epi_year WHERE at_dateID=9";
    $result = mysqli_query($conn, $nullSQL);
    //-----NULL Ward_3 SQL END-----//
}