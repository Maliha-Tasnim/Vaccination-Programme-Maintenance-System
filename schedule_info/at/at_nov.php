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
//$eventDateNov01 = 0;
//$eventDateNov02 = 0;
//$eventDateNov03 = 0;
//$eventDateNov04 = 0;
//$eventDateNov05 = 0;
//$eventDateNov06 = 0;
//$eventDateNov07 = 0;
//$eventDateNov08 = 0;
//$eventDateNov09 = 0;
//$eventDateNov10 = 0;

//value fetch from DB
/*$dayOne = "Monday";
$dayTwo = "Thursday";*/
$dayFriday = "Friday";

//value fetch from DB
$month = 11;

//value fetch from DB
/*$epi_year = 2018;*/

//value fetch from DB
$eventmonth = 11;

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

    if($eventmonth == $intmonth && ($eventDateNov01 == $intDateHoliday || $eventDateNov02 == $intDateHoliday || $eventDateNov03 == $intDateHoliday || $eventDateNov04 == $intDateHoliday || $eventDateNov05 == $intDateHoliday || $eventDateNov06 == $intDateHoliday || $eventDateNov07 == $intDateHoliday || $eventDateNov08 == $intDateHoliday || $eventDateNov09 == $intDateHoliday || $eventDateNov10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateNov01 || $incrementDayOne == $eventDateNov02 || $incrementDayOne == $eventDateNov03 || $incrementDayOne == $eventDateNov04 || $incrementDayOne == $eventDateNov05 || $incrementDayOne == $eventDateNov06 || $incrementDayOne == $eventDateNov07 || $incrementDayOne == $eventDateNov08 || $incrementDayOne == $eventDateNov09 || $incrementDayOne == $eventDateNov10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateNov01 || $decrementDayTwo == $eventDateNov02 || $decrementDayTwo == $eventDateNov03 || $decrementDayTwo == $eventDateNov04 || $decrementDayTwo == $eventDateNov05 || $decrementDayTwo == $eventDateNov06 || $decrementDayTwo == $eventDateNov07 || $decrementDayTwo == $eventDateNov08 || $decrementDayTwo == $eventDateNov09 || $decrementDayTwo == $eventDateNov10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_nov=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_nov=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_nov=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateNov01 || $decrementDayTwo == $eventDateNov02 || $decrementDayTwo == $eventDateNov03 || $decrementDayTwo == $eventDateNov04 || $decrementDayTwo == $eventDateNov05 || $decrementDayTwo == $eventDateNov06 || $decrementDayTwo == $eventDateNov07 || $decrementDayTwo == $eventDateNov08 || $decrementDayTwo == $eventDateNov09 || $decrementDayTwo == $eventDateNov10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_nov=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }

            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_nov=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_nov=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w1 SET at_nov=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w1 SET at_nov=$intDateRegularDay, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateNov01 == $intDateHoliday || $eventDateNov02 == $intDateHoliday || $eventDateNov03 == $intDateHoliday || $eventDateNov04 == $intDateHoliday || $eventDateNov05 == $intDateHoliday || $eventDateNov06 == $intDateHoliday || $eventDateNov07 == $intDateHoliday || $eventDateNov08 == $intDateHoliday || $eventDateNov09 == $intDateHoliday || $eventDateNov10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateNov01 || $incrementDayOne == $eventDateNov02 || $incrementDayOne == $eventDateNov03 || $incrementDayOne == $eventDateNov04 || $incrementDayOne == $eventDateNov05 || $incrementDayOne == $eventDateNov06 || $incrementDayOne == $eventDateNov07 || $incrementDayOne == $eventDateNov08 || $incrementDayOne == $eventDateNov09 || $incrementDayOne == $eventDateNov10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateNov01 || $decrementDayTwo == $eventDateNov02 || $decrementDayTwo == $eventDateNov03 || $decrementDayTwo == $eventDateNov04 || $decrementDayTwo == $eventDateNov05 || $decrementDayTwo == $eventDateNov06 || $decrementDayTwo == $eventDateNov07 || $decrementDayTwo == $eventDateNov08 || $decrementDayTwo == $eventDateNov09 || $decrementDayTwo == $eventDateNov10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_nov=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_nov=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_nov=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateNov01 || $decrementDayTwo == $eventDateNov02 || $decrementDayTwo == $eventDateNov03 || $decrementDayTwo == $eventDateNov04 || $decrementDayTwo == $eventDateNov05 || $decrementDayTwo == $eventDateNov06 || $decrementDayTwo == $eventDateNov07 || $decrementDayTwo == $eventDateNov08 || $decrementDayTwo == $eventDateNov09 || $decrementDayTwo == $eventDateNov10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_nov=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_nov=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_nov=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateNov01 || $decrementDayTwo == $eventDateNov02 || $decrementDayTwo == $eventDateNov03 || $decrementDayTwo == $eventDateNov04 || $decrementDayTwo == $eventDateNov05 || $decrementDayTwo == $eventDateNov06 || $decrementDayTwo == $eventDateNov07 || $decrementDayTwo == $eventDateNov08 || $decrementDayTwo == $eventDateNov09 || $decrementDayTwo == $eventDateNov10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_nov=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_nov=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_nov=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w1 SET at_nov=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w1 SET at_nov=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_1 SQL START-----//
    $nullSQL = "UPDATE at_schedule_w1 SET at_nov=NULL, epi_year=$epi_year WHERE at_dateID=9";
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

    if($eventmonth == $intmonth && ($eventDateNov01 == $intDateHoliday || $eventDateNov02 == $intDateHoliday || $eventDateNov03 == $intDateHoliday || $eventDateNov04 == $intDateHoliday || $eventDateNov05 == $intDateHoliday || $eventDateNov06 == $intDateHoliday || $eventDateNov07 == $intDateHoliday || $eventDateNov08 == $intDateHoliday || $eventDateNov09 == $intDateHoliday || $eventDateNov10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateNov01 || $incrementDayOne == $eventDateNov02 || $incrementDayOne == $eventDateNov03 || $incrementDayOne == $eventDateNov04 || $incrementDayOne == $eventDateNov05 || $incrementDayOne == $eventDateNov06 || $incrementDayOne == $eventDateNov07 || $incrementDayOne == $eventDateNov08 || $incrementDayOne == $eventDateNov09 || $incrementDayOne == $eventDateNov10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateNov01 || $decrementDayTwo == $eventDateNov02 || $decrementDayTwo == $eventDateNov03 || $decrementDayTwo == $eventDateNov04 || $decrementDayTwo == $eventDateNov05 || $decrementDayTwo == $eventDateNov06 || $decrementDayTwo == $eventDateNov07 || $decrementDayTwo == $eventDateNov08 || $decrementDayTwo == $eventDateNov09 || $decrementDayTwo == $eventDateNov10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_nov=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateNov01 || $decrementDayTwo == $eventDateNov02 || $decrementDayTwo == $eventDateNov03 || $decrementDayTwo == $eventDateNov04 || $decrementDayTwo == $eventDateNov05 || $decrementDayTwo == $eventDateNov06 || $decrementDayTwo == $eventDateNov07 || $decrementDayTwo == $eventDateNov08 || $decrementDayTwo == $eventDateNov09 || $decrementDayTwo == $eventDateNov10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_nov=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w2 SET at_nov=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w2 SET at_nov=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateNov01 == $intDateHoliday || $eventDateNov02 == $intDateHoliday || $eventDateNov03 == $intDateHoliday || $eventDateNov04 == $intDateHoliday || $eventDateNov05 == $intDateHoliday || $eventDateNov06 == $intDateHoliday || $eventDateNov07 == $intDateHoliday || $eventDateNov08 == $intDateHoliday || $eventDateNov09 == $intDateHoliday || $eventDateNov10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateNov01 || $incrementDayOne == $eventDateNov02 || $incrementDayOne == $eventDateNov03 || $incrementDayOne == $eventDateNov04 || $incrementDayOne == $eventDateNov05 || $incrementDayOne == $eventDateNov06 || $incrementDayOne == $eventDateNov07 || $incrementDayOne == $eventDateNov08 || $incrementDayOne == $eventDateNov09 || $incrementDayOne == $eventDateNov10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateNov01 || $decrementDayTwo == $eventDateNov02 || $decrementDayTwo == $eventDateNov03 || $decrementDayTwo == $eventDateNov04 || $decrementDayTwo == $eventDateNov05 || $decrementDayTwo == $eventDateNov06 || $decrementDayTwo == $eventDateNov07 || $decrementDayTwo == $eventDateNov08 || $decrementDayTwo == $eventDateNov09 || $decrementDayTwo == $eventDateNov10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_nov=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateNov01 || $decrementDayTwo == $eventDateNov02 || $decrementDayTwo == $eventDateNov03 || $decrementDayTwo == $eventDateNov04 || $decrementDayTwo == $eventDateNov05 || $decrementDayTwo == $eventDateNov06 || $decrementDayTwo == $eventDateNov07 || $decrementDayTwo == $eventDateNov08 || $decrementDayTwo == $eventDateNov09 || $decrementDayTwo == $eventDateNov10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_nov=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateNov01 || $decrementDayTwo == $eventDateNov02 || $decrementDayTwo == $eventDateNov03 || $decrementDayTwo == $eventDateNov04 || $decrementDayTwo == $eventDateNov05 || $decrementDayTwo == $eventDateNov06 || $decrementDayTwo == $eventDateNov07 || $decrementDayTwo == $eventDateNov08 || $decrementDayTwo == $eventDateNov09 || $decrementDayTwo == $eventDateNov10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_nov=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w2 SET at_nov=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w2 SET at_nov=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_2 SQL START-----//
    $nullSQL = "UPDATE at_schedule_w2 SET at_nov=NULL, epi_year=$epi_year WHERE at_dateID=9";
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

    if($eventmonth == $intmonth && ($eventDateNov01 == $intDateHoliday || $eventDateNov02 == $intDateHoliday || $eventDateNov03 == $intDateHoliday || $eventDateNov04 == $intDateHoliday || $eventDateNov05 == $intDateHoliday || $eventDateNov06 == $intDateHoliday || $eventDateNov07 == $intDateHoliday || $eventDateNov08 == $intDateHoliday || $eventDateNov09 == $intDateHoliday || $eventDateNov10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateNov01 || $incrementDayOne == $eventDateNov02 || $incrementDayOne == $eventDateNov03 || $incrementDayOne == $eventDateNov04 || $incrementDayOne == $eventDateNov05 || $incrementDayOne == $eventDateNov06 || $incrementDayOne == $eventDateNov07 || $incrementDayOne == $eventDateNov08 || $incrementDayOne == $eventDateNov09 || $incrementDayOne == $eventDateNov10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateNov01 || $decrementDayTwo == $eventDateNov02 || $decrementDayTwo == $eventDateNov03 || $decrementDayTwo == $eventDateNov04 || $decrementDayTwo == $eventDateNov05 || $decrementDayTwo == $eventDateNov06 || $decrementDayTwo == $eventDateNov07 || $decrementDayTwo == $eventDateNov08 || $decrementDayTwo == $eventDateNov09 || $decrementDayTwo == $eventDateNov10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_nov=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateNov01 || $decrementDayTwo == $eventDateNov02 || $decrementDayTwo == $eventDateNov03 || $decrementDayTwo == $eventDateNov04 || $decrementDayTwo == $eventDateNov05 || $decrementDayTwo == $eventDateNov06 || $decrementDayTwo == $eventDateNov07 || $decrementDayTwo == $eventDateNov08 || $decrementDayTwo == $eventDateNov09 || $decrementDayTwo == $eventDateNov10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_nov=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w3 SET at_nov=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w3 SET at_nov=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateNov01 == $intDateHoliday || $eventDateNov02 == $intDateHoliday || $eventDateNov03 == $intDateHoliday || $eventDateNov04 == $intDateHoliday || $eventDateNov05 == $intDateHoliday || $eventDateNov06 == $intDateHoliday || $eventDateNov07 == $intDateHoliday || $eventDateNov08 == $intDateHoliday || $eventDateNov09 == $intDateHoliday || $eventDateNov10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateNov01 || $incrementDayOne == $eventDateNov02 || $incrementDayOne == $eventDateNov03 || $incrementDayOne == $eventDateNov04 || $incrementDayOne == $eventDateNov05 || $incrementDayOne == $eventDateNov06 || $incrementDayOne == $eventDateNov07 || $incrementDayOne == $eventDateNov08 || $incrementDayOne == $eventDateNov09 || $incrementDayOne == $eventDateNov10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateNov01 || $decrementDayTwo == $eventDateNov02 || $decrementDayTwo == $eventDateNov03 || $decrementDayTwo == $eventDateNov04 || $decrementDayTwo == $eventDateNov05 || $decrementDayTwo == $eventDateNov06 || $decrementDayTwo == $eventDateNov07 || $decrementDayTwo == $eventDateNov08 || $decrementDayTwo == $eventDateNov09 || $decrementDayTwo == $eventDateNov10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_nov=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateNov01 || $decrementDayTwo == $eventDateNov02 || $decrementDayTwo == $eventDateNov03 || $decrementDayTwo == $eventDateNov04 || $decrementDayTwo == $eventDateNov05 || $decrementDayTwo == $eventDateNov06 || $decrementDayTwo == $eventDateNov07 || $decrementDayTwo == $eventDateNov08 || $decrementDayTwo == $eventDateNov09 || $decrementDayTwo == $eventDateNov10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_nov=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateNov01 || $decrementDayTwo == $eventDateNov02 || $decrementDayTwo == $eventDateNov03 || $decrementDayTwo == $eventDateNov04 || $decrementDayTwo == $eventDateNov05 || $decrementDayTwo == $eventDateNov06 || $decrementDayTwo == $eventDateNov07 || $decrementDayTwo == $eventDateNov08 || $decrementDayTwo == $eventDateNov09 || $decrementDayTwo == $eventDateNov10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_nov=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_nov=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w3 SET at_nov=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w3 SET at_nov=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_3 SQL START-----//
    $nullSQL = "UPDATE at_schedule_w3 SET at_nov=NULL, epi_year=$epi_year WHERE at_dateID=9";
    $result = mysqli_query($conn, $nullSQL);
    //-----NULL Ward_3 SQL END-----//
}