<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../login.php');
endif;
if(isset($_POST['save'])){
include('db_connect.php');
	$id = $_POST['id'];

	$first =$_POST['firt'];
	

	$query2=mysqli_query($db,"select * from teacher where nom='$first' ")or die(mysqli_error());
				$count2=mysqli_num_rows($query2);
				if ( $count2>0 )
				{
					echo "<script type='text/javascript'>alert('Professeur dèja éxistant');</script>";
					echo "<script>document.location='subjects.php'</script>";  
				}	
				else{
	
	mysqli_query($db,"update teacher set nom='$first' where id_teacher='$id'")or die(mysqli_error());
	
	
	echo "<script type='text/javascript'>alert('Successfully updated member details!');</script>";
	echo "<script>document.location='teachers.php'</script>";
	}}
				else if(isset($_POST['cancel'])){
					echo "<script>document.location='teachers.php'</script>"; }


	
?>