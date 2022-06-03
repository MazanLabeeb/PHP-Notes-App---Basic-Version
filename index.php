<?php

  require "partial/conn.php";
  session_start();
  if(isset($_SESSION['username']) && isset($_SESSION['loggedin'])){
    $usernameS = $_SESSION['username'];
    $loggedin = $_SESSION['loggedin'];
  }
  else{
    header('location:login.php');
    exit;
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>ToDo</title>
    <style>
      .b-example-divider {
        height: 0rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        
      }
      </style
  </head>
  <body>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Update the Note</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <div class="modal-body"> 
            <div class="container" id="modcon">
              <form class="mt-4" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <div class="mb-3">
                  <label for="exampleInputEmail2" class="form-label">Title</label>
                  <input type="text" value= "" name = "title" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                  <input type="hidden" value="2" name="sno" id = "hiddensno">
                  </div>
                <div class="mb-3">
                  <label class="form-label" for="w3review2">Description</label>
                  <textarea name = "description" class="form-control" id="w3review2" name="w3review" rows="4" cols="50"></textarea>
                </div>
                
              
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
          </form>
        </div>
      </div>
    </div>
      <?php require "partial/header.php"; ?>



  <!-- success block  -->
  <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!isset($_POST['sno'])){     
                $title = test_input($_POST['title']);
                $description = test_input($_POST['description']);
                $sql = "INSERT INTO `data` (`sno`, `title`, `description`, `timestamp`) VALUES (NULL, '$title', '$description', current_timestamp())";
                $result = mysqli_query($conn,$sql);
                if($result){
                    echo '<div class="container mt-4">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Note was added Successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                    </div>';
              }else{
                  echo '<div class="container mt-4">
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Failed!</strong> Note was not added.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                  </div>';
              }
        }else{
          $sno = test_input($_POST['sno']);
          $title = test_input($_POST['title']);
          $description = test_input($_POST['description']);
          $sql = "UPDATE `data` SET `title` = '$title', `description` = '$description' WHERE `data`.`sno` = $sno;";
          $result = mysqli_query($conn,$sql);
          if($result){
              echo '<div class="container mt-4">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> Note was Updated Successfully.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
              </div>';
        }else{
            echo '<div class="container mt-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> Note was not Updated.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
            </div>';
        }

        }
    }
    if($_SERVER["REQUEST_METHOD"] == "GET"){
     
      if(isset($_GET['delete'])){
        $delete = $_GET['delete'];
        $sql ="DELETE FROM `data` WHERE `data`.`sno` = $delete";
        $result = mysqli_query($conn, $sql);
        if(mysqli_affected_rows($conn)){
          echo '<div class="container mt-4">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Note was deleted Successfully.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
          </div>';
        }else{
          echo '<div class="container mt-4">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Note not Found!</strong> Note was already deleted.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
          </div>';
        }
      }
    }
  ?>
  <?php echo "<div class='container mt-3'><h1 class='display-4 text-primary' >Welcome <b>$usernameS!</b></h1></div>";?>
    <!-- Input Form  -->
  <div class="container">
    <form class="mt-2" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        
        <input type="text" name = "title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label class="form-label" for="w3review">Description</label>
        <textarea name = "description" class="form-control" id="w3review" name="w3review" rows="4" cols="50"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Add a note</button>
    </form>
  </div>

  <!-- table -->
    
    <div class="container">
      <table class="table" id ="example">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "SELECT * FROM `data`";
          $query = mysqli_query($conn, $sql);
          $counter = 0;
          while($row = mysqli_fetch_assoc( $query)){ 
            $counter++;
            $sno = $row['sno'];
            $description = $row['description'];
            $title = $row['title'];
            echo '   
              <tr>
                <th scope="row">'.$counter.'</th>
                <td>'.$title.'</td>
                <td>'.$description.'</td>
                <td><button type="button" onclick="myFunction('.$sno.')" id="'.$sno.'" class="btn btn-outline-primary mt-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit</button>
                <button class="btn btn-outline-danger mt-1" onclick="location.href=\'?delete='.$sno.' \';">Delete</button</td>
              </tr>
            ';
          }
        ?>
      </tbody>
    </table>
    </div>
     
   <?php require "partial/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
          <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );
         

              function myFunction(isno) {
                sno = document.getElementById(isno);
                var c = document.getElementById("exampleInputEmail2");
                var d = document.getElementById("w3review2");
                var b = document.getElementById("hiddensno");
                var par = sno.parentNode.parentNode;
                title = par.children[1].innerHTML;
                description = par.children[2].innerHTML;
                c.value = title;
                d.value = description;
                b.value = isno;
              }

            </script>
  </body>
</html>