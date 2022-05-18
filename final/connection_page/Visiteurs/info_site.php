<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Information Sites</title>

            <!-- Bootstrap CSS File  -->
        <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
            <!-- SweetAlert -->
        <link rel="stylesheet" type="text/css" href="sweetalert.css"/>

        <style>
          body{
            background-image: url("../image/visiter.jpg");
            background-size: cover;
            min-height: 100%;
            background-repeat: no-repeat;
          }
        </style>

    </head>

    <body>

      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="../index.php">GESTION DES VISITES DES SITES TOURISTIQUES</a>
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
                        <form class="form-inline">
                            <h2>Rechercher :</h2>
                            <p><input class="col-4" id="myInput" name="myInput" type="text" placeholder="Site.."/>  Entre <input type="date" id="date1" class="col-2"> et <input type="date" id="date2" class="col-2"></p>
                            <button type="button" class="btn btn-info" onclick="search()">Rechercher</button>
                            <button type="button" class="btn btn-primary" id="btn_refresh">Actualiser</button>
                            <form class="form-inline">
                              <button type="button" class="btn btn-success" data-dismiss="modal" id="btn_total">Afficher Total</button>
                              <div class="input-group col-sm-3">
                                <input type="text" class="form-control" id="total" name="total" disabled/>
                              </div>
                            </form>
                        </form>
                    </div>
                </div>
            </div>

            <br><div class="row">
                <div class="pre-scrollable">
                    <div class="records_content"></div>
                </div>
            </div>
          </div>
        </div>

        <!-- Jquery JS file -->
        <script type="text/javascript" src="jquery.min.js"></script>

        <!-- Bootstrap JS file -->
        <script type="text/javascript" src="bootstrap.min.js"></script>

        <!-- SweetAlert -->
        <script type="text/javascript" src="sweetalert.js"></script>

        <!-- Custom JS file -->
        <script type="text/javascript" src="script_info_site.js"></script>

        <script type="text/javascript" src="function_total.js"></script>
    </body>
</html>
