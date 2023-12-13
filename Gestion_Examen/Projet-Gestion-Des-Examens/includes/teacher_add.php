<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../login.php');
endif;
?>

 <?php 
			
			  include('../cssmenu/bar-menu.php');
                 

			  
?>
<!DOCTYPE html>
<html>
<head>
<title>Ajout prof </title>
<link rel="stylesheet" type="text/css" href="../Css/form.css">
 <link rel="stylesheet" type="text/css" href="../cssmenu/cc.css">
 </head>

<body>
	

<!-----------form------------>

<div class="form-style-5">
<form  method="post" action="" >
<fieldset>
<legend> Entrez les données du prof:</legend>
<label>Nom et Prénom <span style="color: red"> </label>
<input type="text" name="last" placeholder="Enter nom et prénom " >



    
</fieldset>

<input type="submit" value="Save" name="save" />
<input  name="cancel" type="submit" value="Retour" />
					 
</form>
</div>

                  <?php 

                
                 if(isset($_POST['save']) && !empty($_POST['last'] ) ){
                 	 include('db_connect.php');
        


                  $last = $_POST['last'];	

	              $query=mysqli_query($db,"select * from teacher where nom='$last'")or die(mysqli_error());
				$count=mysqli_num_rows($query);
				if ($count>0)
				{
					echo "<script type='text/javascript'>alert('Le professeur Existe dèja');</script>";
					echo "<script>document.location='teachers.php'</script>";  
				}	
				else{
					mysqli_query($db,"INSERT INTO teacher(nom) 
					VALUES('$last')")or die(mysqli_error());
				
					echo "<script type='text/javascript'>
				alert('Le professeur est ajouté avec succès');</script>";	
				echo "<script>document.location='teachers.php'</script>";  
				}}
				else if(isset($_POST['cancel'])){
					echo "<script>document.location='teachers.php'</script>"; }
		


				  
	
?>
</body>
</html>