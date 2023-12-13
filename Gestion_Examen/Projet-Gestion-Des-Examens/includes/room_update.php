<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../login.php');
endif;
if(isset($_POST['save'])){
include('db_connect.php');
	$id = $_POST['id'];
	$room =$_POST['room'];



	$query11=mysqli_query($db,"SELECT * from room where room='$room' and id_room!='$id' ")or die(mysqli_error());
	            $count11=mysqli_num_rows($query11);

	mysqli_query($db,"update room set room='$room' where id_room='$id'")or die(mysqli_error());
	if ($count11>0 )
				{
					echo "<script type='text/javascript'>alert('La salle est dèja Existante');</script>";
					echo "<script>document.location='room_edit.php?id=$id'</script>";   
				}	
				else{
	
	
	echo "<script type='text/javascript'>alert('La salle est modifié!');</script>";
	echo "<script>document.location='rooms.php'</script>";}
	}
				else if(isset($_POST['cancel'])){
					echo "<script>document.location='rooms.php'</script>"; }


	
?>