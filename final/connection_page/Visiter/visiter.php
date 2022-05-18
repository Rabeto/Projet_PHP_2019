<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visiter</title>

    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="../Site/bootstrap.css"/>
    <!-- SweetAlert -->
    <link rel="stylesheet" type="text/css" href="sweetalert.css"/>

    <style>
    body{
      background-image: url("../image/visiter.jpg");
      background-size: cover;
      min-height: 100%;
      background-repeat: no-repeat;
      background-attachment: fixed;
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
        <li><a href="../Visiteurs/visiteur.php">Visiteur</a></li>
        <li><a href="../Site/site.php">Site</a></li>
        <li><a href="visiter.php">Visiter</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Information<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../Visiteurs/info_visite_site.php">Infos des visites par sites</a></li>
              <li><a href="../Visiteurs/info_site.php">Infos sur les sites</a></li>
              <li><a href="../Visiteurs/histogram.php">Graphe des sites</a></li>
            </ul>
        </li>
        <li><button class="btn btn-danger navbar-btn"><a href="../script/logout.php" style="text-decoration:none;color:white">Déconnection</a></button></li>
      </ul>
    </div>
  </nav>

 <!-- Content Section -->
<br><br><br><div class="container">
  <div class="jumbotron" style="opacity:0.89;">
      <div class="row">
          <div class="col-md-12">
              <div class="input-group">
              <h2>Rechercher :</h2>
              <input class="form-control" id="myInput" type="text" placeholder="Rechercher.."><br>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <div class="pull-right">
                  <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Ajouter</button>
              </div>
          </div>
      </div>
      <div class="row">
              <div class="pre-scrollable">
                  <div class="records_content"></div>
              </div>
      </div>
    </div>
</div>
<!-- /Content Section -->

<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Inscription</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="num_visiteur">N° Visiteur</label>
                   <div class="num_v"></div>
                </div>

                <div class="form-group">
                    <label for="num_site">N° Site</label>
                    <div class="num_s"></div>
                </div>

                <div class="form-group">
                    <label for="nbjrs">Nombre de jours</label>
                    <input type="number" id="nbjrs" class="form-control" min = "1"/>
                </div>

                <div class="form-group">
                    <label for="date_visite">Date visite</label>
                    <input type="date" id="date_visite" class="form-control"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Ajouter</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editer</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <div class="num_v_mod"></div>
                </div>

                <div class="form-group">
                    <label for="update_num_site">N° Site</label>
                    <div class="num_s_mod"></div>
                </div>

                <div class="form-group">
                    <label for="update_nbjrs">Nombre de jours</label>
                    <input type="number" id="update_nbjrs" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_date_visite">Date visite</label>
                    <input type="date" id="update_date_visite" class="form-control"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Enregistrer</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->



<!-- Jquery JS file -->
<script type="text/javascript" src="jquery.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="script.js"></script>

<!-- SweetAlert -->
<script type="text/javascript" src="sweetalert.js"></script>

<!-- Function search with JS -->
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>
