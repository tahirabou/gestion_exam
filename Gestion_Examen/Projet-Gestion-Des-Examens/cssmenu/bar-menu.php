<!doctype html>
<html lang=''>
<head>

   
   <style type="text/css">

  #title{
    background-color: red;
  }


</style>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>




<nav id="nav" class="navbar navbar-inverse">

  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Gestion Exam</a>
    </div>
    &nbsp  &nbsp  &nbsp;
    <ul class="nav navbar-nav">
    
   
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-users"></i> Les Professeurs   &nbsp  &nbsp  &nbsp
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li ><a href='teachers.php'><i class="fa fa-users"></i> Liste des Professeurs</a></li>
         <li><a href='teacher_add.php'><i class="fa fa-plus"></i> Ajouter un Professeur</a></li>
          
        </ul>
        &nbsp  &nbsp  &nbsp
      </li>
      &nbsp  &nbsp  &nbsp
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-bank"></i>Les Salles
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href='rooms.php'><i class="fa fa-bank"></i>Liste des Salles</a></li>
         <li><a href='room_add.php'><i class="fa fa-plus"></i>Ajouter une salle</a></li>
          
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-book"></i>  Les Modules
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href='subjects.php'><i class="fa fa-book"></i>Liste des modules</a></li>
      <li><a href='subject_add.php'><i class="fa fa-plus"></i>Ajouter un module</a></li>
          
        </ul>
      </li>
     
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-user-o"></i>  Affectations
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href='principale.php'><i class="fa fa-user-o"></i>Liste des affectation</a></li>
        <li><a href='affectation_add.php'><i class="fa fa-plus"></i>Ajouter une affectation</a></li>
          
        </ul>
      </li>
     
      <li><a href='../deconnexion.php'><i class="fa fa-sign-out"></i>logout</a></li>
      
    </ul>
  </div>
</nav>

</body>
<html>
