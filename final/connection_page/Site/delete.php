<?php
if (isset($_POST['id_site']) && isset($_POST['id_site']) != "") {
    require 'lib.php';
    $user_id_site = $_POST['id_site'];
 
    $object = new CRUD();
    $object->Delete($user_id_site);
}
?>