<?php
$page_title = 'SW SESSION';
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
$sql = "SELECT epi_year FROM sw_schedule";
$result = mysqli_query($conn, $sql);
while($row = $result->fetch_assoc())
   $year = $row["epi_year"];

if(isset($_POST['save']))
{

    $sqlDeleteTable = "DELETE FROM sw_schedule_final WHERE epi_year = $year";
    $resultDeleteTable = mysqli_query($conn, $sqlDeleteTable);

    $sqlCopyTable = "INSERT INTO sw_schedule_final (sw_dateID, sw_jan, sw_feb, sw_mar, sw_apr, sw_may, sw_jun, sw_jul, sw_aug, sw_sep, sw_oct, sw_nov, sw_dec, ward_id, epi_year, schedule_id) SELECT sw_dateID, sw_jan, sw_feb, sw_mar, sw_apr, sw_may, sw_jun, sw_jul, sw_aug, sw_sep, sw_oct, sw_nov, sw_dec, ward_id, epi_year, schedule_id FROM sw_schedule";
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
            <h2 class="text-center">Sunday-Wednesday EPI Session [<?php echo $year;?>]</h2>
            <hr>
            <p>Please make sure our system is created EPI Schedule for <strong>Sunday-Wednesday</strong> correctly. For more accuracy please make a revision and do necessary update by clicking on the date.</p>
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
                url:"../schedule_info/sw_table_select.php",  
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
                url:"../schedule_info/sw_table_edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.sw_jan', function(){  
           var id = $(this).data("id1");  
           var sw_jan = $(this).text();  
           edit_data(id, sw_jan, "sw_jan");  
      });  
      $(document).on('blur', '.sw_feb', function(){  
           var id = $(this).data("id2");  
           var sw_feb = $(this).text();  
           edit_data(id, sw_feb, "sw_feb");  
      });
       $(document).on('blur', '.sw_mar', function(){  
           var id = $(this).data("id3");  
           var sw_mar = $(this).text();  
           edit_data(id, sw_mar, "sw_mar");  
      });  
      $(document).on('blur', '.sw_apr', function(){  
           var id = $(this).data("id4");  
           var sw_apr = $(this).text();  
           edit_data(id, sw_apr, "sw_apr");  
      });
       $(document).on('blur', '.sw_may', function(){  
           var id = $(this).data("id5");  
           var sw_may = $(this).text();  
           edit_data(id, sw_may, "sw_may");  
      });  
      $(document).on('blur', '.sw_jun', function(){  
           var id = $(this).data("id6");  
           var sw_jun = $(this).text();  
           edit_data(id, sw_jun, "sw_jun");  
      });
       $(document).on('blur', '.sw_jul', function(){  
           var id = $(this).data("id7");  
           var sw_jul = $(this).text();  
           edit_data(id, sw_jul, "sw_jul");  
      });  
      $(document).on('blur', '.sw_aug', function(){  
           var id = $(this).data("id8");  
           var sw_aug = $(this).text();  
           edit_data(id, sw_aug, "sw_aug");  
      });
       $(document).on('blur', '.sw_sep', function(){  
           var id = $(this).data("id9");  
           var sw_sep = $(this).text();  
           edit_data(id, sw_sep, "sw_sep");  
      });  
      $(document).on('blur', '.sw_oct', function(){  
           var id = $(this).data("id10");  
           var sw_oct = $(this).text();  
           edit_data(id, sw_oct, "sw_oct");  
      });
       $(document).on('blur', '.sw_nov', function(){  
           var id = $(this).data("id11");  
           var sw_nov = $(this).text();  
           edit_data(id, sw_nov, "sw_nov");  
      });  
      $(document).on('blur', '.sw_dec', function(){  
           var id = $(this).data("id12");  
           var sw_dec = $(this).text();  
           edit_data(id, sw_dec, "sw_dec");  
      });
 });  
 </script>