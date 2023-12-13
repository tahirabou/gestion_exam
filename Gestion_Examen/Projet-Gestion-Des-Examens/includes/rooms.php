<?php

                session_start();
                 include('../cssmenu/bar-menu.php');
                 
            
?>
<!DOCTYPE html>
<html>
<head>
	<title>Les Salles</title>
	
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
	<h2>Table des Salles:</h2>
	</center>
<meta charset="utf-8">
<div class="container">
<table class="table table-bordered table-dark table-stripped">
              <thead class="thead-dark">
                <tr>
                
                <th>Id</th>
                <th>NumSalle</th>
                <th>Action</th>
               
                </tr>
              <thead>
              <tbody>
              
    <?php
        include('../includes/db_connect.php');
        $query=mysqli_query($db,"select * from room ")or die(mysqli_error());
          
          while($row=mysqli_fetch_array($query)){
            $id=$row['id_room'];
            $room=$row['room'];
            
    ?>
                <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $room;?></td>
                <td><a id="btnn" href="../includes/room_del.php?id=<?php echo $id;?>"> Supprimer<i class="fa fa-trash"></i></a>
                &nbsp
                <a id="btnn" href="../includes/room_edit.php?id=<?php echo $id;?>"> Modifier<i class="fa fa-edit"></i></a></td>
                
              
        
                </tr>


              
<?php }?>  
</tbody>
    <table/>         

</div>
</body>
</html>
