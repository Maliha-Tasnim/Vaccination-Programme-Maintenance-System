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
//$eventDateSep01 = 0;
//$eventDateSep02 = 0;
//$eventDateSep03 = 0;
//$eventDateSep04 = 0;
//$eventDateSep05 = 0;
//$eventDateSep06 = 0;
//$eventDateSep07 = 0;
//$eventDateSep08 = 0;
//$eventDateSep09 = 0;
//$eventDateSep10 = 0;

//value fetch from DB
/*$dayOne = "Monday";
$dayTwo = "Thursday";*/
$dayFriday = "Friday";

//value fetch from DB
$month = 9;

//value fetch from DB
/*$epi_year = 2018;*/

//value fetch from DB
$eventmonth = 9;

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

    if($eventmonth == $intmonth && ($eventDateSep01 == $intDateHoliday || $eventDateSep02 == $intDateHoliday || $eventDateSep03 == $intDateHoliday || $eventDateSep04 == $intDateHoliday || $eventDateSep05 == $intDateHoliday || $eventDateSep06 == $intDateHoliday || $eventDateSep07 == $intDateHoliday || $eventDateSep08 == $intDateHoliday || $eventDateSep09 == $intDateHoliday || $eventDateSep10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateSep01 || $incrementDayOne == $eventDateSep02 || $incrementDayOne == $eventDateSep03 || $incrementDayOne == $eventDateSep04 || $incrementDayOne == $eventDateSep05 || $incrementDayOne == $eventDateSep06 || $incrementDayOne == $eventDateSep07 || $incrementDayOne == $eventDateSep08 || $incrementDayOne == $eventDateSep09 || $incrementDayOne == $eventDateSep10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateSep01 || $decrementDayTwo == $eventDateSep02 || $decrementDayTwo == $eventDateSep03 || $decrementDayTwo == $eventDateSep04 || $decrementDayTwo == $eventDateSep05 || $decrementDayTwo == $eventDateSep06 || $decrementDayTwo == $eventDateSep07 || $decrementDayTwo == $eventDateSep08 || $decrementDayTwo == $eventDateSep09 || $decrementDayTwo == $eventDateSep10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_sep=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_sep=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_sep=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateSep01 || $decrementDayTwo == $eventDateSep02 || $decrementDayTwo == $eventDateSep03 || $decrementDayTwo == $eventDateSep04 || $decrementDayTwo == $eventDateSep05 || $decrementDayTwo == $eventDateSep06 || $decrementDayTwo == $eventDateSep07 || $decrementDayTwo == $eventDateSep08 || $decrementDayTwo == $eventDateSep09 || $decrementDayTwo == $eventDateSep10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_sep=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }

            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_sep=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_sep=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE sw_schedule_w1 SET sw_sep=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE sw_schedule_w1 SET sw_sep=$intDateRegularDay, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateSep01 == $intDateHoliday || $eventDateSep02 == $intDateHoliday || $eventDateSep03 == $intDateHoliday || $eventDateSep04 == $intDateHoliday || $eventDateSep05 == $intDateHoliday || $eventDateSep06 == $intDateHoliday || $eventDateSep07 == $intDateHoliday || $eventDateSep08 == $intDateHoliday || $eventDateSep09 == $intDateHoliday || $eventDateSep10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateSep01 || $incrementDayOne == $eventDateSep02 || $incrementDayOne == $eventDateSep03 || $incrementDayOne == $eventDateSep04 || $incrementDayOne == $eventDateSep05 || $incrementDayOne == $eventDateSep06 || $incrementDayOne == $eventDateSep07 || $incrementDayOne == $eventDateSep08 || $incrementDayOne == $eventDateSep09 || $incrementDayOne == $eventDateSep10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateSep01 || $decrementDayTwo == $eventDateSep02 || $decrementDayTwo == $eventDateSep03 || $decrementDayTwo == $eventDateSep04 || $decrementDayTwo == $eventDateSep05 || $decrementDayTwo == $eventDateSep06 || $decrementDayTwo == $eventDateSep07 || $decrementDayTwo == $eventDateSep08 || $decrementDayTwo == $eventDateSep09 || $decrementDayTwo == $eventDateSep10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_sep=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_sep=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_sep=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateSep01 || $decrementDayTwo == $eventDateSep02 || $decrementDayTwo == $eventDateSep03 || $decrementDayTwo == $eventDateSep04 || $decrementDayTwo == $eventDateSep05 || $decrementDayTwo == $eventDateSep06 || $decrementDayTwo == $eventDateSep07 || $decrementDayTwo == $eventDateSep08 || $decrementDayTwo == $eventDateSep09 || $decrementDayTwo == $eventDateSep10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_sep=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_sep=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_sep=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateSep01 || $decrementDayTwo == $eventDateSep02 || $decrementDayTwo == $eventDateSep03 || $decrementDayTwo == $eventDateSep04 || $decrementDayTwo == $eventDateSep05 || $decrementDayTwo == $eventDateSep06 || $decrementDayTwo == $eventDateSep07 || $decrementDayTwo == $eventDateSep08 || $decrementDayTwo == $eventDateSep09 || $decrementDayTwo == $eventDateSep10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_sep=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_sep=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w1 SET sw_sep=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE sw_schedule_w1 SET sw_sep=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE sw_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE sw_schedule_w1 SET sw_sep=$intDateRegularDay, epi_year=$epi_year WHERE sw_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_1 SQL START-----//
    $nullSQL = "UPDATE sw_schedule_w1 SET sw_sep=NULL, epi_year=$epi_year WHERE sw_dateID=9";
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

    if($eventmonth == $intmonth && ($eventDateSep01 == $intDateHoliday || $eventDateSep02 == $intDateHoliday || $eventDateSep03 == $intDateHoliday || $eventDateSep04 == $intDateHoliday || $eventDateSep05 == $intDateHoliday || $eventDateSep06 == $intDateHoliday || $eventDateSep07 == $intDateHoliday || $eventDateSep08 == $intDateHoliday || $eventDateSep09 == $intDateHoliday || $eventDateSep10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateSep01 || $incrementDayOne == $eventDateSep02 || $incrementDayOne == $eventDateSep03 || $incrementDayOne == $eventDateSep04 || $incrementDayOne == $eventDateSep05 || $incrementDayOne == $eventDateSep06 || $incrementDayOne == $eventDateSep07 || $incrementDayOne == $eventDateSep08 || $incrementDayOne == $eventDateSep09 || $incrementDayOne == $eventDateSep10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateSep01 || $decrementDayTwo == $eventDateSep02 || $decrementDayTwo == $eventDateSep03 || $decrementDayTwo == $eventDateSep04 || $decrementDayTwo == $eventDateSep05 || $decrementDayTwo == $eventDateSep06 || $decrementDayTwo == $eventDateSep07 || $decrementDayTwo == $eventDateSep08 || $decrementDayTwo == $eventDateSep09 || $decrementDayTwo == $eventDateSep10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_sep=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateSep01 || $decrementDayTwo == $eventDateSep02 || $decrementDayTwo == $eventDateSep03 || $decrementDayTwo == $eventDateSep04 || $decrementDayTwo == $eventDateSep05 || $decrementDayTwo == $eventDateSep06 || $decrementDayTwo == $eventDateSep07 || $decrementDayTwo == $eventDateSep08 || $decrementDayTwo == $eventDateSep09 || $decrementDayTwo == $eventDateSep10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_sep=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE sw_schedule_w2 SET sw_sep=$incrementDayOne, epi_year=$epi_year WHERE sw_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE sw_schedule_w2 SET sw_sep=$intDateRegularDay, epi_year=$epi_year WHERE sw_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateSep01 == $intDateHoliday || $eventDateSep02 == $intDateHoliday || $eventDateSep03 == $intDateHoliday || $eventDateSep04 == $intDateHoliday || $eventDateSep05 == $intDateHoliday || $eventDateSep06 == $intDateHoliday || $eventDateSep07 == $intDateHoliday || $eventDateSep08 == $intDateHoliday || $eventDateSep09 == $intDateHoliday || $eventDateSep10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateSep01 || $incrementDayOne == $eventDateSep02 || $incrementDayOne == $eventDateSep03 || $incrementDayOne == $eventDateSep04 || $incrementDayOne == $eventDateSep05 || $incrementDayOne == $eventDateSep06 || $incrementDayOne == $eventDateSep07 || $incrementDayOne == $eventDateSep08 || $incrementDayOne == $eventDateSep09 || $incrementDayOne == $eventDateSep10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateSep01 || $decrementDayTwo == $eventDateSep02 || $decrementDayTwo == $eventDateSep03 || $decrementDayTwo == $eventDateSep04 || $decrementDayTwo == $eventDateSep05 || $decrementDayTwo == $eventDateSep06 || $decrementDayTwo == $eventDateSep07 || $decrementDayTwo == $eventDateSep08 || $decrementDayTwo == $eventDateSep09 || $decrementDayTwo == $eventDateSep10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_sep=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateSep01 || $decrementDayTwo == $eventDateSep02 || $decrementDayTwo == $eventDateSep03 || $decrementDayTwo == $eventDateSep04 || $decrementDayTwo == $eventDateSep05 || $decrementDayTwo == $eventDateSep06 || $decrementDayTwo == $eventDateSep07 || $decrementDayTwo == $eventDateSep08 || $decrementDayTwo == $eventDateSep09 || $decrementDayTwo == $eventDateSep10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_sep=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateSep01 || $decrementDayTwo == $eventDateSep02 || $decrementDayTwo == $eventDateSep03 || $decrementDayTwo == $eventDateSep04 || $decrementDayTwo == $eventDateSep05 || $decrementDayTwo == $eventDateSep06 || $decrementDayTwo == $eventDateSep07 || $decrementDayTwo == $eventDateSep08 || $decrementDayTwo == $eventDateSep09 || $decrementDayTwo == $eventDateSep10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w2 SET sw_sep=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE sw_schedule_w2 SET sw_sep=$incrementDayOne, epi_year=$epi_year WHERE sw_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE sw_schedule_w2 SET sw_sep=$intDateRegularDay, epi_year=$epi_year WHERE sw_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_2 SQL START-----//
    $nullSQL = "UPDATE sw_schedule_w2 SET sw_sep=NULL, epi_year=$epi_year WHERE sw_dateID=9";
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

    if($eventmonth == $intmonth && ($eventDateSep01 == $intDateHoliday || $eventDateSep02 == $intDateHoliday || $eventDateSep03 == $intDateHoliday || $eventDateSep04 == $intDateHoliday || $eventDateSep05 == $intDateHoliday || $eventDateSep06 == $intDateHoliday || $eventDateSep07 == $intDateHoliday || $eventDateSep08 == $intDateHoliday || $eventDateSep09 == $intDateHoliday || $eventDateSep10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateSep01 || $incrementDayOne == $eventDateSep02 || $incrementDayOne == $eventDateSep03 || $incrementDayOne == $eventDateSep04 || $incrementDayOne == $eventDateSep05 || $incrementDayOne == $eventDateSep06 || $incrementDayOne == $eventDateSep07 || $incrementDayOne == $eventDateSep08 || $incrementDayOne == $eventDateSep09 || $incrementDayOne == $eventDateSep10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateSep01 || $decrementDayTwo == $eventDateSep02 || $decrementDayTwo == $eventDateSep03 || $decrementDayTwo == $eventDateSep04 || $decrementDayTwo == $eventDateSep05 || $decrementDayTwo == $eventDateSep06 || $decrementDayTwo == $eventDateSep07 || $decrementDayTwo == $eventDateSep08 || $decrementDayTwo == $eventDateSep09 || $decrementDayTwo == $eventDateSep10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_sep=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateSep01 || $decrementDayTwo == $eventDateSep02 || $decrementDayTwo == $eventDateSep03 || $decrementDayTwo == $eventDateSep04 || $decrementDayTwo == $eventDateSep05 || $decrementDayTwo == $eventDateSep06 || $decrementDayTwo == $eventDateSep07 || $decrementDayTwo == $eventDateSep08 || $decrementDayTwo == $eventDateSep09 || $decrementDayTwo == $eventDateSep10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_sep=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE sw_schedule_w3 SET sw_sep=$incrementDayOne, epi_year=$epi_year WHERE sw_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE sw_schedule_w3 SET sw_sep=$intDateRegularDay, epi_year=$epi_year WHERE sw_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateSep01 == $intDateHoliday || $eventDateSep02 == $intDateHoliday || $eventDateSep03 == $intDateHoliday || $eventDateSep04 == $intDateHoliday || $eventDateSep05 == $intDateHoliday || $eventDateSep06 == $intDateHoliday || $eventDateSep07 == $intDateHoliday || $eventDateSep08 == $intDateHoliday || $eventDateSep09 == $intDateHoliday || $eventDateSep10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateSep01 || $incrementDayOne == $eventDateSep02 || $incrementDayOne == $eventDateSep03 || $incrementDayOne == $eventDateSep04 || $incrementDayOne == $eventDateSep05 || $incrementDayOne == $eventDateSep06 || $incrementDayOne == $eventDateSep07 || $incrementDayOne == $eventDateSep08 || $incrementDayOne == $eventDateSep09 || $incrementDayOne == $eventDateSep10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateSep01 || $decrementDayTwo == $eventDateSep02 || $decrementDayTwo == $eventDateSep03 || $decrementDayTwo == $eventDateSep04 || $decrementDayTwo == $eventDateSep05 || $decrementDayTwo == $eventDateSep06 || $decrementDayTwo == $eventDateSep07 || $decrementDayTwo == $eventDateSep08 || $decrementDayTwo == $eventDateSep09 || $decrementDayTwo == $eventDateSep10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_sep=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateSep01 || $decrementDayTwo == $eventDateSep02 || $decrementDayTwo == $eventDateSep03 || $decrementDayTwo == $eventDateSep04 || $decrementDayTwo == $eventDateSep05 || $decrementDayTwo == $eventDateSep06 || $decrementDayTwo == $eventDateSep07 || $decrementDayTwo == $eventDateSep08 || $decrementDayTwo == $eventDateSep09 || $decrementDayTwo == $eventDateSep10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_sep=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateSep01 || $decrementDayTwo == $eventDateSep02 || $decrementDayTwo == $eventDateSep03 || $decrementDayTwo == $eventDateSep04 || $decrementDayTwo == $eventDateSep05 || $decrementDayTwo == $eventDateSep06 || $decrementDayTwo == $eventDateSep07 || $decrementDayTwo == $eventDateSep08 || $decrementDayTwo == $eventDateSep09 || $decrementDayTwo == $eventDateSep10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_sep=$incrementDayThree, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE sw_schedule_w3 SET sw_sep=$decrementDayTwo, epi_year=$epi_year WHERE sw_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE sw_schedule_w3 SET sw_sep=$incrementDayOne, epi_year=$epi_year WHERE sw_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE sw_schedule_w3 SET sw_sep=$intDateRegularDay, epi_year=$epi_year WHERE sw_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_3 SQL START-----//
    $nullSQL = "UPDATE sw_schedule_w3 SET sw_sep=NULL, epi_year=$epi_year WHERE sw_dateID=9";
    $result = mysqli_query($conn, $nullSQL);
    //-----NULL Ward_3 SQL END-----//
}