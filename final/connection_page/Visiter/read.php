<?php
 
require 'lib.php';
 
$object = new CRUD();
 
// Design initial table header
$data = '<table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>N° Visiteur</th>
                            <th>N° Site</th>
                            <th>Nombre de jours</th>
                            <th>Date de visite</th>
                            <th>Editer</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>';
 
 
$users = $object->Read();
 
if (count($users) > 0) {
    foreach ($users as $user) {
            $data .= '<tbody id="myTable">
                            <tr>
                                <td>' . $user['num_visiteur'] . '</td>
                                <td>' . $user['num_site'] . '</td>
                                <td>' . $user['nbjrs'] . '</td>
                                <td>' . $user['date_visite'] . '</td>
                                <td>
                                    <button onclick="GetUserDetails(' . $user['id_visiter'] . ')" class="btn btn-warning">Editer</button>
                                </td>
                                <td>
                                    <button onclick="DeleteUser(' . $user['id_visiter'] . ')" class="btn btn-danger">Supprimer</button>
                                </td>
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