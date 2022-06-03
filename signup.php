<?php 
  require "partial/conn.php";
  session_start();
  $pmerror = false;
  $created = false;
  $e = false;
  if( $_SERVER["REQUEST_METHOD"] == "POST" ){
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $repassword = test_input($_POST['repassword']);

    $sql = " INSERT INTO `users` (`sno`, `username`, `password`, `timestamp`) VALUES (NULL, '$username', '$password', current_timestamp())";
    $exists = "SELECT * FROM `users` WHERE `username` LIKE '$username'";
    $e_result = mysqli_query($conn,$exists);
    $e_no = mysqli_num_rows($e_result);
    if($e_no>0)
      $e = true;
      else
      $e = false;
    if($password == $repassword && $e==false){
      $result = mysqli_query($conn, $sql);
      if($result){
        $created = true;
      }
    }
    if($password != $repassword)   $pmerror = true;
    
  }
  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="partial/sign.css" rel = "stylesheet" >
    <title>Sign Up - ToDo</title>
  </head>
  <body>
    <!-- header  -->
    <?php require "partial/header.php"; ?>

    <div class="container  mt-4">
    <?php
      if($pmerror){
        echo '<div class="container mt-4">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Passwords do not match!</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
             </div>';
      } 
      if($e){
        echo '<div class="container mt-4">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>User Already Exists!</strong> Another user with the username "'.$username.'" already Exists 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
             </div>';
      }
      if($created){
        echo '<div class="container mt-4">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Account Created Successfully!</strong> Now you can <b><a class="link-success"  href="login.php">Login</a></b> to continue
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
             </div>';
      } 

    ?>
    <h1>Create an account!</h1> 
      <form class="mt-4 signupform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <div class="mb-3 ">
          <label for="username" class="form-label">Username</label>
          
          <input type="text" name = "username" class="form-control" id="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label class="form-label" for="pass">Password</label>
          <input type="password" name = "password" class="form-control" id="pass" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label class="form-label" for="repass">Repeat Password</label>
          <input type="password" name = "repassword" class="form-control" id="repass" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="w-100 btn btn-lg btn-primary">Sign Up</button>
      </form>
    </div>

    <?php require "partial/footer.php" ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  </body>
</html>