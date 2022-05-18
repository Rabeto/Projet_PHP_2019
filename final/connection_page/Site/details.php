<?php
if (isset($_POST['id_site']) && isset($_POST['id_site']) != "") {
    require 'lib.php';
    $user_id_site = $_POST['id_site'];
 
    $object = new CRUD();
 
    echo $object->Details($user_id_site);
}
?>