<?php
include("db_connect.php");
if($_POST['id']){
$id=$_POST['id'];
if($id==0){
 echo "<option>Select subject</option>";
}else{
 $sql = mysqli_query($db,"SELECT * FROM subject WHERE id_year='$id'");
 while($row = mysqli_fetch_array($sql)){
 echo '<option value="'.$row['id_subject'].'">'.$row['subject'].'</option>';


 }
 }
}






?>

