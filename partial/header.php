

  <?php
    $navlogout = false;
    if(isset($_SESSION['username']) && isset($_SESSION['loggedin'])){
      $navlogout = true;
    }
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">To-Do</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        
        <?php
          if(!$navlogout){
            echo '<li class="nav-item">
                    <a class="nav-link" href="signup.php">Sign Up</a>
                  </li>';
          }
          if($navlogout){
            echo '<li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                  </li>';

          }
        ?>
      </ul>
      <form class="d-flex ">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success btn-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>