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
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE sw_schedule SET ".$column_name."='".$text."' WHERE sw_dateID='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Session Day Updated.';  
 }  
 ?>