<?php
    require "lib.php";

    $object = new CRUD();
    
    // Design initial table header
    $data = '<select class="form-control" id="num_visiteur">';
    
    
    $users = $object->Affiche();
    
    if (count($users) > 0) {
        foreach ($users as $user) {
                $data .= '<option>' . $user['num_visiteur'] . '</option>';
        }
    } else {
        // records not found
        $data .= '<option>Aucun N° Visiteur détecter !</option>';
    }
    
    $data .= '</select>';
    
    echo $data;
?>