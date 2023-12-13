<?php 
			session_start();
                 include('../cssmenu/bar-menu.php');
                 include('db_connect.php');
			$id=$_REQUEST['id'];
			$query=mysqli_query($db,"select * from teacher where id_teacher='$id'")or die(mysqli_error($db));
				 $ch=mysqli_fetch_array($query);
?>
                <link rel="stylesheet" type="text/css" href="../Css/form.css">
                 <link rel="stylesheet" type="text/css" href="../cssmenu/cc.css">
                 <div class="form-style-5">
                  <form method="post" action="teacher_update.php">
                  	<fieldset>
                  	<input type="hidden" class="form-control" name="id" value="<?php echo $ch['id_teacher'];?>" required>

                    
							<label for="date"> Prenom :<span style="color: red"> *</span></label><br>
								<input type="text" name="first" placeholder="Nom Complet" value="<?php echo $ch['nom'];?>" required>	
						  
						  
								</fieldset>	

								<input type="submit" value="Confirmer" name="save" />
                                <input  name="cancel" type="submit" value="Cancel" />
						  

						  
                      </form>	