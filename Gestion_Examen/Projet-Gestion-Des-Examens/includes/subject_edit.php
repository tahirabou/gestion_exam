<?php 
			session_start();
                 include('../cssmenu/bar-menu.php');
                 include('db_connect.php');
			$id=$_REQUEST['id'];
			$query=mysqli_query($db,"select * from subject where id_subject='$id'")or die(mysqli_error($db));
				 $ch=mysqli_fetch_array($query);
				 $idt2=$ch['id_teacher'];
				  $idy=$ch['id_year'];
?>
                <link rel="stylesheet" type="text/css" href="../Css/form.css">
                 <link rel="stylesheet" type="text/css" href="../cssmenu/cc.css">
                 <div class="form-style-5">
                  <form method="post" action="subject_update.php">
                  	<fieldset>
                  	<input type="hidden" class="form-control" name="id" value="<?php echo $ch['id_subject'];?>" required>

                    
							<label>Module<span style="color: red"> *</label><br>
								<input type="text" name="first" placeholder="Module" value="<?php echo $ch['subject'];?>" required>	

						  <label for="date" align="center">Le Professeur:</label>

						        <select name="teacher">
                                       <?php
                                       if($ch['id_teacher']!=null){
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


<!--##~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~!-->



								  <label for="date" align="center">L'année Scolaire :<span style="color: red"> *</label>
						        <select name="year">

                                  <?php

								$a = mysqli_query($db,"SELECT * from year where id_year='$idy'");
								$ty=mysqli_fetch_array($a);



								echo '<option value="'.$ty['id_year'].'">'.$ty['year'].'</option>';


								        
								        $querya=mysqli_query($db,"SELECT * from year where id_year!='$idy' ")or die(mysqli_error());
								          
								          while($rowe=mysqli_fetch_array($querya)){

								        echo '<option value="'.$rowe['id_year'].'">'.$rowe['year'].'</option>';
								} ?>
								</select>

								</fieldset>	

								<input type="submit" value="Confirmer" name="save" />
                                <input  name="cancel" type="submit" value="Cancel" />
						  

						  
                      </form>	