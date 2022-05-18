<?php
  session_start();
  include('connect.php'); // Includes Login Script
  session_destroy();
    header("location: ../connection_page/script/login.php"); // Redirecting To Profile Page
?>
