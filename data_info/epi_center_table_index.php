<?php
$page_title = 'EPI Schedule Session';
require_once('../load.php');
?>

<?php
// Checkin What level user has permission to view this page
page_require_level(3);
//pull out all user form database
$all_users = find_all_user();
?>

<?php include_once('../header.php');?>
<?php
$conn = mysqli_connect("localhost", "root", "", "central_db");

global $year;
$sqlYear = "SELECT epi_year_es FROM epi_schedule_temp";
$resultYear = mysqli_query($conn, $sqlYear);
while($row = $resultYear->fetch_assoc())
   $year = $row["epi_year_es"];

global $schedule_id;
$sqlSchedule = "SELECT schedule_id FROM epi_schedule_temp";
$resultSchedule = mysqli_query($conn, $sqlSchedule);
while($row = $resultSchedule->fetch_assoc())
   $schedule_id = $row["schedule_id"];

//no more duplication in final schedule
global $year_duplication;
$sqlYear_duplication = "SELECT epi_year_es FROM epi_schedule_temp";
$resultYear_duplication = mysqli_query($conn, $sqlYear_duplication);
while($row = $resultYear_duplication->fetch_assoc())
   $year_duplication = $row["epi_year_es"];

global $union_duplication;
$sqlUnion_duplication = "SELECT union_id FROM epi_schedule_temp";
$resultUnion_duplication = mysqli_query($conn, $sqlUnion_duplication);
while($row = $resultUnion_duplication->fetch_assoc())
   $union_duplication = $row["union_id"];

if(isset($_POST['save']))
{

    $sqlTruncateEpiCenterTempTable = "TRUNCATE TABLE epi_center_temp";
    $resultSqlTruncateEpiCenterTempTable = mysqli_query($conn, $sqlTruncateEpiCenterTempTable);

    $sqlTruncateEpiCenterTable = "DELETE FROM epi_schedule WHERE union_id = $union_duplication AND epi_year_ec = $year_duplication AND epi_year_es = $year_duplication";
    $resultSqlTruncateEpiCenterTable = mysqli_query($conn, $sqlTruncateEpiCenterTable);

    $sqlCopyTable = "INSERT INTO epi_schedule (center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, schedule_id, epi_year_ec, dateID, jan_date, feb_date, mar_date, apr_date, may_date, jun_date, jul_date, aug_date, sep_date, oct_date, nov_date, dec_date, ward_id, epi_year_es) SELECT center_id, ward_no, sub_block_name, center_name, from_house, to_house, center_type, ha_details, union_id, schedule_id, epi_year_ec, dateID, jan_date, feb_date, mar_date, apr_date, may_date, jun_date, jul_date, aug_date, sep_date, oct_date, nov_date, dec_date, ward_id, epi_year_es FROM epi_schedule_temp";
    $resultCopyTable = mysqli_query($conn, $sqlCopyTable);
?>
<script type="text/javascript">
    window.location = "../data_info/epi_thanks.php";
</script> 
<?php
}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">EPI Schedule Session [<?php echo $year;?>]</h2>
            <hr>
            <p>Please make sure our system is created EPI Schedule Session for your respective day
                          [<?php
                            if($schedule_id == 1)
                              echo "<strong>Monday-Thursday</strong>";
                            elseif ($schedule_id == 2) 
                              echo "<strong>Sunday-Wednesday</strong>";
                            elseif ($schedule_id == 3)
                              echo "<strong>Saturday-Tuesday</strong>";
                            ?>] 
                              selection is correct. For more accuracy please make a revision and do necessary update by clicking on the date.</p>
            <strong>Caution:</strong> Once you save after neccessary update, you can only modify it later by Change EPI Schedule Session.
            <br><br>
            <div class="table-responsive">  
              <div id="live_data"></div>                 
            </div>
            <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
        <div align="right">
          <br>
          <form method="post">
            <button type="submit" class="btn btn-primary btn-md" name="save">Save EPI Schedule Session</button>
          </form>
        </div> 
        <br> 
        </div>
    </div>
</div>

<?php include_once('../footer.php');?>  
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"../data_info/epi_center_table_select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();   
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"../data_info/epi_center_table_edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.sub_block_name', function(){  
           var id = $(this).data("id1");  
           var sub_block_name = $(this).text();  
           edit_data(id, sub_block_name, "sub_block_name");  
      });  
      $(document).on('blur', '.center_name', function(){  
           var id = $(this).data("id2");  
           var center_name = $(this).text();  
           edit_data(id, center_name, "center_name");  
      });
       $(document).on('blur', '.from_house', function(){  
           var id = $(this).data("id3");  
           var from_house = $(this).text();  
           edit_data(id, from_house, "from_house");  
      });  
      $(document).on('blur', '.to_house', function(){  
           var id = $(this).data("id4");  
           var to_house = $(this).text();  
           edit_data(id, to_house, "to_house");  
      });
       $(document).on('blur', '.center_type', function(){  
           var id = $(this).data("id5");  
           var center_type = $(this).text();  
           edit_data(id, center_type, "center_type");  
      });  
      $(document).on('blur', '.jan_date', function(){  
           var id = $(this).data("id6");  
           var jan_date = $(this).text();  
           edit_data(id, jan_date, "jan_date");  
      });
       $(document).on('blur', '.feb_date', function(){  
           var id = $(this).data("id7");  
           var feb_date = $(this).text();  
           edit_data(id, feb_date, "feb_date");  
      });  
      $(document).on('blur', '.mar_date', function(){  
           var id = $(this).data("id8");  
           var mar_date = $(this).text();  
           edit_data(id, mar_date, "mar_date");  
      });
       $(document).on('blur', '.apr_date', function(){  
           var id = $(this).data("id9");  
           var apr_date = $(this).text();  
           edit_data(id, apr_date, "apr_date");  
      });  
      $(document).on('blur', '.may_date', function(){  
           var id = $(this).data("id10");  
           var may_date = $(this).text();  
           edit_data(id, may_date, "may_date");  
      });
       $(document).on('blur', '.jun_date', function(){  
           var id = $(this).data("id11");  
           var jun_date = $(this).text();  
           edit_data(id, jun_date, "jun_date");  
      });  
      $(document).on('blur', '.jul_date', function(){  
           var id = $(this).data("id12");  
           var jul_date = $(this).text();  
           edit_data(id, jul_date, "jul_date");  
      });
      $(document).on('blur', '.aug_date', function(){  
           var id = $(this).data("id13");  
           var aug_date = $(this).text();  
           edit_data(id, aug_date, "aug_date");  
      });
      $(document).on('blur', '.sep_date', function(){  
           var id = $(this).data("id14");  
           var sep_date = $(this).text();  
           edit_data(id, sep_date, "sep_date");  
      });
      $(document).on('blur', '.oct_date', function(){  
           var id = $(this).data("id14");  
           var oct_date = $(this).text();  
           edit_data(id, oct_date, "oct_date");  
      });
      $(document).on('blur', '.nov_date', function(){  
           var id = $(this).data("id16");  
           var nov_date = $(this).text();  
           edit_data(id, nov_date, "nov_date");  
      });
      $(document).on('blur', '.dec_date', function(){  
           var id = $(this).data("id17");  
           var dec_date = $(this).text();  
           edit_data(id, dec_date, "dec_date");  
      });
      $(document).on('blur', '.ha_details', function(){  
           var id = $(this).data("id18");  
           var ha_details = $(this).text();  
           edit_data(id, ha_details, "ha_details");  
      });
 });  
 </script>