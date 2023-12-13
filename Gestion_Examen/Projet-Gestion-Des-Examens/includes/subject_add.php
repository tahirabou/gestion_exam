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
<legend> Entrez les donneés du module:</legend>
<label>Module<span style="color: red"> </label>
<input type="text" name="first" placeholder="Module">
<label>Le professeur :</label>
<select name="teacher">
<option disabled selected value> Aucune Prof </option>
<?php
        include('db_connect.php');
        $query=mysqli_query($db,"select * from teacher  ")or die(mysqli_error());
          
          while($row=mysqli_fetch_array($query)){
      
            
    ?>
<option   value="<?php echo $row['id_teacher'];?>"><?php echo $row['nom'];?></option>
<?php }?> 
  </select>


<label>Anneé Scolaire<span style="color: red"> </label>


  <select name="year">

<?php
        include('db_connect.php');
        $query=mysqli_query($db,"select * from year  ")or die(mysqli_error());
          
          while($row=mysqli_fetch_array($query)){
            $id_year=$row['id_year'];
            $year=$row['year'];
          
            
    ?>
<option  value="<?php echo $row['id_year'];?>"><?php echo $row['year'];?></option>
<?php }?> 
  </select>





    
</fieldset>
<input type="submit" value="Save" name="save" />
<input  name="cancel" type="submit" value="Retour" />
					 
</form>
</div>

                  <?php 

                
    if(isset($_POST['save']) && !empty($_POST['year'] ) && !empty($_POST['first']) ){
                      
				$id_year = $_POST['year'];
				$id_teacher = $_POST['teacher'];
				$first = $_POST['first'];
				  if(is_numeric($id_teacher)==1){
						
									$query=mysqli_query($db,"select * from subject where subject='$first' and id_year='$id_year' and id_teacher='$id_teacher' ")or die(mysqli_error());
									$query2=mysqli_query($db,"select * from subject where subject='$first' ")or die(mysqli_error());
								$count2=mysqli_num_rows($query2);
								$count=mysqli_num_rows($query);
								if ($count>0 || $count2>0)
								{
									echo "<script type='text/javascript'>alert('Module dèjà Existant ou dèja affecté à un autre professeur');</script>";
									echo "<script>document.location='subjects.php'</script>";  
								}	
								else{
									mysqli_query($db,"INSERT INTO subject(subject,id_year,id_teacher) 
									VALUES('$first','$id_year','$id_teacher')")or die(mysqli_error());
								
									echo "<script type='text/javascript'>
								alert('Module Ajouté avec succès');</script>";	
								echo "<script>document.location='subjects.php'</script>"; }

							}
			else{ $query=mysqli_query($db,"select * from subject where subject='$first' and id_year='$id_year' ")or die(mysqli_error());
	            $query2=mysqli_query($db,"select * from subject where subject='$first' ")or die(mysqli_error());
				$count2=mysqli_num_rows($query2);
				$count=mysqli_num_rows($query);
				if ($count>0 || $count2>0)
				{
					echo "<script type='text/javascript'>alert('Module dèjà Existant ou dèja affecté à un autre professeur');</script>";
					echo "<script>document.location='subjects.php'</script>";  
				}	
				else{ 

				mysqli_query($db,"INSERT INTO subject(subject,id_year) 
					VALUES('$first','$id_year')")or die(mysqli_error());
				echo "<script type='text/javascript'>
								alert('Module Ajouté avec succès');</script>";	
								echo "<script>document.location='subjects.php'</script>"; 

			}}
				}


		else if(isset($_POST['cancel'])){
		echo "<script>document.location='subjects.php'</script>"; }
		

  

				  
	
?>
