<?php
require_once('../load.php');
?>

<?php
// Checkin What level user has permission to view this page
page_require_level(3);
//pull out all user form database
$all_users = find_all_user();
?>
<?php  
 $connect = mysqli_connect("localhost", "root", "", "central_db"); 
 $output = '';  
 $sql = "SELECT * FROM mr_schedule ORDER BY mr_dateID ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
<div class="table-responsive">  
  <table class="table table-bordered" width="100%">  
    <thead class="thead-dark">
      <tr> 
        <th>#</th> 
        <th>Ward No</th>
        <th>Jan</th>  
        <th>Feb</th>
        <th>Mar</th>  
        <th>Apr</th>
        <th>May</th>  
        <th>Jun</th>
        <th>Jul</th>  
        <th>Aug</th>
        <th>Sep</th>  
        <th>Oct</th>
        <th>Nov</th>  
        <th>Dec</th>
        <th>Year</th>  
      </tr>
    </thead>'; 

if(mysqli_num_rows($result) > 0)  
{  
  while($row = mysqli_fetch_array($result))  
  {  
    $output .= '  
    <tr>  
      <td>'.$row["mr_dateID"].'</td>
      <td>'.$row["ward_id"].'</td>  
      <td class="mr_jan" data-id1="'.$row["mr_dateID"].'" contenteditable>'.$row["mr_jan"].'</td>  
      <td class="mr_feb" data-id2="'.$row["mr_dateID"].'" contenteditable>'.$row["mr_feb"].'</td>
      <td class="mr_mar" data-id3="'.$row["mr_dateID"].'" contenteditable>'.$row["mr_mar"].'</td>  
      <td class="mr_apr" data-id4="'.$row["mr_dateID"].'" contenteditable>'.$row["mr_apr"].'</td>  
      <td class="mr_may" data-id5="'.$row["mr_dateID"].'" contenteditable>'.$row["mr_may"].'</td>  
      <td class="mr_jun" data-id6="'.$row["mr_dateID"].'" contenteditable>'.$row["mr_jun"].'</td>  
      <td class="mr_jul" data-id7="'.$row["mr_dateID"].'" contenteditable>'.$row["mr_jul"].'</td>  
      <td class="mr_aug" data-id8="'.$row["mr_dateID"].'" contenteditable>'.$row["mr_aug"].'</td>  
      <td class="mr_sep" data-id9="'.$row["mr_dateID"].'" contenteditable>'.$row["mr_sep"].'</td>  
      <td class="mr_oct" data-id10="'.$row["mr_dateID"].'" contenteditable>'.$row["mr_oct"].'</td>  
      <td class="mr_nov" data-id11="'.$row["mr_dateID"].'" contenteditable>'.$row["mr_nov"].'</td>  
      <td class="mr_dec" data-id12="'.$row["mr_dateID"].'" contenteditable>'.$row["mr_dec"].'</td>
      <td>'.$row["epi_year"].'</td> 
    </tr>
    ';  
  }  
}  
else  
{  
  $output .= '
  <tr>  
    <td colspan="15">No data found. Please create EPI Scheduler first.</td>  
  </tr>';  
}  
$output .= '
</table>  
</div>';  
 echo $output; 
 ?>