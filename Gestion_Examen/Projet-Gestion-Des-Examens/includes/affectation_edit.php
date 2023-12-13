<?php 
      session_start();
                 include('../cssmenu/bar-menu.php');
                 include('db_connect.php');
      $id=$_REQUEST['id'];
      $query=mysqli_query($db,"select * from planning where id_planning='$id'")or die(mysqli_error($db));
         $ch=mysqli_fetch_array($query);
           $id_subject=$ch['id_subject'];
             $id_room=$ch['id_room'];


               $idt=$ch['id_teacher'];
                $idt2=$ch['id_teacher2'];
                 $idt3=$ch['id_teacher3'];
          

?>
                <link rel="stylesheet" type="text/css" href="../Css/form.css">
                     <link rel="stylesheet" type="text/css" href="../cssmenu/cc.css">
                 <div class="form-style-5">
                  <form method="post" action="affectation_update.php">
                    <fieldset>
                       <center>    <label><?php echo "Affectation numèro"." "."$id";?></label> </center>  
                    <input type="hidden" class="form-control" name="id" value="<?php echo $ch['id_planning'];?>" required>

                    
               

<!------------------>
<label>Le module examiné<span style="color: red"> *</label><select name="subject" class="subject">
<?php
include('db_connect.php');
$sqlee = mysqli_query($db,"SELECT * FROM subject where id_subject='$id_subject'");
$roww=mysqli_fetch_array($sqlee);




echo '<option value="'.$roww['id_subject'].'">'.$roww['subject'].'</option>';

$sqle = mysqli_query($db,"SELECT * FROM subject where id_subject!='$id_subject'");
while($rowZ=mysqli_fetch_array($sqle))
{
echo '<option value="'.$rowZ['id_subject'].'">'.$rowZ['subject'].'</option>';

} ?>
</select>

<!----------------------------------------------------------->
<label>La Salle <span style="color: red"> *</label>
 <select name="room">
<?php
if($id_room!=null){

$tt = mysqli_query($db,"SELECT * from room where id_room='$id_room'");
$ty=mysqli_fetch_array($tt);



echo '<option value="'.$ty['id_room'].'">'.$ty['room'].'</option>';}

        $bb=mysqli_query($db,"SELECT * from room where id_room!='$id_room'")or die(mysqli_error());
          while($rowi=mysqli_fetch_array($bb)){
    echo '<option value="'.$rowi['id_room'].'">'.$rowi['room'].'</option>';
} ?>
</select>
<!----------------------------------------------------------->


<label>Professeur 1<span style="color: red"> *</label>
 
<select name="teacher">
<?php
if($idt!=null){

$az = mysqli_query($db,"SELECT * from teacher where id_teacher='$idt'");
$ty1=mysqli_fetch_array($az);



echo '<option value="'.$ty1['id_teacher'].'">'.$ty1['nom'].'</option>';}


        
        $queryz=mysqli_query($db,"SELECT * from teacher where id_teacher!='$idt' ")or die(mysqli_error());
          
          while($rowf=mysqli_fetch_array($queryz)){

        echo '<option value="'.$rowf['id_teacher'].'">'.$rowf['nom'].'</option>';
} ?>
</select>

<!----------------------------------------------------------->
<label>Professeur 2</label>
<select name="teacher2">
<?php
if($idt2!=null){
$az2= mysqli_query($db,"SELECT * from teacher where id_teacher='$idt2'");
$ty2=mysqli_fetch_array($az2);

echo '<option value="'.$ty2['id_teacher'].'">'.$ty2['nom'].'</option>';}
?>

  <option value="x"> Aucun Professeur </option>
<?php
        include('db_connect.php');
        $query=mysqli_query($db,"SELECT * from teacher where id_teacher!='$idt2' ")or die(mysqli_error());
          
          while($row=mysqli_fetch_array($query)){
            $id_teacher=$row['id_teacher'];
            
            $nom=$row['nom'];
          
            
    ?>
<option  value="<?php echo $id_teacher;?> "><?php echo $nom;?></option>
<?php }?> 
  </select>

<!----------------------------------------------------------->
<label>Professeur 3</label>
<select name="teacher3">
<?php
if($idt3!=null){
$az3= mysqli_query($db,"SELECT * from teacher where id_teacher='$idt3'");
$ty3=mysqli_fetch_array($az3);

echo '<option value="'.$ty3['id_teacher'].'">'.$ty3['nom'].'</option>';}
?>

  <option value="x"> Aucun Professeur </option>
<?php
        include('db_connect.php');
        $querya=mysqli_query($db,"SELECT * from teacher where id_teacher!='$idt3' ")or die(mysqli_error());
          
          while($rowa=mysqli_fetch_array($querya)){
            $id_teacher=$rowa['id_teacher'];
            
            $nom=$rowa['nom'];
          
            
    ?>
<option  value="<?php echo $id_teacher;?> "><?php echo $nom;?></option>
<?php }?> 
  </select>


<!----------------------------------------------------------->
   <label>La Date<span style="color: red"> *</label>

  <input type="date" name="date" placeholder="Date"  value="<?php echo $ch['jour'];?>"  >

   <label>Début d'éxamen<span style="color: red"> *</label>
<input type="time" name="time_start" placeholder="start"  value="<?php echo $ch['time_start'];?>" >

<label>Fin d'éxamen<span style="color: red"> *</label>
<input type="time" name="time_end" placeholder="End"  value="<?php echo $ch['time_end'];?>" >


              
                  </fieldset> 

                  <input type="submit" value="Confirmer" name="save" />
                                  <input  name="cancel" type="submit" value="Cancel" />
                

              
                      </form> 