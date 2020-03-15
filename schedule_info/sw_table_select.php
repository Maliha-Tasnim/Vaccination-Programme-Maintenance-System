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
 $sql = "SELECT * FROM sw_schedule ORDER BY sw_dateID ASC";  
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
      <td>'.$row["sw_dateID"].'</td>
      <td>'.$row["ward_id"].'</td>  
      <td class="sw_jan" data-id1="'.$row["sw_dateID"].'" contenteditable>'.$row["sw_jan"].'</td>  
      <td class="sw_feb" data-id2="'.$row["sw_dateID"].'" contenteditable>'.$row["sw_feb"].'</td>
      <td class="sw_mar" data-id3="'.$row["sw_dateID"].'" contenteditable>'.$row["sw_mar"].'</td>  
      <td class="sw_apr" data-id4="'.$row["sw_dateID"].'" contenteditable>'.$row["sw_apr"].'</td>  
      <td class="sw_may" data-id5="'.$row["sw_dateID"].'" contenteditable>'.$row["sw_may"].'</td>  
      <td class="sw_jun" data-id6="'.$row["sw_dateID"].'" contenteditable>'.$row["sw_jun"].'</td>  
      <td class="sw_jul" data-id7="'.$row["sw_dateID"].'" contenteditable>'.$row["sw_jul"].'</td>  
      <td class="sw_aug" data-id8="'.$row["sw_dateID"].'" contenteditable>'.$row["sw_aug"].'</td>  
      <td class="sw_sep" data-id9="'.$row["sw_dateID"].'" contenteditable>'.$row["sw_sep"].'</td>  
      <td class="sw_oct" data-id10="'.$row["sw_dateID"].'" contenteditable>'.$row["sw_oct"].'</td>  
      <td class="sw_nov" data-id11="'.$row["sw_dateID"].'" contenteditable>'.$row["sw_nov"].'</td>  
      <td class="sw_dec" data-id12="'.$row["sw_dateID"].'" contenteditable>'.$row["sw_dec"].'</td>
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