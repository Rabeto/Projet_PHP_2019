<?php
    require "lib.php";

    $object = new CRUD();

        // Design initial table header
    $data = '<table class="table table-bordered table-striped" id="tab">
                        <thead>
                            <tr>
                                <th>Nom Visiteur</th>
                                <th>Date</th>
                                <th>Tarif</th>
                                <th>Nombre de jours</th>
                                <th>Montant</th>
                            </tr>
                        </thead>';

        $site = $_GET["site"];
        $date1 = $_GET["date1"];
        $date2 = $_GET["date2"];

    $users = $object->Chercher($site,$date1,$date2);

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
        $data .= '<tr>
                      <td>Données Vides!</td>
                      <td>Données Vides!</td>
                      <td>Données Vides!</td>
                      <td>Données Vides!</td>
                      <td>Données Vides!</td>
                  </tr>';
    }

    $data .= '</table>';

    echo $data;
?>
