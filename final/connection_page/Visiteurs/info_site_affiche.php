<?php

require 'lib.php';
 
$object = new CRUD();
 
// Design initial table header
$data = '<table class="table table-bordered table-striped" id="tab">
                    <thead>
                        <tr>
                            <th>Nom Visiteur</th>
                            <th>Date</th>
                            <th>Tarif</th>
                            <th>Nombre de jours</th>
			                <th>Montant (en Ariary)</th>
                        </tr>
                    </thead>';
 
 
$users = $object->Search();
if (count($users) > 0) {

    foreach ($users as $user) {
            $data .= '<tbody id="myTable">
                            <tr>
                                <td>' . $user['nom'] . '</td>
                                <td>' . $user['date_visite'] . '</td>
                                <td>' . $user['tarif_jrs'] . '</td>
                                <td>' . $user['nbjrs'] . '</td>
                                <td>' . $user['Montant'] . '</td>
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