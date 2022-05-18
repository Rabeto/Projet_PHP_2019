<?php
 
require 'lib.php';
 
$object = new CRUD();
 
// Design initial table header
$data = '<table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>N° Site</th>
                            <th>Nom</th>
                            <th>Lieu</th>
                            <th>Tarif Journalier</th>
                            <th>Editer</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>';
 
 
$users = $object->Read();
 
if (count($users) > 0) {

    foreach ($users as $user) {
            $data .= '<tbody id="myTable">
                            <tr>
                                <td>' . $user['num_site'] . '</td>
                                <td>' . $user['nom'] . '</td>
                                <td>' . $user['lieu'] . '</td>
                                <td>' . $user['tarif_jrs'] . '</td>
                                <td>
                                    <button onclick="GetUserDetails(' . $user['id_site'] . ')" class="btn btn-warning">Editer</button>
                                </td>
                                <td>
                                    <button onclick="DeleteUser(' . $user['id_site'] . ')" class="btn btn-danger">Supprimer</button>
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