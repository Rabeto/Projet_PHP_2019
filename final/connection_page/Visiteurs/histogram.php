html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Graphe</title>

            <!-- Bootstrap CSS File  -->
        <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
            <!-- SweetAlert -->
        <link rel="stylesheet" type="text/css" href="sweetalert.css"/>
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

            <?php
              $servername = "localhost";
              $username = "root";
              $password = "";

              $conn = new PDO("mysql:host=$servername;dbname=visites", $username, $password);

                $data = [];
                $data1 = [];
                $data2 = [];

                $cr = "";
                $cr1 = "";
                $cr2 = "";

                $stmt = $conn->prepare("select nom from site,visiter where site.num_site=visiter.num_site group by nom");
                $stmt1 = $conn->prepare("select count(nom) as effectif from site,visiter where site.num_site=visiter.num_site group by nom");
                $stmt2 = $conn->prepare("select sum(tarif_jrs*nbjrs) as total from site,visiter where site.num_site=visiter.num_site group by nom");

                $stmt->execute();
                $stmt1->execute();
                $stmt2->execute();


                while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                  extract($row);
                  $cr = $cr."'#".rand(0,9)."".rand(0,9)."".rand(0,9)."',";
                  $data[] = $row['nom'];
                }

                $cr = rtrim($cr,',');

                while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC))
                {
                  extract($row1);
                  $data1[] = $row1['effectif'];
                }

                while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))
                {
                  extract($row2);
                  $data2[] = $row2['total'];
                }

                echo "
                <!-- ChartJS -->
                <script type='text/javascript' src='Chart.min.js'></script>
                <br><br><br><div class='container'>
                    <div class='card'>
                        <div class='card-header'><button class='btn btn-success'onclick='save()'>Enregistrer en PDF</button></div>
                            <div class='card-body'>
                                <div id='chart-container' id='chart'>
                                    <canvas id='mycanvas'></canvas><br>
                                 </div>
                            </div>
                        <div class='card-footer'></div>
                    </div>
                  </div>
               <script>
               graph('bar','mycanvas');
               //graph('line','mycanvas1');
               //graph('polarArea','mycanvas2');
               //graph('pie','mycanvas3');
               //graph('radar','mycanvas4');
               //graph('doughnut','mycanvas5');

               function graph(graph,a){
                   var ctx = document.getElementById(a).getContext('2d');
                   var barGraph = new Chart(ctx, {
                       type: graph,
                       data: {
                         labels: ". json_encode($data) .",
                       datasets :
                         [{
                            label: 'Histogramme des montants(en Ar) par sites',
                            backgroundColor: [".$cr."],
                            borderColor: [".$cr."],
                            hoverBackgroundColor: [".$cr."],
                            hoverBorderColor: [".$cr."],
                            data: ". json_encode($data2) ."
                         }]
                         }
                     });
                }
                    console.log();
                 </script>
                 ";
            ?>

            <!-- Jquery JS file -->
        <script type="text/javascript" src="jquery.min.js"></script>

        <!-- Bootstrap JS file -->
        <script type="text/javascript" src="bootstrap.min.js"></script>

        <!-- SweetAlert -->
        <script type="text/javascript" src="sweetalert.js"></script>

        <script type="text/javascript" src="info_visite_site.js"></script>

      </body>
</html>
