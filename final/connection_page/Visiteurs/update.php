<?php
if (isset($_POST)) {
    require 'lib.php';
 
    $id = $_POST['id'];
    $num_visiteur = $_POST['num_visiteur'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
 
    $object = new CRUD();
 
    $object->Update($num_visiteur, $nom, $adresse, $id);
}

?>