<?php
    require "lib.php";

    $object = new CRUD();
    
    // Design initial table header
    $data = '<select class="form-control" id="update_num_site">';
    
    
    $users = $object->Affiche_ns();
    
    if (count($users) > 0) {
        foreach ($users as $user) {
                $data .= '<option>' . $user['num_site'] . '</option>';
        }
    } else {
        // records not found
        $data .= '<option>Aucun N° Site détecter !</option>';
    }
    
    $data .= '</select>';
    
    echo $data;
?>