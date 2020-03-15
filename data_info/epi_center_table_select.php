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
 $sql = "SELECT * FROM epi_schedule_temp ORDER BY id ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
<div class="table-responsive">  
  <table class="table table-bordered" width="100%">  
    <thead class="thead-dark">
      <tr> 
        <th>#</th> 
        <th>Ward No</th>
        <th>Sub-Block</th>
        <th>Center Name</th>
        <th>From House#</th>
        <th>To House#</th>
        <th>Center Type</th>
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
        <th>Field Worker Details</th>  
      </tr>
    </thead>'; 

if(mysqli_num_rows($result) > 0)  
{  
  while($row = mysqli_fetch_array($result))  
  {  
    $output .= '  
    <tr>  
      <td>'.$row["center_id"].'</td>
      <td>'.$row["ward_no"].'</td>  
      <td class="sub_block_name" data-id1="'.$row["id"].'" contenteditable>'.$row["sub_block_name"].'</td>  
      <td class="center_name" data-id2="'.$row["id"].'" contenteditable>'.$row["center_name"].'</td>
      <td class="from_house" data-id3="'.$row["id"].'" contenteditable>'.$row["from_house"].'</td>
      <td class="to_house" data-id4="'.$row["id"].'" contenteditable>'.$row["to_house"].'</td>  
      <td class="center_type" data-id5="'.$row["id"].'" contenteditable>'.$row["center_type"].'</td>  
      <td class="jan_date" data-id6="'.$row["id"].'" contenteditable>'.$row["jan_date"].'</td>  
      <td class="feb_date" data-id7="'.$row["id"].'" contenteditable>'.$row["feb_date"].'</td>  
      <td class="mar_date" data-id8="'.$row["id"].'" contenteditable>'.$row["mar_date"].'</td>  
      <td class="apr_date" data-id9="'.$row["id"].'" contenteditable>'.$row["apr_date"].'</td>  
      <td class="may_date" data-id10="'.$row["id"].'" contenteditable>'.$row["may_date"].'</td>  
      <td class="jun_date" data-id11="'.$row["id"].'" contenteditable>'.$row["jun_date"].'</td>  
      <td class="jul_date" data-id12="'.$row["id"].'" contenteditable>'.$row["jul_date"].'</td>  
      <td class="aug_date" data-id13="'.$row["id"].'" contenteditable>'.$row["aug_date"].'</td>
      <td class="sep_date" data-id14="'.$row["id"].'" contenteditable>'.$row["sep_date"].'</td>
      <td class="oct_date" data-id15="'.$row["id"].'" contenteditable>'.$row["oct_date"].'</td>
      <td class="nov_date" data-id16="'.$row["id"].'" contenteditable>'.$row["nov_date"].'</td>
      <td class="dec_date" data-id17="'.$row["id"].'" contenteditable>'.$row["dec_date"].'</td>
      <td class="ha_details" data-id18="'.$row["id"].'" contenteditable>'.$row["ha_details"].'</td>
    </tr>
    ';  
  }  
}  
else  
{  
  $output .= '
  <tr>  
    <td colspan="15">No data found. Please upload union information first.</td>  
  </tr>';  
}  
$output .= '
</table>  
</div>';  
 echo $output; 
 ?>