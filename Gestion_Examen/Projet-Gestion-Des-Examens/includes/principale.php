<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../login.php');

endif;?>
<?php

                
                 include('../cssmenu/bar-menu.php');
                 
            
?>

<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
    </head>

     <link rel="stylesheet" type="text/css" href="../cssmenu/cc.css">
    
    <link rel="stylesheet" type="text/css" href="../Css/table.css">
    <link rel="stylesheet" type="text/css" href="../Css/btn1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <body>


        <div id="content">
          <style type="text/css">
            
            h2{
              font-family: calibri;
              margin-top: 100px;
              font-size: 30px;

            }
          </style>
            
 

</head>
<body>
    

    <center>
    <h2>Affectation des Exam: </h2>
    </center>
<meta charset="utf-8">
<div class="container">
<table class="table table-bordered table-dark table-stripped">
              <thead class="thead thead-dark">
                <tr>
                <th>Anne Scolaire</th>
                <th>Nom du Module</th>
                <th>Num Salle</th>
                <th>prof </th>
                <th>Date Examen</th>
                <th>Heure-debut</th>
                <th>Heuree-fin</th>
                <th>Action</th>
                
               
                </tr>
              <thead>
              <tbody>
              
    <?php
        include('db_connect.php');
        $query=mysqli_query($db,"select * from planning ")or die(mysqli_error());
          
          while($row=mysqli_fetch_array($query)){
            $id=$row['id_planning'];
            $id_subject=$row['id_subject'];
            $id_teacher=$row['id_teacher'];
            $id_room=$row['id_room'];
            $jour=$row['jour'];
            $time_start=$row['time_start'];
            $time_end=$row['time_end'];
              $id_teacher2=$row['id_teacher2'];
              $id_teacher3=$row['id_teacher3'];
            



/********************************************/

            
    ?>

      <?php
        
        $sub=mysqli_query($db,"select subject,id_year from subject where id_subject='$id_subject' ")or die(mysqli_error());
          
          while($row=mysqli_fetch_array($sub)){
            $subject=$row['subject'];
            $id_year=$row['id_year'];

 ?>

<!----la classe --->



                <tr>
                     <td><?php  $query1=mysqli_query($db,"select year from year where id_year='$id_year' ")or die(mysqli_error());
                while($row=mysqli_fetch_array($query1)){
                    $year=$row['year'];
                    echo $year;?>

                    <?php }?> </td>
 <!-------subject--->                   





              

                <td><?php echo $subject;?></td>
                <?php }?> 
<!-- salle --------------------------------->





<!--Claasse ------------------------------------>

                <?php
                $salle=null;
        
        $sl=mysqli_query($db,"select room from room where id_room='$id_room' ")or die(mysqli_error());
          
          while($row=mysqli_fetch_array($sl)){
            $salle=$row['room'];

 ?><?php }?>

                <td> <?php echo $salle;?></td>
                 
<!-- Professeur --------------------------------->



                <?php
$nom=null;
        
        $tea=mysqli_query($db,"select nom from teacher where id_teacher='$id_teacher' ")or die(mysqli_error());
          
          while($row1=mysqli_fetch_array($tea)){
            $nom=$row1['nom'];

         

 ?><?php }?>  

         <?php
        $nom2=null;
        $te=mysqli_query($db,"select nom from teacher where id_teacher='$id_teacher2' ")or die(mysqli_error());
          
          while($row2=mysqli_fetch_array($te)){
            $nom2=$row2['nom'];
            
         

 ?><?php }?>  


   <?php
        $nom3=null;
        $tee=mysqli_query($db,"select nom from teacher where id_teacher='$id_teacher3' ")or die(mysqli_error());
          
          while($row3=mysqli_fetch_array($tee)){
            $nom3=$row3['nom'];
            
         

 ?><?php }?> 

<td>

             <?php  if($nom!=null){ echo $nom;?> <br></br> <?php }?>
                   <?php  if($nom2!=null){echo $nom2;?> <br></br> <?php }?>
                    <?php  if($nom3!=null){echo $nom3;?> <br></br> <?php }?>
 
                </td>
                
                    
<!-- Professeur --------------------------------->

                    <td><?php echo $jour;?></td>
<!-- Professeur --------------------------------->


                <td><?php echo $time_start;?></td>
                <td><?php echo $time_end;?></td>
                
                    

                
               
               
                <td > <a id="btnn" href="affectation_del.php?id=<?php echo $id;?>">  Supprimer<i class="fa fa-trash"></i></a> &nbsp
                <a id="btnn" href="affectation_edit.php?id=<?php echo $id;?>"> Modifier<i class="fa fa-edit"></i></a>
                
                
                </td>
        
                </tr>


             
<?php }?>  

</div>
    </body>
</html>