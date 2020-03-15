<?php
$page_title = 'MR SESSION';
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
$sql = "SELECT epi_year FROM mr_schedule";
$result = mysqli_query($conn, $sql);
while($row = $result->fetch_assoc())
   $year = $row["epi_year"];

if(isset($_POST['save']))
{

    $sqlDeleteTable = "DELETE FROM mr_schedule_final WHERE epi_year = $year";
    $resultDeleteTable = mysqli_query($conn, $sqlDeleteTable);

    $sqlCopyTable = "INSERT INTO mr_schedule_final (mr_dateID, mr_jan, mr_feb, mr_mar, mr_apr, mr_may, mr_jun, mr_jul, mr_aug, mr_sep, mr_oct, mr_nov, mr_dec, ward_id, epi_year, schedule_id) SELECT mr_dateID, mr_jan, mr_feb, mr_mar, mr_apr, mr_may, mr_jun, mr_jul, mr_aug, mr_sep, mr_oct, mr_nov, mr_dec, ward_id, epi_year, schedule_id FROM mr_schedule";
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
          <h2 class="text-center">Monday-Thursday EPI Session [<?php echo $year;?>]</h2>
          <hr>
          <p>Please make sure our system is created EPI Schedule for <strong>Monday-Thursday</strong> correctly. For more accuracy please make a revision and do necessary update by clicking on the date.</p>
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
                url:"../schedule_info/mr_table_select.php",  
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
                url:"../schedule_info/mr_table_edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.mr_jan', function(){  
           var id = $(this).data("id1");  
           var mr_jan = $(this).text();  
           edit_data(id, mr_jan, "mr_jan");  
      });  
      $(document).on('blur', '.mr_feb', function(){  
           var id = $(this).data("id2");  
           var mr_feb = $(this).text();  
           edit_data(id, mr_feb, "mr_feb");  
      });
       $(document).on('blur', '.mr_mar', function(){  
           var id = $(this).data("id3");  
           var mr_mar = $(this).text();  
           edit_data(id, mr_mar, "mr_mar");  
      });  
      $(document).on('blur', '.mr_apr', function(){  
           var id = $(this).data("id4");  
           var mr_apr = $(this).text();  
           edit_data(id, mr_apr, "mr_apr");  
      });
       $(document).on('blur', '.mr_may', function(){  
           var id = $(this).data("id5");  
           var mr_may = $(this).text();  
           edit_data(id, mr_may, "mr_may");  
      });  
      $(document).on('blur', '.mr_jun', function(){  
           var id = $(this).data("id6");  
           var mr_jun = $(this).text();  
           edit_data(id, mr_jun, "mr_jun");  
      });
       $(document).on('blur', '.mr_jul', function(){  
           var id = $(this).data("id7");  
           var mr_jul = $(this).text();  
           edit_data(id, mr_jul, "mr_jul");  
      });  
      $(document).on('blur', '.mr_aug', function(){  
           var id = $(this).data("id8");  
           var mr_aug = $(this).text();  
           edit_data(id, mr_aug, "mr_aug");  
      });
       $(document).on('blur', '.mr_sep', function(){  
           var id = $(this).data("id9");  
           var mr_sep = $(this).text();  
           edit_data(id, mr_sep, "mr_sep");  
      });  
      $(document).on('blur', '.mr_oct', function(){  
           var id = $(this).data("id10");  
           var mr_oct = $(this).text();  
           edit_data(id, mr_oct, "mr_oct");  
      });
       $(document).on('blur', '.mr_nov', function(){  
           var id = $(this).data("id11");  
           var mr_nov = $(this).text();  
           edit_data(id, mr_nov, "mr_nov");  
      });  
      $(document).on('blur', '.mr_dec', function(){  
           var id = $(this).data("id12");  
           var mr_dec = $(this).text();  
           edit_data(id, mr_dec, "mr_dec");  
      });
 });  
 </script>