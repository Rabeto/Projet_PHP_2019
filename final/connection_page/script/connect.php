<?php
  session_start();
  $error = '';
  if (isset($_POST['submit'])) {
    if (empty($_POST['user']) || empty($_POST['pass'])) {
        $error = "Username or Password is invalid";
    }
    else{
      $user = $_POST['user'];
      $pass= $_POST['pass'];

      $conn = mysqli_connect("localhost", "root", "", "visites");
      $query = "SELECT user, pass from admin_table where user=? AND pass=? LIMIT 1";

      $stmt = $conn->prepare($query);
      $stmt->bind_param("ss", $user, $pass);
      $stmt->execute();
      $stmt->bind_result($user, $pass);
      $stmt->store_result();
          if($stmt->fetch()) //fetching the contents of the row {
              $_SESSION['login_user'] = $user; // Initializing Session
              header("location:../connection_page/index.php"); // Redirecting To Profile Page
          }
          mysqli_close($conn); // Closing Connection
      }
?>
