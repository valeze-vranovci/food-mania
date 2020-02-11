<?php
include 'C:\xampp\htdocs\labcourse2\inc\dbconn.php'; 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html>
<head>
    <title>FoodMania</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="css/eater_style.css">
<link rel="stylesheet" type="text/css" href="css/user_style.css">

</head>
<body class="body">

	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="images/logo.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="container-fluid collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
      <li><a href="user_shitje.php">Shitjet <span class="sr-only"></span></a></li>
        <li><a href="user_receta.php">Recetat</a></li>
        <li><a href="user_profile.php">Profili im</a></li>
        <li>
             <?php 
                if(!isset($_SESSION['logged_in'])){
                   echo '<a></a>'; 
                    } else { 
                      echo '<a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;</a> ';
                    } 
            ?>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>