<?php 
			session_start();
                 include('../cssmenu/bar-menu.php');
                 include('db_connect.php');
			$id=$_REQUEST['id'];
			$query=mysqli_query($db,"select * from room where id_room='$id'")or die(mysqli_error($db));
				 $ch=mysqli_fetch_array($query);
?>
                <link rel="stylesheet" type="text/css" href="../Css/form.css">
                 <link rel="stylesheet" type="text/css" href="../cssmenu/cc.css">
                 <div class="form-style-5">
                  <form method="post" action="room_update.php">
                  	<fieldset>
                  	<input type="hidden" class="form-control" name="id" value="<?php echo $ch['id_room'];?>" required>

                    
							<label for="date">Numero de la Salle :<span style="color: red"> *</label><br>
								<input type="text" name="room" placeholder="room" value="<?php echo $ch['room'];?>" required>	
						  
						  <div class="form-group">
							
								</fieldset>	

								<input type="submit" value="Confirmer" name="save" />
                                <input  name="cancel" type="submit" value="Cancel" />
						  

						  
                      </form>	