<?php
if (isset($_POST)) {
    require 'lib.php';
 
    $id_visiter = $_POST['id_visiter'];
    $num_visiteur = $_POST['num_visiteur'];
    $num_site = $_POST['num_site'];
    $nbjrs = $_POST['nbjrs'];
    $date_visite = $_POST['date_visite'];
 
    $object = new CRUD();
 
    $object->Update($num_visiteur, $num_site, $nbjrs, $date_visite, $id_visiter);
}

?>