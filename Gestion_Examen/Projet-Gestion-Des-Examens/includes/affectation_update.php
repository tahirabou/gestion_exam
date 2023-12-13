<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../login.php');
endif; 
if(isset($_POST['save'])   ){

		   	$id = $_POST['id'];

		    $id_subject = $_POST['subject'];
		    $id_room= $_POST['room'];
		     $id_teacher= $_POST['teacher'];
		     $id_teacher2= $_POST['teacher2'];
		     $id_teacher3= $_POST['teacher3'];
		      $date = $_POST['date'];
		       $time_start = $_POST['time_start'];
		       $time_end = $_POST['time_end'];
		        include('db_connect.php');


/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Verification des contraintes ~~~~~~*/

$query=mysqli_query($db,"select * from planning where (((time_start<='$time_start' and time_end>='$time_start' and ( ('$time_end'<=time_end) or ('$time_end'>time_end ) ) )  ) 
		or ( time_start>='$time_start'  and  (('$time_end'>=time_start and '$time_end'<=time_end) or ('$time_end'>time_end )) ))  and id_room='$id_room' and jour='$date' and id_planning!='$id' ")or die(mysqli_error());
				$count=mysqli_num_rows($query);
		if ($count>0)
			{
							echo "<script type='text/javascript'>alert('Un examen déroule dans le même temps dans la même salle séléctionnée ');</script>";
							echo "<script>document.location='affectation_edit.php?id=$id'</script>";  
		}else{


				if($id_teacher2!="x" && $id_teacher3!="x" ){
						$query1=mysqli_query($db,"SELECT * from planning where (id_teacher='$id_teacher' or id_teacher2='$id_teacher' or id_teacher3='$id_teacher' or id_teacher='$id_teacher3' or id_teacher2='$id_teacher3' or id_teacher3='$id_teacher3' or id_teacher='$id_teacher2' or id_teacher2='$id_teacher2' or id_teacher3='$id_teacher2' ) and (((time_start<='$time_start' and time_end>='$time_start' and ( ('$time_end'<=time_end) or ('$time_end'>time_end ) ) )  ) 
		or ( time_start>='$time_start'  and  (('$time_end'>=time_start and '$time_end'<=time_end) or ('$time_end'>time_end )) ))  and jour='$date' and id_planning!='$id'   ")or die(mysqli_error());
		                  $count1=mysqli_num_rows($query1);
		                  if ($count1>0){
		                    /* done */
		                    echo "<script type='text/javascript'>alert('un professeur est dèja affecté à un examen au même temps 1 ');</script>";
		                    echo "<script>document.location='affectation_edit.php?id=$id'</script>";   } 

                            else{


								mysqli_query($db,"update planning set id_teacher2='$id_teacher2'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set id_teacher3='$id_teacher3'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set id_subject='$id_subject'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set id_teacher='$id_teacher'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set id_room='$id_room'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set jour='$date'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set time_start='$time_start'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set time_end='$time_end'  where id_planning='$id'")or die(mysqli_error());





							}}
			else if($id_teacher2=="x" && $id_teacher3!="x" ){
				//done
                         $query3=mysqli_query($db,"SELECT * from planning where (id_teacher='$id_teacher' or id_teacher2='$id_teacher' or id_teacher3='$id_teacher' or id_teacher='$id_teacher3' or id_teacher2='$id_teacher3' or id_teacher3='$id_teacher3' )  and (((time_start<='$time_start' and time_end>='$time_start' and ( ('$time_end'<=time_end) or ('$time_end'>time_end ) ) )  ) 
    or ( time_start>='$time_start'  and  (('$time_end'>=time_start and '$time_end'<=time_end) or ('$time_end'>time_end )) ))  and jour='$date' and id_planning!='$id'  ")or die(mysqli_error());
		                    $count3=mysqli_num_rows($query3);
		                    if ($count3>0){
		                    echo "<script type='text/javascript'>alert('un professeur est dèja affecté à un examen au même temps 2');</script>";
		                    echo "<script>document.location='affectation_edit.php?id=$id'</script>";  } 
		                  else{


                               mysqli_query($db,"update planning set id_subject='$id_subject'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set id_teacher='$id_teacher'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set id_room='$id_room'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set jour='$date'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set time_start='$time_start'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set time_end='$time_end'  where id_planning='$id'")or die(mysqli_error());

			              mysqli_query($db,"update planning set id_teacher2=null  where id_planning='$id'")or die(mysqli_error());
					      mysqli_query($db,"update planning set id_teacher3='$id_teacher3'  where id_planning='$id'")or die(mysqli_error());}}

			else if($id_teacher2!="x" && $id_teacher3=="x" ){
				         $query2=mysqli_query($db,"SELECT * from planning where (id_teacher='$id_teacher' or id_teacher2='$id_teacher' or id_teacher3='$id_teacher' or id_teacher='$id_teacher2' or id_teacher2='$id_teacher2' or id_teacher3='$id_teacher2' ) and (((time_start<='$time_start' and time_end>='$time_start' and ( ('$time_end'<=time_end) or ('$time_end'>time_end ) ) )  ) 
    or ( time_start>='$time_start'  and  (('$time_end'>=time_start and '$time_end'<=time_end) or ('$time_end'>time_end )) ))  and jour='$date' and id_planning!='$id'   ")or die(mysqli_error());
				          $count22=mysqli_num_rows($query2);

		                    if ($count22>0){
		                    echo "<script type='text/javascript'>alert('un professeur est dèja affecté à un examen au même temps 3');</script>";
		                    echo "<script>document.location='affectation_edit.php?id=$id'</script>";   } 
		                  else{

		                  	mysqli_query($db,"update planning set id_subject='$id_subject'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set id_teacher='$id_teacher'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set id_room='$id_room'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set jour='$date'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set time_start='$time_start'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set time_end='$time_end'  where id_planning='$id'")or die(mysqli_error());

			            mysqli_query($db,"update planning set id_teacher3=null  where id_planning='$id'")or die(mysqli_error());
					    mysqli_query($db,"update planning set id_teacher2='$id_teacher2'  where id_planning='$id'")or die(mysqli_error());}

			}else {
				       $query4=mysqli_query($db,"select * from planning where (id_teacher='$id_teacher' or id_teacher2='$id_teacher' or id_teacher3='$id_teacher')   and (((time_start<='$time_start' and time_end>='$time_start' and ( ('$time_end'<=time_end) or ('$time_end'>time_end ) ) )  ) 
		                or ( time_start>='$time_start'  and  (('$time_end'>=time_start and '$time_end'<=time_end) or ('$time_end'>time_end )) ))  and jour='$date' and id_planning!='$id' ")or die(mysqli_error());
                        $count4=mysqli_num_rows($query4);
                       if ($count4>0){
                      //done
                    echo "<script type='text/javascript'>alert('un professeur est dèja affecté à un examen au même temps 4');</script>";
                    echo "<script>document.location='affectation_edit.php?id=$id'</script>";   } 
                  else{
                  	mysqli_query($db,"update planning set id_subject='$id_subject'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set id_teacher='$id_teacher'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set id_room='$id_room'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set jour='$date'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set time_start='$time_start'  where id_planning='$id'")or die(mysqli_error());
								mysqli_query($db,"update planning set time_end='$time_end'  where id_planning='$id'")or die(mysqli_error());


				          mysqli_query($db,"update planning set id_teacher3=null  where id_planning='$id'")or die(mysqli_error());
					      mysqli_query($db,"update planning set id_teacher2=null  where id_planning='$id'")or die(mysqli_error());
			                 
			         }}
			                   
							
			                    echo "<script>document.location='principale.php'</script>";  }




			      }
							else if(isset($_POST['cancel'])){
								echo "<script>document.location='principale.php'</script>"; }

			        

							  
				
			?>




