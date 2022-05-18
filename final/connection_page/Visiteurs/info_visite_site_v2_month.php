<?php

require 'lib.php';

 $object = new CRUD();

 // Design initial table header
 $data = '<table class="table table-bordered table-striped">
                     <thead>
                         <tr>
                             <th>Site</th>
                             <th>Effectif</th>
                             <th>Total</th>
                         </tr>
                     </thead>';

  $site = $_GET['site'];
  //$annee = $_GET['annee'];
  $mois = $_GET['mois'];
  //$date1 = $_GET['date1'];
  //$date2 = $_GET['date2'];

 $users = $object->Chercher_visite_site_by_month($site,$mois);
//print_r($users);
 if (count($users) > 0) {

     foreach ($users as $user) {
             $data .= '<tbody id="myTable">
                             <tr>
                                 <td>' . $user['Site'] . '</td>
                                 <td>' . $user['Effectif'] . '</td>
                                 <td>' . $user['Total'] . '</td>
                             </tr>
                         </tbody>';

     }
 } else {
     // records not found
     $data .= '<tr><td colspan="6">Données Vides!</td></tr>';
 }

 $data .= '</table>';

 echo $data;

 ?>
