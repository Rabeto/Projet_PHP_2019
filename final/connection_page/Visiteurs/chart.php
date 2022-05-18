<?php
    require "lib.php";

    $object = new CRUD();

    $nom = object->graph_nom_site();
    $effectif = object->graph_effectif();
    $total = object->graph_total();

    echo "
            <div id="chart-container">
                <canvas id="mycanvas"></canvas>
             </div>


           <script>
           Graph('bar','mycanvas');

           function Graph(graph,i){
               var ctx = document.getElementById('i').getContext('2d');
               var barGraph = new Chart(ctx, {
                   type: 'bar',
                   data: {
                     labels: ". json_encode($nom) .",
                   datasets :
                     [{
                        label: 'Player Score',
                        backgroundColor: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: ". json_encode($effectif) ."
                     }]
                     }
                 });
                console.log();
             </script>";
?>
