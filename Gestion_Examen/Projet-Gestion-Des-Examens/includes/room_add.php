<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../login.php');
endif;
?>
<?php 
	
			  include('../cssmenu/bar-menu.php');
                 

?>
<link rel="stylesheet" type="text/css" href="../Css/form.css">
 <link rel="stylesheet" type="text/css" href="../cssmenu/cc.css">
<!-----------form------------>

<div class="form-style-5">
<form  method="post" action="" >
<fieldset>
<legend> Entrez les données de la salle</legend>
<label>Module<span style="color: red"> </label>
<input type="text" name="room" placeholder="Entrer la Salle">
</fieldset>

<input type="submit" value="Save" name="save" />
<input  name="cancel" type="submit" value="Retour" />
					 
</form>
</div>

                  <?php 

                
                 if(isset($_POST['save']) && !empty($_POST['room'])   ){
                 	 include('db_connect.php');
                  
					$room = $_POST['room'];	
					$query=mysqli_query($db,"select * from room where room='$room'")or die(mysqli_error());
				$count=mysqli_num_rows($query);
				if ($count>0)
				{
					echo "<script type='text/javascript'>alert('La salle est dèja éxistente');</script>";
					echo "<script>document.location='rooms.php'</script>";  
				}	
				else{
					mysqli_query($db,"INSERT INTO room(room) 
					VALUES('$room')")or die(mysqli_error());
				
					echo "<script type='text/javascript'>
				alert('Successfuly added new member');</script>";	
				echo "<script>document.location='rooms.php'</script>";  
				}}
				else if(isset($_POST['cancel'])){
					echo "<script>document.location='rooms.php'</script>"; }
					
				  
	
?>