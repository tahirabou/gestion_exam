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
<form  method="post" action="affectation_add_verification.php" >
<fieldset>
  <!------------Année ------>

<legend> Entrez les informations de l'affectation</legend>



<label>Année Scolaire<span style="color: red"> *</label>

<select name="year" class="year">
  <option disabled selected value>Selectionner l'année avant le module </option>

<?php
include('db_connect.php');
$sql = mysqli_query($db,"SELECT * FROM year");
while($row=mysqli_fetch_array($sql))
{

echo '<option value="'.$row['id_year'].'">'.$row['year'].'</option>';
} ?>



</select>

<!------------Subject ------>

<label>Le module examiné<span style="color: red"> *</label><select name="subject" class="subject">
  <option disabled selected value>Selectionner l'année avant le module </option>
<option name="subject">Select subject</option>
</select>
<script src="jquery-3.5.1.min.js"></script>
<script type="text/javascript">
  
$(document).ready(function()
{
$(".year").change(function()
{
var id_year=$(this).val();
var post_id = 'id='+ id_year;
 
$.ajax
({
type: "POST",
url: "ajax.php",
data: post_id,
cache: false,
success: function(cities)
{
$(".subject").html(cities);
} 
});
 
});
});


  
</script>

<!--------------------------------La salle --------------------------->
<label>La Salle<span style="color: red"> *</label>
 <select name="room">

<?php
        include('db_connect.php');
        $query=mysqli_query($db,"select * from room  ")or die(mysqli_error());
          
          while($row=mysqli_fetch_array($query)){
            $id_room=$row['id_room'];
            $room=$row['room'];
          
            
    ?>
<option  value="<?php echo $row['id_room'];?>"><?php echo $row['room'];?></option>
<?php }?> 
  </select>

<!--------------------Professeur 1--------------------------------------->

<label>Professeur 1<span style="color: red"> *</label>
<select name="teacher">
<?php
        include('db_connect.php');
        $query=mysqli_query($db,"select * from teacher ")or die(mysqli_error());
          
          while($row=mysqli_fetch_array($query)){
            $id_teacher=$row['id_teacher'];
            
            $nom=$row['nom'];
          
            
    ?>
<option  value="<?php echo $id_teacher;?> "><?php echo $nom;?></option>
<?php }?> 
  </select>

<!-------------------------Professeur 2---------------------------------->
<label>Professeur 2</label>
<select name="teacher2">
  <option value="x"> Aucun Professeur </option>
<?php
        include('db_connect.php');
        $query2=mysqli_query($db,"select * from teacher ")or die(mysqli_error());
          
          while($row2=mysqli_fetch_array($query2)){
            $id_teacher2=$row2['id_teacher'];
            
            $nom2=$row2['nom'];
          
            
    ?>
<option  value="<?php echo $id_teacher2;?> "><?php echo $nom2;?></option>
<?php }?> 
  </select>
  <!---------------------------Professeur 3 -------------------------------->
<label>Professeur 3</label>
<select name="teacher3">
  <option value="x"> Aucun Professeur </option>
<?php

        include('db_connect.php');
        $query3=mysqli_query($db,"select * from teacher ")or die(mysqli_error());
          
          while($row3=mysqli_fetch_array($query3)){
            $id_teacher3=$row3['id_teacher'];
            
            $nom3=$row3['nom'];
          
            
    ?>
<option  value="<?php echo $id_teacher3;?> "><?php echo $nom3;?></option>
<?php }?> 
  </select>
<!-----------------------DATE------------------------------------>
   <label>La Date<span style="color: red"> *</label>
  <input type="date" name="date" placeholder="Date">

  <!-----------------------Debut ------------------------------------>
 
 <label>Début d'éxamen<span style="color: red"> *</label>
<input type="time" name="time_start" placeholder="start">

<!-----------------------fin ------------------------------------>
<label>Fin d'éxamen<span style="color: red"> *</label>
<input type="time" name="time_end" placeholder="End">

<!----------------------------------------------------------->



    
</fieldset>
<input type="submit" value="Confirmer" name="save" />
<input  name="cancel" type="submit" value="Cancel" />
					 
</form>
</div>


