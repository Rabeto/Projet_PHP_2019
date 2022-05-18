<?php

      $conn = mysqli_connect("localhost", "root", "", "visites");
      session_start();

      $user_check = $_SESSION['login_user'];

      $query = "SELECT user from admin_table where user = '$user_check'";
      $ses_sql = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($ses_sql);
      $login_session = $row['user'];
?>
