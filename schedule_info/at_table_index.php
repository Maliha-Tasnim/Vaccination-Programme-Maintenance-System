<?php
$page_title = 'AT SESSION';
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
$sql = "SELECT epi_year FROM at_schedule";
$result = mysqli_query($conn, $sql);
while($row = $result->fetch_assoc())
   $year = $row["epi_year"];

if(isset($_POST['save']))
{

    $sqlDeleteTable = "DELETE FROM at_schedule_final WHERE epi_year = $year";
    $resultDeleteTable = mysqli_query($conn, $sqlDeleteTable);

    $sqlCopyTable = "INSERT INTO at_schedule_final (at_dateID, at_jan, at_feb, at_mar, at_apr, at_may, at_jun, at_jul, at_aug, at_sep, at_oct, at_nov, at_dec, ward_id, epi_year, schedule_id) SELECT at_dateID, at_jan, at_feb, at_mar, at_apr, at_may, at_jun, at_jul, at_aug, at_sep, at_oct, at_nov, at_dec, ward_id, epi_year, schedule_id FROM at_schedule";
    $resultCopyTable = mysqli_query($conn, $sqlCopyTable);
?>
  <script type="text/javascript">
    window.location = "../schedule_info/epi_thanks.php";
  </script>
  <?php 
  }
  ?>
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Saturday-Tuesday Session [<?php echo $year;?>]</h2>
            <hr>
            <p>Please make sure our system is created/rechanged EPI Schedule for <strong>Saturday-Tuesday</strong> correctly. For more accuracy please make a revision and do necessary update by clicking on the date.</p>
            <strong>Caution:</strong> Once you save after neccessary update, you can modify it later but this might be occured a security breach because, this is very huge database system. For later update/modification you need to go through the all process again from the begining.<br><br>
            <div class="table-responsive">  
              <div id="live_data"></div>                 
            </div> 
        <div align="right">
          <form method="post">
            <button type="submit" class="btn btn-primary btn-md" name="save">Save Schedule</button>
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
                url:"../schedule_info/at_table_select.php",  
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
                url:"../schedule_info/at_table_edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.at_jan', function(){  
           var id = $(this).data("id1");  
           var at_jan = $(this).text();  
           edit_data(id, at_jan, "at_jan");  
      });  
      $(document).on('blur', '.at_feb', function(){  
           var id = $(this).data("id2");  
           var at_feb = $(this).text();  
           edit_data(id, at_feb, "at_feb");  
      });
       $(document).on('blur', '.at_mar', function(){  
           var id = $(this).data("id3");  
           var at_mar = $(this).text();  
           edit_data(id, at_mar, "at_mar");  
      });  
      $(document).on('blur', '.at_apr', function(){  
           var id = $(this).data("id4");  
           var at_apr = $(this).text();  
           edit_data(id, at_apr, "at_apr");  
      });
       $(document).on('blur', '.at_may', function(){  
           var id = $(this).data("id5");  
           var at_may = $(this).text();  
           edit_data(id, at_may, "at_may");  
      });  
      $(document).on('blur', '.at_jun', function(){  
           var id = $(this).data("id6");  
           var at_jun = $(this).text();  
           edit_data(id, at_jun, "at_jun");  
      });
       $(document).on('blur', '.at_jul', function(){  
           var id = $(this).data("id7");  
           var at_jul = $(this).text();  
           edit_data(id, at_jul, "at_jul");  
      });  
      $(document).on('blur', '.at_aug', function(){  
           var id = $(this).data("id8");  
           var at_aug = $(this).text();  
           edit_data(id, at_aug, "at_aug");  
      });
       $(document).on('blur', '.at_sep', function(){  
           var id = $(this).data("id9");  
           var at_sep = $(this).text();  
           edit_data(id, at_sep, "at_sep");  
      });  
      $(document).on('blur', '.at_oct', function(){  
           var id = $(this).data("id10");  
           var at_oct = $(this).text();  
           edit_data(id, at_oct, "at_oct");  
      });
       $(document).on('blur', '.at_nov', function(){  
           var id = $(this).data("id11");  
           var at_nov = $(this).text();  
           edit_data(id, at_nov, "at_nov");  
      });  
      $(document).on('blur', '.at_dec', function(){  
           var id = $(this).data("id12");  
           var at_dec = $(this).text();  
           edit_data(id, at_dec, "at_dec");  
      });
 });  
 </script>