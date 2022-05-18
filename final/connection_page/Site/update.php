<?php
if (isset($_POST)) {
    require 'lib.php';
 
    
    $id_site = $_POST['id_site'];
    $num_site = $_POST['num_site'];
    $nom = $_POST['nom'];
    $lieu = $_POST['lieu'];
    $tarif_jrs = $_POST['tarif_jrs'];
 
    $object = new CRUD();
 
    $object->Update($num_site, $nom, $lieu, $tarif_jrs, $id_site);
}

?>