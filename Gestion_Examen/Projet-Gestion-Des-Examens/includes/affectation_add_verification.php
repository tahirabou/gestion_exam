<?php 
                   if(isset($_POST['save'])  && !empty($_POST['year'] ) && !empty($_POST['subject']) && !empty($_POST['room']) && !empty($_POST['date']) && !empty($_POST['time_start'])  && !empty($_POST['time_end'])    ){

   $id_year = $_POST['year'];
    $id_subject = $_POST['subject'];
    $id_room= $_POST['room'];
     $id_teacher= $_POST['teacher'];
     $id_teacher2= $_POST['teacher2'];
     $id_teacher3= $_POST['teacher3'];
      $date = $_POST['date'];
       $time_start = $_POST['time_start'];
       $time_end = $_POST['time_end'];
        include('db_connect.php');


/*~~~~~~~~~~~~~~~~~~~~~~~~~~~Insertion~~~~~~~*/
 // debuter à 9h-9h30 ou debuter de 7h à 9h  sachant qu'il y'a un exam de 8h00 à 10h00

$query=mysqli_query($db,"select * from planning where (((time_start<='$time_start' and time_end>='$time_start' and ( ('$time_end'<=time_end) or ('$time_end'>time_end ) ) )  ) 
		or ( time_start>='$time_start'  and  (('$time_end'>=time_start and '$time_end'<=time_end) or ('$time_end'>time_end )) ))   and id_room='$id_room' and jour='$date'  ")or die(mysqli_error());
				$count=mysqli_num_rows($query);
if ($count>0)
	{
					echo "<script type='text/javascript'>alert('Une Affectation d examen déroule en même salle et en même interval de temps');</script>";
					echo "<script>document.location='principale.php'</script>";  
	}	else{
           if($id_teacher2!="x" && $id_teacher3!="x" ){
                  $query1=mysqli_query($db,"select * from planning where (id_teacher='$id_teacher' or id_teacher2='$id_teacher' or id_teacher3='$id_teacher' or id_teacher='$id_teacher3' or id_teacher2='$id_teacher3' or id_teacher3='$id_teacher3' or id_teacher='$id_teacher2' or id_teacher2='$id_teacher2' or id_teacher3='$id_teacher2' ) and (((time_start<='$time_start' and time_end>='$time_start' and ( ('$time_end'<=time_end) or ('$time_end'>time_end ) ) )  ) 
    or ( time_start>='$time_start'  and  (('$time_end'>=time_start and '$time_end'<=time_end) or ('$time_end'>time_end )) ))   and jour='$date'   ")or die(mysqli_error());
                  $count1=mysqli_num_rows($query1);
                  if ($count1>0){
                    /* done */
                    echo "<script type='text/javascript'>alert('un professeur est dèja affecté à un examen au même temps ');</script>";
                    echo "<script>document.location='affectation_add.php'</script>";  } 

                  else{

                    mysqli_query($db,"INSERT INTO planning(id_subject,id_teacher,id_teacher2,id_teacher3,id_room,jour,time_start,time_end)
                VALUES('$id_subject','$id_teacher','$id_teacher2','$id_teacher3','$id_room','$date','$time_start','$time_end')")or die(mysqli_error());
                     echo "<script type='text/javascript'>alert('le planning est ajouté avec succès ');</script>"; 
                     echo "<script>document.location='principale.php'</script>"; 
                    }

            }else if($id_teacher2!="x" && $id_teacher3=="x" ) {
                    $query2=mysqli_query($db,"select * from planning where (id_teacher='$id_teacher' or id_teacher2='$id_teacher' or id_teacher3='$id_teacher' or id_teacher='$id_teacher2' or id_teacher2='$id_teacher2' or id_teacher3='$id_teacher2' ) and (((time_start<='$time_start' and time_end>='$time_start' and ( ('$time_end'<=time_end) or ('$time_end'>time_end ) ) )  ) 
    or ( time_start>='$time_start'  and  (('$time_end'>=time_start and '$time_end'<=time_end) or ('$time_end'>time_end )) ))  and jour='$date'   ")or die(mysqli_error());
                    $count2=mysqli_num_rows($query2);
                  if ($count2>0){
                    echo "<script type='text/javascript'>alert('un professeur est dèja affecté à un examen au même temps ');</script>";
                    echo "<script>document.location='affectation_add.php'</script>";  } 
                  else{
                    mysqli_query($db,"INSERT INTO planning(id_subject,id_teacher,id_teacher2,id_room,jour,time_start,time_end)
                    VALUES('$id_subject','$id_teacher','$id_teacher2','$id_room','$date','$time_start','$time_end')")or die(mysqli_error());
                  
                    echo "<script type='text/javascript'>alert('le planning est ajouté avec succès 2');</script>"; 
                  echo "<script>document.location='principale.php'</script>"; }

            }else if($id_teacher2=="x" && $id_teacher3!="x" ){
                  $query3=mysqli_query($db,"select * from planning where (id_teacher='$id_teacher' or id_teacher2='$id_teacher' or id_teacher3='$id_teacher' or id_teacher='$id_teacher3' or id_teacher2='$id_teacher3' or id_teacher3='$id_teacher3' )  and (((time_start<='$time_start' and time_end>='$time_start' and ( ('$time_end'<=time_end) or ('$time_end'>time_end ) ) )  ) 
    or ( time_start>='$time_start'  and  (('$time_end'>=time_start and '$time_end'<=time_end) or ('$time_end'>time_end )) ))  and jour='$date'   ")or die(mysqli_error());
                    $count3=mysqli_num_rows($query3);
                    if ($count3>0){
                    echo "<script type='text/javascript'>alert('un professeur est dèja affecté à un examen au même temps ');</script>";
                    echo "<script>document.location='affectation_add.php'</script>";  } 
                  else{
                    mysqli_query($db,"INSERT INTO planning(id_subject,id_teacher,id_teacher3,id_room,jour,time_start,time_end)
                   VALUES('$id_subject','$id_teacher','$id_teacher3','$id_room','$date','$time_start','$time_end')")or die(mysqli_error());
                      echo "<script type='text/javascript'>alert('le planning est ajouté avec succès');</script>"; 
                  echo "<script>document.location='principale.php'</script>"; }


            }else{
              $query4=mysqli_query($db,"select * from planning where (id_teacher='$id_teacher' or id_teacher2='$id_teacher' or id_teacher3='$id_teacher')   and (((time_start<='$time_start' and time_end>='$time_start' and ( ('$time_end'<=time_end) or ('$time_end'>time_end ) ) )  ) 
    or ( time_start>='$time_start'  and  (('$time_end'>=time_start and '$time_end'<=time_end) or ('$time_end'>time_end )) ))   and jour='$date' ")or die(mysqli_error());
                    $count4=mysqli_num_rows($query4);
                    if ($count4>0){
                      //done
                    echo "<script type='text/javascript'>alert('un professeur est dèja affecté à un examen au même temps ');</script>";
                    echo "<script>document.location='affectation_add.php'</script>";  } 
                  else{
                      mysqli_query($db,"INSERT INTO planning(id_subject,id_teacher,id_room,jour,time_start,time_end)
                     VALUES('$id_subject','$id_teacher','$id_room','$date','$time_start','$time_end')")or die(mysqli_error());
                      echo "<script type='text/javascript'>alert('le planning est ajouté avec succès');</script>"; 
                      echo "<script>document.location='principale.php'</script>"; }



            }
          }
        }else if(isset($_POST['cancel'])){

           echo "<script>document.location='principale.php'</script>"; 
        }else{

          echo "<script type='text/javascript'>alert('Veillez Remplir tous les champs ');</script>"; 
           echo "<script>document.location='affectation_add.php'</script>"; 
        }

      


				  
	
?>