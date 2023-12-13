<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../login.php');
endif;
if(isset($_POST['save']) && !empty($_POST['first']) && !empty($_POST['year']) ){
include('db_connect.php');
	$id = $_POST['id'];
	$first =$_POST['first'];
	$id_year = $_POST['year'];
	$id_teacher = $_POST['teacher'];


	
if($id_teacher!="x"){
	
	$query11=mysqli_query($db,"SELECT * from subject where subject='$first' and id_year='$id_year' and id_teacher='$id_teacher'")or die(mysqli_error());
	            $count11=mysqli_num_rows($query11);
				if ($count11>0 )
				{
					echo "<script type='text/javascript'>alert('Module Existant ou dèja affecté à un autre professeur');</script>";
					echo "<script>document.location='subject_edit.php?id=$id'</script>";   
				}	
				else{
			mysqli_query($db,"UPDATE subject set subject='$first'  where id_subject='$id'")or die(mysqli_error());
			mysqli_query($db,"UPDATE subject set  id_year='$id_year' where id_subject='$id'")or die(mysqli_error());
			mysqli_query($db,"UPDATE subject set  id_teacher='$id_teacher' where id_subject='$id'")or die(mysqli_error());				
			echo "<script type='text/javascript'>alert('Le module est ajouté avec succès :!');</script>";
			echo "<script>document.location='subjects.php'</script>";
	}}
    
    else{ $query1=mysqli_query($db,"SELECT * from subject where subject='$first' and id_year='$id_year'  ")or die(mysqli_error());
	            
				$count1=mysqli_num_rows($query1);
				if ($count1>0 )
				{
					echo "<script type='text/javascript'>alert('Module dèjà Existant ou dèja affecté à un autre professeur');</script>";
					echo "<script>document.location='subject_edit.php?id=$id'</script>";   
				}	
				else{ 

                    mysqli_query($db,"UPDATE subject set subject='$first'  where id_subject='$id'")or die(mysqli_error());
	               mysqli_query($db,"UPDATE subject set  id_year='$id_year' where id_subject='$id'")or die(mysqli_error());
                     mysqli_query($db,"UPDATE  subject set id_teacher=NULL WHERE id_subject='$id'")or die(mysqli_error());
                     echo "<script type='text/javascript'>alert('Le module est ajouté avec succès ! ');</script>";
	              echo "<script>document.location='subjects.php'</script>";


}}
				}





				else if(isset($_POST['cancel'])){
					echo "<script>document.location='subjects.php'</script>"; }


	
?>