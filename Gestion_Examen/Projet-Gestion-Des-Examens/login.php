
<html>
    <head>
      
    <link rel="stylesheet" type="text/css" href="css2/css/bootstrap.min.css">
       <link rel="stylesheet" type="text/css" href="Css/style1.css">
       <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
 
        <div  class="container"  id="container">
            <!-- zone de connexion -->
            <div class="panel panel-primary">
            <div class="panel-body ">
            <form action="verification.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Gmail:</b></label>
                <input type="text" placeholder="" name="email" >

                <label><b>Password:</b></label>
                <div class="">
                <input type="password" placeholder="" name="password" id="pass_log_id" />
               <span><i toggle="#password-field"  class="fa fa-fw fa-eye field_icon fa-lock fa-2x toggle-password"></i></span> 
                
              
                <input type="submit" id='submit' value='Login' >
                
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
            </div>
        </div>
        </div>	
        <script>
$("body").on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#pass_log_id");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
</script>
    </body>
</html>