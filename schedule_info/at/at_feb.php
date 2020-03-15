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
//$eventDateFeb01 = 0;
//$eventDateFeb02 = 0;
//$eventDateFeb03 = 0;
//$eventDateFeb04 = 0;
//$eventDateFeb05 = 0;
//$eventDateFeb06 = 0;
//$eventDateFeb07 = 0;
//$eventDateFeb08 = 0;
//$eventDateFeb09 = 0;
//$eventDateFeb10 = 0;

//value fetch from DB
/*$dayOne = "Monday";
$dayTwo = "Thursday";*/
$dayFriday = "Friday";

//value fetch from DB
$month = 2;

//value fetch from DB
/*$epi_year = 2018;*/

//value fetch from DB
$eventmonth = 2;

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

    if($eventmonth == $intmonth && ($eventDateFeb01 == $intDateHoliday || $eventDateFeb02 == $intDateHoliday || $eventDateFeb03 == $intDateHoliday || $eventDateFeb04 == $intDateHoliday || $eventDateFeb05 == $intDateHoliday || $eventDateFeb06 == $intDateHoliday || $eventDateFeb07 == $intDateHoliday || $eventDateFeb08 == $intDateHoliday || $eventDateFeb09 == $intDateHoliday || $eventDateFeb10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateFeb01 || $incrementDayOne == $eventDateFeb02 || $incrementDayOne == $eventDateFeb03 || $incrementDayOne == $eventDateFeb04 || $incrementDayOne == $eventDateFeb05 || $incrementDayOne == $eventDateFeb06 || $incrementDayOne == $eventDateFeb07 || $incrementDayOne == $eventDateFeb08 || $incrementDayOne == $eventDateFeb09 || $incrementDayOne == $eventDateFeb10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateFeb01 || $decrementDayTwo == $eventDateFeb02 || $decrementDayTwo == $eventDateFeb03 || $decrementDayTwo == $eventDateFeb04 || $decrementDayTwo == $eventDateFeb05 || $decrementDayTwo == $eventDateFeb06 || $decrementDayTwo == $eventDateFeb07 || $decrementDayTwo == $eventDateFeb08 || $decrementDayTwo == $eventDateFeb09 || $decrementDayTwo == $eventDateFeb10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_feb=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_feb=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_feb=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateFeb01 || $decrementDayTwo == $eventDateFeb02 || $decrementDayTwo == $eventDateFeb03 || $decrementDayTwo == $eventDateFeb04 || $decrementDayTwo == $eventDateFeb05 || $decrementDayTwo == $eventDateFeb06 || $decrementDayTwo == $eventDateFeb07 || $decrementDayTwo == $eventDateFeb08 || $decrementDayTwo == $eventDateFeb09 || $decrementDayTwo == $eventDateFeb10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_feb=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }

            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_feb=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_feb=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w1 SET at_feb=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w1 SET at_feb=$intDateRegularDay, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateFeb01 == $intDateHoliday || $eventDateFeb02 == $intDateHoliday || $eventDateFeb03 == $intDateHoliday || $eventDateFeb04 == $intDateHoliday || $eventDateFeb05 == $intDateHoliday || $eventDateFeb06 == $intDateHoliday || $eventDateFeb07 == $intDateHoliday || $eventDateFeb08 == $intDateHoliday || $eventDateFeb09 == $intDateHoliday || $eventDateFeb10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateFeb01 || $incrementDayOne == $eventDateFeb02 || $incrementDayOne == $eventDateFeb03 || $incrementDayOne == $eventDateFeb04 || $incrementDayOne == $eventDateFeb05 || $incrementDayOne == $eventDateFeb06 || $incrementDayOne == $eventDateFeb07 || $incrementDayOne == $eventDateFeb08 || $incrementDayOne == $eventDateFeb09 || $incrementDayOne == $eventDateFeb10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateFeb01 || $decrementDayTwo == $eventDateFeb02 || $decrementDayTwo == $eventDateFeb03 || $decrementDayTwo == $eventDateFeb04 || $decrementDayTwo == $eventDateFeb05 || $decrementDayTwo == $eventDateFeb06 || $decrementDayTwo == $eventDateFeb07 || $decrementDayTwo == $eventDateFeb08 || $decrementDayTwo == $eventDateFeb09 || $decrementDayTwo == $eventDateFeb10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_feb=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_feb=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_feb=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateFeb01 || $decrementDayTwo == $eventDateFeb02 || $decrementDayTwo == $eventDateFeb03 || $decrementDayTwo == $eventDateFeb04 || $decrementDayTwo == $eventDateFeb05 || $decrementDayTwo == $eventDateFeb06 || $decrementDayTwo == $eventDateFeb07 || $decrementDayTwo == $eventDateFeb08 || $decrementDayTwo == $eventDateFeb09 || $decrementDayTwo == $eventDateFeb10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_feb=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_feb=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_feb=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateFeb01 || $decrementDayTwo == $eventDateFeb02 || $decrementDayTwo == $eventDateFeb03 || $decrementDayTwo == $eventDateFeb04 || $decrementDayTwo == $eventDateFeb05 || $decrementDayTwo == $eventDateFeb06 || $decrementDayTwo == $eventDateFeb07 || $decrementDayTwo == $eventDateFeb08 || $decrementDayTwo == $eventDateFeb09 || $decrementDayTwo == $eventDateFeb10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_feb=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_feb=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_feb=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w1 SET at_feb=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w1 SET at_feb=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_1 SQL START-----//
    $nullSQL = "UPDATE at_schedule_w1 SET at_feb=NULL, epi_year=$epi_year WHERE at_dateID=9";
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

    if($eventmonth == $intmonth && ($eventDateFeb01 == $intDateHoliday || $eventDateFeb02 == $intDateHoliday || $eventDateFeb03 == $intDateHoliday || $eventDateFeb04 == $intDateHoliday || $eventDateFeb05 == $intDateHoliday || $eventDateFeb06 == $intDateHoliday || $eventDateFeb07 == $intDateHoliday || $eventDateFeb08 == $intDateHoliday || $eventDateFeb09 == $intDateHoliday || $eventDateFeb10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateFeb01 || $incrementDayOne == $eventDateFeb02 || $incrementDayOne == $eventDateFeb03 || $incrementDayOne == $eventDateFeb04 || $incrementDayOne == $eventDateFeb05 || $incrementDayOne == $eventDateFeb06 || $incrementDayOne == $eventDateFeb07 || $incrementDayOne == $eventDateFeb08 || $incrementDayOne == $eventDateFeb09 || $incrementDayOne == $eventDateFeb10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateFeb01 || $decrementDayTwo == $eventDateFeb02 || $decrementDayTwo == $eventDateFeb03 || $decrementDayTwo == $eventDateFeb04 || $decrementDayTwo == $eventDateFeb05 || $decrementDayTwo == $eventDateFeb06 || $decrementDayTwo == $eventDateFeb07 || $decrementDayTwo == $eventDateFeb08 || $decrementDayTwo == $eventDateFeb09 || $decrementDayTwo == $eventDateFeb10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_feb=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateFeb01 || $decrementDayTwo == $eventDateFeb02 || $decrementDayTwo == $eventDateFeb03 || $decrementDayTwo == $eventDateFeb04 || $decrementDayTwo == $eventDateFeb05 || $decrementDayTwo == $eventDateFeb06 || $decrementDayTwo == $eventDateFeb07 || $decrementDayTwo == $eventDateFeb08 || $decrementDayTwo == $eventDateFeb09 || $decrementDayTwo == $eventDateFeb10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_feb=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w2 SET at_feb=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w2 SET at_feb=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateFeb01 == $intDateHoliday || $eventDateFeb02 == $intDateHoliday || $eventDateFeb03 == $intDateHoliday || $eventDateFeb04 == $intDateHoliday || $eventDateFeb05 == $intDateHoliday || $eventDateFeb06 == $intDateHoliday || $eventDateFeb07 == $intDateHoliday || $eventDateFeb08 == $intDateHoliday || $eventDateFeb09 == $intDateHoliday || $eventDateFeb10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateFeb01 || $incrementDayOne == $eventDateFeb02 || $incrementDayOne == $eventDateFeb03 || $incrementDayOne == $eventDateFeb04 || $incrementDayOne == $eventDateFeb05 || $incrementDayOne == $eventDateFeb06 || $incrementDayOne == $eventDateFeb07 || $incrementDayOne == $eventDateFeb08 || $incrementDayOne == $eventDateFeb09 || $incrementDayOne == $eventDateFeb10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateFeb01 || $decrementDayTwo == $eventDateFeb02 || $decrementDayTwo == $eventDateFeb03 || $decrementDayTwo == $eventDateFeb04 || $decrementDayTwo == $eventDateFeb05 || $decrementDayTwo == $eventDateFeb06 || $decrementDayTwo == $eventDateFeb07 || $decrementDayTwo == $eventDateFeb08 || $decrementDayTwo == $eventDateFeb09 || $decrementDayTwo == $eventDateFeb10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_feb=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateFeb01 || $decrementDayTwo == $eventDateFeb02 || $decrementDayTwo == $eventDateFeb03 || $decrementDayTwo == $eventDateFeb04 || $decrementDayTwo == $eventDateFeb05 || $decrementDayTwo == $eventDateFeb06 || $decrementDayTwo == $eventDateFeb07 || $decrementDayTwo == $eventDateFeb08 || $decrementDayTwo == $eventDateFeb09 || $decrementDayTwo == $eventDateFeb10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_feb=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateFeb01 || $decrementDayTwo == $eventDateFeb02 || $decrementDayTwo == $eventDateFeb03 || $decrementDayTwo == $eventDateFeb04 || $decrementDayTwo == $eventDateFeb05 || $decrementDayTwo == $eventDateFeb06 || $decrementDayTwo == $eventDateFeb07 || $decrementDayTwo == $eventDateFeb08 || $decrementDayTwo == $eventDateFeb09 || $decrementDayTwo == $eventDateFeb10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_feb=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w2 SET at_feb=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w2 SET at_feb=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_2 SQL START-----//
    $nullSQL = "UPDATE at_schedule_w2 SET at_feb=NULL, epi_year=$epi_year WHERE at_dateID=9";
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

    if($eventmonth == $intmonth && ($eventDateFeb01 == $intDateHoliday || $eventDateFeb02 == $intDateHoliday || $eventDateFeb03 == $intDateHoliday || $eventDateFeb04 == $intDateHoliday || $eventDateFeb05 == $intDateHoliday || $eventDateFeb06 == $intDateHoliday || $eventDateFeb07 == $intDateHoliday || $eventDateFeb08 == $intDateHoliday || $eventDateFeb09 == $intDateHoliday || $eventDateFeb10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateFeb01 || $incrementDayOne == $eventDateFeb02 || $incrementDayOne == $eventDateFeb03 || $incrementDayOne == $eventDateFeb04 || $incrementDayOne == $eventDateFeb05 || $incrementDayOne == $eventDateFeb06 || $incrementDayOne == $eventDateFeb07 || $incrementDayOne == $eventDateFeb08 || $incrementDayOne == $eventDateFeb09 || $incrementDayOne == $eventDateFeb10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateFeb01 || $decrementDayTwo == $eventDateFeb02 || $decrementDayTwo == $eventDateFeb03 || $decrementDayTwo == $eventDateFeb04 || $decrementDayTwo == $eventDateFeb05 || $decrementDayTwo == $eventDateFeb06 || $decrementDayTwo == $eventDateFeb07 || $decrementDayTwo == $eventDateFeb08 || $decrementDayTwo == $eventDateFeb09 || $decrementDayTwo == $eventDateFeb10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_feb=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateFeb01 || $decrementDayTwo == $eventDateFeb02 || $decrementDayTwo == $eventDateFeb03 || $decrementDayTwo == $eventDateFeb04 || $decrementDayTwo == $eventDateFeb05 || $decrementDayTwo == $eventDateFeb06 || $decrementDayTwo == $eventDateFeb07 || $decrementDayTwo == $eventDateFeb08 || $decrementDayTwo == $eventDateFeb09 || $decrementDayTwo == $eventDateFeb10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_feb=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w3 SET at_feb=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w3 SET at_feb=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateFeb01 == $intDateHoliday || $eventDateFeb02 == $intDateHoliday || $eventDateFeb03 == $intDateHoliday || $eventDateFeb04 == $intDateHoliday || $eventDateFeb05 == $intDateHoliday || $eventDateFeb06 == $intDateHoliday || $eventDateFeb07 == $intDateHoliday || $eventDateFeb08 == $intDateHoliday || $eventDateFeb09 == $intDateHoliday || $eventDateFeb10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateFeb01 || $incrementDayOne == $eventDateFeb02 || $incrementDayOne == $eventDateFeb03 || $incrementDayOne == $eventDateFeb04 || $incrementDayOne == $eventDateFeb05 || $incrementDayOne == $eventDateFeb06 || $incrementDayOne == $eventDateFeb07 || $incrementDayOne == $eventDateFeb08 || $incrementDayOne == $eventDateFeb09 || $incrementDayOne == $eventDateFeb10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateFeb01 || $decrementDayTwo == $eventDateFeb02 || $decrementDayTwo == $eventDateFeb03 || $decrementDayTwo == $eventDateFeb04 || $decrementDayTwo == $eventDateFeb05 || $decrementDayTwo == $eventDateFeb06 || $decrementDayTwo == $eventDateFeb07 || $decrementDayTwo == $eventDateFeb08 || $decrementDayTwo == $eventDateFeb09 || $decrementDayTwo == $eventDateFeb10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_feb=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateFeb01 || $decrementDayTwo == $eventDateFeb02 || $decrementDayTwo == $eventDateFeb03 || $decrementDayTwo == $eventDateFeb04 || $decrementDayTwo == $eventDateFeb05 || $decrementDayTwo == $eventDateFeb06 || $decrementDayTwo == $eventDateFeb07 || $decrementDayTwo == $eventDateFeb08 || $decrementDayTwo == $eventDateFeb09 || $decrementDayTwo == $eventDateFeb10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_feb=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateFeb01 || $decrementDayTwo == $eventDateFeb02 || $decrementDayTwo == $eventDateFeb03 || $decrementDayTwo == $eventDateFeb04 || $decrementDayTwo == $eventDateFeb05 || $decrementDayTwo == $eventDateFeb06 || $decrementDayTwo == $eventDateFeb07 || $decrementDayTwo == $eventDateFeb08 || $decrementDayTwo == $eventDateFeb09 || $decrementDayTwo == $eventDateFeb10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_feb=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_feb=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w3 SET at_feb=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w3 SET at_feb=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_3 SQL START-----//
    $nullSQL = "UPDATE at_schedule_w3 SET at_feb=NULL, epi_year=$epi_year WHERE at_dateID=9";
    $result = mysqli_query($conn, $nullSQL);
    //-----NULL Ward_3 SQL END-----//
}