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
//$eventDateAug01 = 0;
//$eventDateAug02 = 0;
//$eventDateAug03 = 0;
//$eventDateAug04 = 0;
//$eventDateAug05 = 0;
//$eventDateAug06 = 0;
//$eventDateAug07 = 0;
//$eventDateAug08 = 0;
//$eventDateAug09 = 0;
//$eventDateAug10 = 0;

//value fetch from DB
/*$dayOne = "Monday";
$dayTwo = "Thursday";*/
$dayFriday = "Friday";

//value fetch from DB
$month = 8;

//value fetch from DB
/*$epi_year = 2018;*/

//value fetch from DB
$eventmonth = 8;

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

    if($eventmonth == $intmonth && ($eventDateAug01 == $intDateHoliday || $eventDateAug02 == $intDateHoliday || $eventDateAug03 == $intDateHoliday || $eventDateAug04 == $intDateHoliday || $eventDateAug05 == $intDateHoliday || $eventDateAug06 == $intDateHoliday || $eventDateAug07 == $intDateHoliday || $eventDateAug08 == $intDateHoliday || $eventDateAug09 == $intDateHoliday || $eventDateAug10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateAug01 || $incrementDayOne == $eventDateAug02 || $incrementDayOne == $eventDateAug03 || $incrementDayOne == $eventDateAug04 || $incrementDayOne == $eventDateAug05 || $incrementDayOne == $eventDateAug06 || $incrementDayOne == $eventDateAug07 || $incrementDayOne == $eventDateAug08 || $incrementDayOne == $eventDateAug09 || $incrementDayOne == $eventDateAug10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateAug01 || $decrementDayTwo == $eventDateAug02 || $decrementDayTwo == $eventDateAug03 || $decrementDayTwo == $eventDateAug04 || $decrementDayTwo == $eventDateAug05 || $decrementDayTwo == $eventDateAug06 || $decrementDayTwo == $eventDateAug07 || $decrementDayTwo == $eventDateAug08 || $decrementDayTwo == $eventDateAug09 || $decrementDayTwo == $eventDateAug10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_aug=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_aug=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_aug=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateAug01 || $decrementDayTwo == $eventDateAug02 || $decrementDayTwo == $eventDateAug03 || $decrementDayTwo == $eventDateAug04 || $decrementDayTwo == $eventDateAug05 || $decrementDayTwo == $eventDateAug06 || $decrementDayTwo == $eventDateAug07 || $decrementDayTwo == $eventDateAug08 || $decrementDayTwo == $eventDateAug09 || $decrementDayTwo == $eventDateAug10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_aug=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }

            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_aug=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_aug=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w1 SET at_aug=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w1 SET at_aug=$intDateRegularDay, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateAug01 == $intDateHoliday || $eventDateAug02 == $intDateHoliday || $eventDateAug03 == $intDateHoliday || $eventDateAug04 == $intDateHoliday || $eventDateAug05 == $intDateHoliday || $eventDateAug06 == $intDateHoliday || $eventDateAug07 == $intDateHoliday || $eventDateAug08 == $intDateHoliday || $eventDateAug09 == $intDateHoliday || $eventDateAug10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateAug01 || $incrementDayOne == $eventDateAug02 || $incrementDayOne == $eventDateAug03 || $incrementDayOne == $eventDateAug04 || $incrementDayOne == $eventDateAug05 || $incrementDayOne == $eventDateAug06 || $incrementDayOne == $eventDateAug07 || $incrementDayOne == $eventDateAug08 || $incrementDayOne == $eventDateAug09 || $incrementDayOne == $eventDateAug10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateAug01 || $decrementDayTwo == $eventDateAug02 || $decrementDayTwo == $eventDateAug03 || $decrementDayTwo == $eventDateAug04 || $decrementDayTwo == $eventDateAug05 || $decrementDayTwo == $eventDateAug06 || $decrementDayTwo == $eventDateAug07 || $decrementDayTwo == $eventDateAug08 || $decrementDayTwo == $eventDateAug09 || $decrementDayTwo == $eventDateAug10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_aug=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_aug=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_aug=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateAug01 || $decrementDayTwo == $eventDateAug02 || $decrementDayTwo == $eventDateAug03 || $decrementDayTwo == $eventDateAug04 || $decrementDayTwo == $eventDateAug05 || $decrementDayTwo == $eventDateAug06 || $decrementDayTwo == $eventDateAug07 || $decrementDayTwo == $eventDateAug08 || $decrementDayTwo == $eventDateAug09 || $decrementDayTwo == $eventDateAug10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_aug=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_aug=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_aug=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateAug01 || $decrementDayTwo == $eventDateAug02 || $decrementDayTwo == $eventDateAug03 || $decrementDayTwo == $eventDateAug04 || $decrementDayTwo == $eventDateAug05 || $decrementDayTwo == $eventDateAug06 || $decrementDayTwo == $eventDateAug07 || $decrementDayTwo == $eventDateAug08 || $decrementDayTwo == $eventDateAug09 || $decrementDayTwo == $eventDateAug10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_aug=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_aug=$incrementDayThree, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w1 SET at_aug=$decrementDayTwo, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w1 SET at_aug=$incrementDayOne, epi_year=$epi_year, epi_year=$epi_year WHERE at_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w1 SET at_aug=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_1 SQL START-----//
    $nullSQL = "UPDATE at_schedule_w1 SET at_aug=NULL, epi_year=$epi_year WHERE at_dateID=9";
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

    if($eventmonth == $intmonth && ($eventDateAug01 == $intDateHoliday || $eventDateAug02 == $intDateHoliday || $eventDateAug03 == $intDateHoliday || $eventDateAug04 == $intDateHoliday || $eventDateAug05 == $intDateHoliday || $eventDateAug06 == $intDateHoliday || $eventDateAug07 == $intDateHoliday || $eventDateAug08 == $intDateHoliday || $eventDateAug09 == $intDateHoliday || $eventDateAug10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateAug01 || $incrementDayOne == $eventDateAug02 || $incrementDayOne == $eventDateAug03 || $incrementDayOne == $eventDateAug04 || $incrementDayOne == $eventDateAug05 || $incrementDayOne == $eventDateAug06 || $incrementDayOne == $eventDateAug07 || $incrementDayOne == $eventDateAug08 || $incrementDayOne == $eventDateAug09 || $incrementDayOne == $eventDateAug10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateAug01 || $decrementDayTwo == $eventDateAug02 || $decrementDayTwo == $eventDateAug03 || $decrementDayTwo == $eventDateAug04 || $decrementDayTwo == $eventDateAug05 || $decrementDayTwo == $eventDateAug06 || $decrementDayTwo == $eventDateAug07 || $decrementDayTwo == $eventDateAug08 || $decrementDayTwo == $eventDateAug09 || $decrementDayTwo == $eventDateAug10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_aug=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateAug01 || $decrementDayTwo == $eventDateAug02 || $decrementDayTwo == $eventDateAug03 || $decrementDayTwo == $eventDateAug04 || $decrementDayTwo == $eventDateAug05 || $decrementDayTwo == $eventDateAug06 || $decrementDayTwo == $eventDateAug07 || $decrementDayTwo == $eventDateAug08 || $decrementDayTwo == $eventDateAug09 || $decrementDayTwo == $eventDateAug10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_aug=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w2 SET at_aug=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w2 SET at_aug=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateAug01 == $intDateHoliday || $eventDateAug02 == $intDateHoliday || $eventDateAug03 == $intDateHoliday || $eventDateAug04 == $intDateHoliday || $eventDateAug05 == $intDateHoliday || $eventDateAug06 == $intDateHoliday || $eventDateAug07 == $intDateHoliday || $eventDateAug08 == $intDateHoliday || $eventDateAug09 == $intDateHoliday || $eventDateAug10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateAug01 || $incrementDayOne == $eventDateAug02 || $incrementDayOne == $eventDateAug03 || $incrementDayOne == $eventDateAug04 || $incrementDayOne == $eventDateAug05 || $incrementDayOne == $eventDateAug06 || $incrementDayOne == $eventDateAug07 || $incrementDayOne == $eventDateAug08 || $incrementDayOne == $eventDateAug09 || $incrementDayOne == $eventDateAug10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateAug01 || $decrementDayTwo == $eventDateAug02 || $decrementDayTwo == $eventDateAug03 || $decrementDayTwo == $eventDateAug04 || $decrementDayTwo == $eventDateAug05 || $decrementDayTwo == $eventDateAug06 || $decrementDayTwo == $eventDateAug07 || $decrementDayTwo == $eventDateAug08 || $decrementDayTwo == $eventDateAug09 || $decrementDayTwo == $eventDateAug10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_aug=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateAug01 || $decrementDayTwo == $eventDateAug02 || $decrementDayTwo == $eventDateAug03 || $decrementDayTwo == $eventDateAug04 || $decrementDayTwo == $eventDateAug05 || $decrementDayTwo == $eventDateAug06 || $decrementDayTwo == $eventDateAug07 || $decrementDayTwo == $eventDateAug08 || $decrementDayTwo == $eventDateAug09 || $decrementDayTwo == $eventDateAug10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_aug=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateAug01 || $decrementDayTwo == $eventDateAug02 || $decrementDayTwo == $eventDateAug03 || $decrementDayTwo == $eventDateAug04 || $decrementDayTwo == $eventDateAug05 || $decrementDayTwo == $eventDateAug06 || $decrementDayTwo == $eventDateAug07 || $decrementDayTwo == $eventDateAug08 || $decrementDayTwo == $eventDateAug09 || $decrementDayTwo == $eventDateAug10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w2 SET at_aug=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w2 SET at_aug=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w2 SET at_aug=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_2 SQL START-----//
    $nullSQL = "UPDATE at_schedule_w2 SET at_aug=NULL, epi_year=$epi_year WHERE at_dateID=9";
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

    if($eventmonth == $intmonth && ($eventDateAug01 == $intDateHoliday || $eventDateAug02 == $intDateHoliday || $eventDateAug03 == $intDateHoliday || $eventDateAug04 == $intDateHoliday || $eventDateAug05 == $intDateHoliday || $eventDateAug06 == $intDateHoliday || $eventDateAug07 == $intDateHoliday || $eventDateAug08 == $intDateHoliday || $eventDateAug09 == $intDateHoliday || $eventDateAug10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateAug01 || $incrementDayOne == $eventDateAug02 || $incrementDayOne == $eventDateAug03 || $incrementDayOne == $eventDateAug04 || $incrementDayOne == $eventDateAug05 || $incrementDayOne == $eventDateAug06 || $incrementDayOne == $eventDateAug07 || $incrementDayOne == $eventDateAug08 || $incrementDayOne == $eventDateAug09 || $incrementDayOne == $eventDateAug10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateAug01 || $decrementDayTwo == $eventDateAug02 || $decrementDayTwo == $eventDateAug03 || $decrementDayTwo == $eventDateAug04 || $decrementDayTwo == $eventDateAug05 || $decrementDayTwo == $eventDateAug06 || $decrementDayTwo == $eventDateAug07 || $decrementDayTwo == $eventDateAug08 || $decrementDayTwo == $eventDateAug09 || $decrementDayTwo == $eventDateAug10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_aug=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateAug01 || $decrementDayTwo == $eventDateAug02 || $decrementDayTwo == $eventDateAug03 || $decrementDayTwo == $eventDateAug04 || $decrementDayTwo == $eventDateAug05 || $decrementDayTwo == $eventDateAug06 || $decrementDayTwo == $eventDateAug07 || $decrementDayTwo == $eventDateAug08 || $decrementDayTwo == $eventDateAug09 || $decrementDayTwo == $eventDateAug10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_aug=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week1";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w3 SET at_aug=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week1";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w3 SET at_aug=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week1";
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

    if($eventmonth == $intmonth && ($eventDateAug01 == $intDateHoliday || $eventDateAug02 == $intDateHoliday || $eventDateAug03 == $intDateHoliday || $eventDateAug04 == $intDateHoliday || $eventDateAug05 == $intDateHoliday || $eventDateAug06 == $intDateHoliday || $eventDateAug07 == $intDateHoliday || $eventDateAug08 == $intDateHoliday || $eventDateAug09 == $intDateHoliday || $eventDateAug10 == $intDateHoliday))
    {
        $incrementDayOne = $intDateHoliday+1;

        if ($eventmonth == $intmonth && ($incrementDayOne == $eventDateAug01 || $incrementDayOne == $eventDateAug02 || $incrementDayOne == $eventDateAug03 || $incrementDayOne == $eventDateAug04 || $incrementDayOne == $eventDateAug05 || $incrementDayOne == $eventDateAug06 || $incrementDayOne == $eventDateAug07 || $incrementDayOne == $eventDateAug08 || $incrementDayOne == $eventDateAug09 || $incrementDayOne == $eventDateAug10))
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateAug01 || $decrementDayTwo == $eventDateAug02 || $decrementDayTwo == $eventDateAug03 || $decrementDayTwo == $eventDateAug04 || $decrementDayTwo == $eventDateAug05 || $decrementDayTwo == $eventDateAug06 || $decrementDayTwo == $eventDateAug07 || $decrementDayTwo == $eventDateAug08 || $decrementDayTwo == $eventDateAug09 || $decrementDayTwo == $eventDateAug10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_aug=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && $incrementDayOne == $intDateFriday)
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateAug01 || $decrementDayTwo == $eventDateAug02 || $decrementDayTwo == $eventDateAug03 || $decrementDayTwo == $eventDateAug04 || $decrementDayTwo == $eventDateAug05 || $decrementDayTwo == $eventDateAug06 || $decrementDayTwo == $eventDateAug07 || $decrementDayTwo == $eventDateAug08 || $decrementDayTwo == $eventDateAug09 || $decrementDayTwo == $eventDateAug10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_aug=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        elseif ($eventmonth == $intmonth && ($incrementDayOne-7) == $intDateFriday) 
        {
            $decrementDayTwo = $incrementDayOne-2;

            if ($eventmonth == $intmonth && ($decrementDayTwo == $eventDateAug01 || $decrementDayTwo == $eventDateAug02 || $decrementDayTwo == $eventDateAug03 || $decrementDayTwo == $eventDateAug04 || $decrementDayTwo == $eventDateAug05 || $decrementDayTwo == $eventDateAug06 || $decrementDayTwo == $eventDateAug07 || $decrementDayTwo == $eventDateAug08 || $decrementDayTwo == $eventDateAug09 || $decrementDayTwo == $eventDateAug10))
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            elseif ($decrementDayTwo <= 0)
            {
                $incrementDayThree = $decrementDayTwo+3;
                //echo $incrementDayThree;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_aug=$incrementDayThree, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                //echo $decrementDayTwo;
                //echo "<br>";

                //insert data in db
                $sql="UPDATE at_schedule_w3 SET at_aug=$decrementDayTwo, epi_year=$epi_year WHERE at_dateID=$week2";
                $result = mysqli_query($conn, $sql);
            }
        }
        else
        {
            //echo $incrementDayOne;
            //echo "<br>";

            //insert data in db
            $sql="UPDATE at_schedule_w3 SET at_aug=$incrementDayOne, epi_year=$epi_year WHERE at_dateID=$week2";
            $result = mysqli_query($conn, $sql);
        }
    }
    else
    {
        //echo $intDateRegularDay;
        //echo "<br>";

        //insert data in db
        $sql="UPDATE at_schedule_w3 SET at_aug=$intDateRegularDay, epi_year=$epi_year WHERE at_dateID=$week2";
        $result = mysqli_query($conn, $sql);
    }
}

for ($i = 0; $i < 1; $i++)
{
    //-----NULL Ward_3 SQL START-----//
    $nullSQL = "UPDATE at_schedule_w3 SET at_aug=NULL, epi_year=$epi_year WHERE at_dateID=9";
    $result = mysqli_query($conn, $nullSQL);
    //-----NULL Ward_3 SQL END-----//
}