<?php
if (isset($_POST['num_visiteur']) && isset($_POST['num_site']) && isset($_POST['nbjrs']) && isset($_POST['date_visite'])) {
    require("lib.php");
 
    $num_visiteur = $_POST['num_visiteur'];
    $num_site = $_POST['num_site'];
    $nbjrs = $_POST['nbjrs'];
    $date_visite = $_POST['date_visite'];
 
    $object = new CRUD();
 
    $object->Create($num_visiteur, $num_site, $nbjrs, $date_visite);
}
?>