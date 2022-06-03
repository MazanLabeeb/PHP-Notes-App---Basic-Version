<?php

  require "partial/conn.php";
  session_start();
  if(isset($_SESSION['username']) && isset($_SESSION['loggedin'])){
    $usernameS = $_SESSION['username'];
    $loggedin = $_SESSION['loggedin'];
  }
  else{
    // header('location:login.php');
    // exit;
  }
  $sql = "SELECT * FROM `users`";
  $result = mysqli_query($conn, $sql);
  echo "<b>Bady taiz ho bhai :p</b><br><br>Total users: ".mysqli_num_rows($result).".<br>";
  $counter = 0;
  while($data = mysqli_fetch_assoc($result)){
    $counter++;
    echo "$counter. <b>Username</b> ". $data['username']." <b>Password</b> ".$data['password'];
    echo "<br>";
  }
?>