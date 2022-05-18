<?php
if (isset($_POST['num_site']) && isset($_POST['nom']) && isset($_POST['lieu']) && isset($_POST['tarif_jrs'])) {
    require("lib.php");
 
    $num_site = $_POST['num_site'];
    $nom = $_POST['nom'];
    $lieu = $_POST['lieu'];
    $tarif_jrs = $_POST['tarif_jrs'];
 
    $object = new CRUD();
 
    $object->Create($num_site, $nom, $lieu, $tarif_jrs);
}
?>