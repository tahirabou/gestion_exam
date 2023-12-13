<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../login.php');
endif;

include('db_connect.php');
$id=$_REQUEST['id'];
$a1=mysqli_query($db,"select * from planning where id_teacher='$id'")or die(mysqli_error());
$a2=mysqli_query($db,"select * from planning where id_teacher2='$id'")or die(mysqli_error());
$a3=mysqli_query($db,"select * from planning where id_teacher3='$id'")or die(mysqli_error());
$b=mysqli_query($db,"select * from subject where id_teacher='$id'")or die(mysqli_error());
				$count1=mysqli_num_rows($a1);
				$count2=mysqli_num_rows($a2);
				$count3=mysqli_num_rows($a3);
				$c2=mysqli_num_rows($b);
				if($count1>0 )
				{
                   $d=mysqli_query($db,"select * from planning where id_teacher='$id'")or die(mysqli_error());
					
					
					
					while($row=mysqli_fetch_array($d)){
                         $ida=$row['id_planning'];

					echo "<script>window.open('affectation_edit.php?id=$ida','_blank');</script>";

					}

				    mysqli_query($db,"update  planning set id_teacher=NULL WHERE id_teacher='$id'")or die(mysqli_error());
				     $result=mysqli_query($db,"DELETE FROM teacher WHERE id_teacher ='$id'")or die(mysqli_error());
				    echo "<script>alert('Le professeur  était parmis les surveillences d une affectation dont il faut la remplacer');</script>";	
					echo "<script>document.location='teachers.php'</script>"; 
					
					

                 }	else if($count2>0){
                 	 $d2=mysqli_query($db,"select * from planning where id_teacher2='$id'")or die(mysqli_error());
					
					
					
					while($row2=mysqli_fetch_array($d2)){
                         $ida2=$row2['id_planning'];

					echo "<script>window.open('affectation_edit.php?id=$ida2','_blank');</script>";

					}


                      mysqli_query($db,"update  planning set id_teacher2=NULL WHERE id_teacher2='$id'")or die(mysqli_error());
                      $result=mysqli_query($db,"DELETE FROM teacher WHERE id_teacher ='$id'")or die(mysqli_error());
				    echo "<script>alert('Le professeur  était parmis les surveillences d une affectation dont il faut la remplacer');</script>";	
					echo "<script>document.location='teachers.php'</script>"; 
					
					


                 }else if($count3>0){
                 	$d3=mysqli_query($db,"select * from planning where id_teacher3='$id'")or die(mysqli_error());
					
					
					
					while($row3=mysqli_fetch_array($d3)){
                         $ida3=$row3['id_planning'];

					echo "<script>window.open('affectation_edit.php?id=$ida3','_blank');</script>";

					}

                      mysqli_query($db,"update  planning set id_teacher3=NULL WHERE id_teacher3='$id'")or die(mysqli_error());
                      $result=mysqli_query($db,"DELETE FROM teacher WHERE id_teacher ='$id'")or die(mysqli_error());
				    echo "<script>alert('Le professeur  était parmis les surveillences d une affectation dont il faut la remplacer');</script>";	
					echo "<script>document.location='teachers.php'</script>"; 
				


                 }
                 if($c2>0){
                 	mysqli_query($db,"update  subject set id_teacher=NULL WHERE id_teacher='$id'")or die(mysqli_error());
                 	$result=mysqli_query($db,"DELETE FROM teacher WHERE id_teacher ='$id'")or die(mysqli_error());
                 		echo "<script type='text/javascript'>alert('Le professeur est supprimé ! ');</script>";	
                 		echo "<script>document.location='teachers.php'</script>";  
                 }
                 if($c2==0 && $count3==0 &&  $count1==0 && $count2==0){

                 	$result=mysqli_query($db,"DELETE FROM teacher WHERE id_teacher ='$id'")or die(mysqli_error());
                 		echo "<script type='text/javascript'>alert('Le professeur est supprimé ! ');</script>";	
                 		echo "<script>document.location='teachers.php'</script>";  
                 }

                  

	
			
				
	
?>


