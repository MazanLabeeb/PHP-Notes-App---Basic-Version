<?php
  require "partial/conn.php";
  session_start();
  $invalidlogin = false;
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    
    $sql = "SELECT * FROM `users` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)){
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;
      header('location:index.php');
    }else $invalidlogin = true;
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
    <link href="partial/sign.css" rel="stylesheet">
    <title>Hello, world!</title>
  </head>
  <body>
    <!-- header  -->
    <?php require "partial/header.php"; ?>
    <?php
        if($invalidlogin){
          echo '
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Invalid Username or Password</strong> You can <b><a class="link-success"  href="signup.php">Create</a></b> a new account for free.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              ';
        }
      ?>
    <div class=" login" style="text-align:center;">
    
      <main class="form-signin">
          <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
              <img class="mb-4" src="partial/bootstrap-logo.svg" alt="" width="72" height="57">
              <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

              <div class="form-floating">
              <input type="text"  name ="username"  class="form-control username" id="floatingInput" placeholder="username">
              <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating">
              <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
              </div>

              <div class="checkbox mb-3">
              <label>
                  <input type="checkbox" value="remember-me"> Remember me
              </label>
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
              <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
          </form>
      </main>
    </div>
    <?php
        require "partial/footer.php"; 
    ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  </body>
</html>