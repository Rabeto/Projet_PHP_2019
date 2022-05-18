<?php
if (isset($_POST['id_visiter']) && isset($_POST['id_visiter']) != "") {
    require 'lib.php';
    $user_id_visiter = $_POST['id_visiter'];
 
    $object = new CRUD();
    $object->Delete($user_id_visiter);
}
?>