<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Information Visites par Sites</title>

            <!-- Bootstrap CSS File  -->
        <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
            <!-- SweetAlert -->
        <link rel="stylesheet" type="text/css" href="sweetalert.css"/>
    </head>

    <style>
      body{
        background-image: url("../image/2.jpg");
        background-size: cover;
        min-height: 100%;
        background-repeat: no-repeat;
      }
    </style>

    <body>

      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="../index.php">Gestion des sites touristiques</a>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../index.php">Acceuil</a></li>
            <li><a href="visiteur.php">Visiteur</a></li>
            <li><a href="../Site/site.php">Site</a></li>
            <li><a href="../Visiter/visiter.php">Visiter</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Information<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="info_visite_site.php">Infos des visites par sites</a></li>
                  <li><a href="info_site.php">Infos sur les sites</a></li>
                  <li><a href="histogram.php">Graphe des sites</a></li>
                </ul>
            </li>
            <li><button class="btn btn-danger navbar-btn"><a href="../script/logout.php" style="text-decoration:none;color:white">Déconnection</a></button></li>
          </ul>
        </div>
      </nav>

        <br><br><br><div class="container">
          <div class="jumbotron" style="opacity:0.89;">
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group">
                    <h2>Rechercher :</h2>
                    <p><input class="col-2" id="site" name="site" type="text" placeholder="Site .."/><br><br><input class="col-3" id="myInput" name="myInput" type="number" placeholder="Année ..." max="9999" min="2019"/>
                    Mois :  <select class="col-2" id="sel1">
                                <option></option>
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                                <option>04</option>
                                <option>05</option>
                                <option>06</option>
                                <option>07</option>
                                <option>08</option>
                                <option>09</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                            </select>
      Entre <input type="date" id="date1" class="col-2" min="1" max="31"> et <input type="date" id="date2" class="col-2" min="1" max="31"></p>
                    <button type="button" class="btn btn-info" onclick="search_visite_site()">Rechercher</button>
                    <button type="button" class="btn btn-success" id="btn_refresh">Actualisation</button>
                </div>
            </div>
          </div>
            <br><div class="row">
                    <div class="records_content"></div>
                </div>
              </div>
        </div>

            <!-- Jquery JS file -->
        <script type="text/javascript" src="jquery.min.js"></script>

        <!-- Bootstrap JS file -->
        <script type="text/javascript" src="bootstrap.min.js"></script>

        <!-- SweetAlert -->
        <script type="text/javascript" src="sweetalert.js"></script>

        <script type="text/javascript" src="info_visite_site.js"></script>

    </body>
</html>
