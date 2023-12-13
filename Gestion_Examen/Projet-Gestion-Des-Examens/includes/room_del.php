<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../login.php');
endif;
include('db_connect.php');
$id=$_REQUEST['id'];
$a=mysqli_query($db,"select * from planning where id_room='$id'")or die(mysqli_error());
				$count1=mysqli_num_rows($a);
				if ($count1>0)
				{
					$d=mysqli_query($db,"select * from planning where id_room='$id'")or die(mysqli_error());
					
					
					
					while($row=mysqli_fetch_array($d)){
                         $ida=$row['id_planning'];
				

					echo "<script>window.open('affectation_edit.php?id=$ida','_blank');</script>";

					}
					mysqli_query($db,"update planning set id_room=null  where id_room='$id'")or die(mysqli_error());
					$result=mysqli_query($db,"DELETE FROM room WHERE id_room ='$id'")or die(mysqli_error());
					echo "<script type='text/javascript'>alert('La Salle supprimé était affecté à une affectation dont il faut la remplacer  ');</script>";	
					echo "<script>document.location='rooms.php'</script>"; 

}	
				else{
$result=mysqli_query($db,"DELETE FROM room WHERE id_room ='$id'")
	or die(mysqli_error());

	echo "<script type='text/javascript'>alert('La salle est Supprimée avec succès !! ');</script>";	
	echo "<script>document.location='rooms.php'</script>";  }
	
?>
