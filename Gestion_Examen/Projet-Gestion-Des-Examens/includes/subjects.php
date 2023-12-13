<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../login.php');
endif;?>

<?php

      
                 include('../cssmenu/bar-menu.php');
                 
            
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modules</title>
    
    <link rel="stylesheet" type="text/css" href="../Css/table.css">
     <link rel="stylesheet" type="text/css" href="../cssmenu/cc.css">
         <link rel="stylesheet" type="text/css" href="../Css/btn1.css">
         <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    <h2>Table des modules:</h2>
    </center>
<meta charset="utf-8">
<div class="container">
<table class="table table-bordered table-dark">
              <thead class="thead-dark">
                <tr>
                
                <th>Id</th>
                <th>Module</th>
                <th>Prof</th>
                <th>Année</th>
                
                <th>Action</th>
     
               
                </tr>
              <thead>
              <tbody>
              
    <?php
        include('db_connect.php');
        $query=mysqli_query($db,"select * from subject order by id_year")or die(mysqli_error());
          
          while($row=mysqli_fetch_array($query)){
            $id=$row['id_subject'];
            $subject=$row['subject'];
            $id_year=$row['id_year'];
            $id_teacher=$row['id_teacher'];
            
    ?>
                <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $subject;?></td>

                <td><?php  $query2=mysqli_query($db,"select nom from teacher where id_teacher='$id_teacher' ")or die(mysqli_error());
                while($row2=mysqli_fetch_array($query2)){
                    $teacher=$row2['nom'];
                    echo $teacher;?>

                    <?php }?> </td>


                    <td><?php  $query1=mysqli_query($db,"select year from year where id_year='$id_year' ")or die(mysqli_error());
                while($row=mysqli_fetch_array($query1)){
                    $year=$row['year'];
                    echo $year;?>

                    <?php }?> </td>
                    <td><a id="btnn" href="../includes/subject_del.php?id=<?php echo $id;?>"> Supprimer<i class="fa fa-trash"></i></a> &nbsp
                     <a id="btnn" href="../includes/subject_edit.php?id=<?php echo $id;?>"> Modifier<i class="fa fa-edit"></i></a>
               
                </td>
               
                
              
        
                </tr>


             
<?php }?>  
</tbody>
    <table/>         
</div>

</body>
</html>

