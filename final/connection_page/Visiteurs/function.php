<?php
    if (isset($_POST['myInput']) != ""){
        require 'lib.php';
        $site = $_POST['myInput'];
    
        $object = new CRUD();
        
        $users = $object->Chercher($site);
    
        echo $users;
    }
?>