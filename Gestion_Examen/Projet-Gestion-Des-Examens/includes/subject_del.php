<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../login.php');
endif;

include('db_connect.php');
$id=$_REQUEST['id'];
$a=mysqli_query($db,"select * from planning where id_subject='$id'")or die(mysqli_error());
				$count=mysqli_num_rows($a);
				if ($count>0)
				{
					
					$result=mysqli_query($db,"DELETE FROM planning WHERE id_subject ='$id'")or die(mysqli_error());
					$result=mysqli_query($db,"DELETE FROM subject WHERE id_subject ='$id'")or die(mysqli_error());
					echo "<script type='text/javascript'>alert('Le module est supprimé de la table module ainsi que la table d'affectation des examens);</script>";
					echo "<script>document.location='subjects.php'</script>";

}	
				else{
$result=mysqli_query($db,"DELETE FROM subject WHERE id_subject ='$id'")or die(mysqli_error());

	
	echo "<script type='text/javascript'>alert('Le module est supprimé avec succès ');</script>";	
	echo "<script>document.location='subjects.php'</script>";  }
	
?>