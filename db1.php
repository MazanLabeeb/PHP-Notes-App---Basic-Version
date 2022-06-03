<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "marksheet";
    $conn = mysqli_connect($servername,$username,$password,$database);
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Php Forms Handling and Databases</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Form&Db</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
  </nav>

  <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = test_input($_POST["name"]);
        $marks = test_input($_POST["marks"]);
        $sql = "INSERT INTO `maths` (`sno`, `name`, `marks`) VALUES (NULL, '$name', '$marks');";
        if(mysqli_query($conn, $sql)){
            echo '<div class="alert alert-success alert-dismissible" role="alert">
                <strong>Success! </strong> Record was added successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
  ?>

  <div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="mb-3">
        <label for="text" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="text" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="marks" class="form-label">Marks</label>
        <input type="text" name="marks" class="form-control" id="marks" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Enter the marks not the percentage</div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
    <hr>
    <div class="container">
        <h1 class="primary">Datasheet</h1>
        <table id = "example" class="table table-striped table-hover table-bordered"> 
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Marks</th>
                </tr>
            </thead>
            <tbody>
            <?php
                
                $sql = "SELECT * FROM `maths`";
                $result = mysqli_query($conn, $sql);
                $sum = 0;
                $counter = 0;
                while($row = mysqli_fetch_assoc($result)){
                    $sum += $row['marks'];
                    $counter++;
                    echo "<tr>";
                    echo "
                    <td>".$row['sno']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['marks']."</td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
        <strong>Average: </strong>
        <?php
            echo $sum/$counter;
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
        $('#example').DataTable();
        } );
    </script>
  </body>
</html>