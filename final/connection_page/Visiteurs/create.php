<?php
if (isset($_POST['num_visiteur']) && isset($_POST['nom']) && isset($_POST['adresse'])) {
    require("lib.php");
 
    $num_visiteur = $_POST['num_visiteur'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
 
    $object = new CRUD();
 
    $object->Create($num_visiteur, $nom, $adresse);
}
?>