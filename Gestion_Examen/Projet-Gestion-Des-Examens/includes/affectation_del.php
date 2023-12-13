<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../login.php');
endif;
include('db_connect.php');
$id=$_REQUEST['id'];

$result=mysqli_query($db,"DELETE FROM planning WHERE id_planning ='$id'")
	or die(mysqli_error());

	
	echo "<script type='text/javascript'>alert('Successfully deleted a faculty! ');</script>";	
	echo "<script>document.location='principale.php'</script>";  
	
?>
