<?php
  include('../script/session.php');
  if(!isset($_SESSION['login_user'])){
    header("location: ../script/login.php"); // Redirecting To Home Page
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Acceuil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <!-- SweetAlert -->
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css"/>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert.js"></script>

    <style>
      body,h1 {font-family: "Raleway", sans-serif}
      body, html {height: 100%}
      .bgimg {
          background-image: url('image/baobab.jpg');
          min-height: 100%;
          background-position: center;
          background-size: cover;
          background-attachment: fixed;
          background-repeat: no-repeat;
      }
  </style>
<body>

</head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="">GESTION DES VISITES DES SITES TOURISTIQUES</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Acceuil</a></li>
          <li><a href="Visiteurs/visiteur.php">Visiteur</a></li>
          <li><a href="Site/site.php">Site</a></li>
          <li><a href="Visiter/visiter.php">Visiter</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Information<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="Visiteurs/info_visite_site.php">Infos des visites par sites</a></li>
                <li><a href="Visiteurs/info_site.php">Infos sur les sites</a></li>
                <li><a href="Visiteurs/histogram.php">Graphe des sites</a></li>
              </ul>
          </li>
          <li><button class="btn btn-danger navbar-btn"><a href="script/logout.php" style="text-decoration:none;color:white">Déconnection</a></button></li>
        </ul>
      </div>
    </nav>

    <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
      <div class="w3-display-middle">
        <h1 class="w3-jumbo w3-animate-top">Bienvenue</h1>
        <hr class="w3-border-grey" style="margin:auto;width:40%">
        <p class="w3-large w3-center">Créer par <br> Rabeto Mac Manfred Hardy</p>
      </div>
    </div>

    </body>
</html>
