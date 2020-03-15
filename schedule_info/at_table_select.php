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
 $sql = "SELECT * FROM at_schedule ORDER BY at_dateID ASC";  
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
      <td>'.$row["at_dateID"].'</td>
      <td>'.$row["ward_id"].'</td>  
      <td class="at_jan" data-id1="'.$row["at_dateID"].'" contenteditable>'.$row["at_jan"].'</td>  
      <td class="at_feb" data-id2="'.$row["at_dateID"].'" contenteditable>'.$row["at_feb"].'</td>
      <td class="at_mar" data-id3="'.$row["at_dateID"].'" contenteditable>'.$row["at_mar"].'</td>  
      <td class="at_apr" data-id4="'.$row["at_dateID"].'" contenteditable>'.$row["at_apr"].'</td>  
      <td class="at_may" data-id5="'.$row["at_dateID"].'" contenteditable>'.$row["at_may"].'</td>  
      <td class="at_jun" data-id6="'.$row["at_dateID"].'" contenteditable>'.$row["at_jun"].'</td>  
      <td class="at_jul" data-id7="'.$row["at_dateID"].'" contenteditable>'.$row["at_jul"].'</td>  
      <td class="at_aug" data-id8="'.$row["at_dateID"].'" contenteditable>'.$row["at_aug"].'</td>  
      <td class="at_sep" data-id9="'.$row["at_dateID"].'" contenteditable>'.$row["at_sep"].'</td>  
      <td class="at_oct" data-id10="'.$row["at_dateID"].'" contenteditable>'.$row["at_oct"].'</td>  
      <td class="at_nov" data-id11="'.$row["at_dateID"].'" contenteditable>'.$row["at_nov"].'</td>  
      <td class="at_dec" data-id12="'.$row["at_dateID"].'" contenteditable>'.$row["at_dec"].'</td>
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