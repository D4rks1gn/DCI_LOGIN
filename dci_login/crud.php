<?php
session_start();
if(isset($_SESSION['uname']))
{
  include_once "crud-dci-login.php";
  $sql = 'SELECT * FROM crud_dci';
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result)>0) 
  {
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="./assets/crud-display.css">
      <!-- Bootstrap link -->
      <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

      <title>CRUD - PHP</title>
    </head>

    <body>

      <!-- Bootstrap Java Script -->
      <script src="./assets/js/jquery.min.js"></script>
      <script src="./assets/js/bootstrap.min.js"></script>

      <!-- Notification -->
        <?php
        if(isset($_SESSION['msg1'])) {
          echo '
          <div class="alert alert-success alert-dismissible text-center fade show" role="alert">
            <h4>'.$_SESSION['msg1'].'</h4>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
          </div>
          ';
          unset($_SESSION['msg1']);
        }
        if(isset($_SESSION['msg2'])) {
          echo '
          <div class="alert alert-info alert-dismissible text-center fade show" role="alert">
            <h4>'.$_SESSION['msg2'].'</h4>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
          </div>
          ';
          unset($_SESSION['msg2']);
        }
        if(isset($_SESSION['msg3'])) {
          echo '
            <div class="alert alert-success alert-dismissible text-center fade show" role="alert">
              <h4>'.$_SESSION['msg3'].'</h4>
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              </div>
              ';
          unset($_SESSION['msg3']);
        }
        ?>

        <!-- Top Navigation Bar -->
        <div class="grid-layouts container-fluid text-center">
          <div class="row justify-content-md-center">
            <div class="col-lg-4 bg">[Logo]</div>
            <div class="col-lg-4 bg text-center">Welcome <?php echo $_SESSION["uname"] ?></div>
            <div class="col-lg-4 bg text-center"><a href="logout.php" name="logout" class="btn btn-danger">Logout</a></div>
            </div>
        </div>

        <!-- navigation bar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">CRUD - DCI</a>
          <a class="navbar-brand" href="#"><?php echo $_SESSION["uname"] ?></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>
        
        
        <!-- CRUD Table = WORKED -->
        <div class="container mt-5">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#popupAddRow">+ Add Row</button>
        
          <div class="table-responsive-md text-white">
            <table class="table">
              <thead class="bg-primary">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col" class="col-lg-2">Username</th>
                    <th scope="col" class="col-lg-2">Full Name</th>
                    <th scope="col" class="col-lg-2">D.O.B.</th>
                    <th scope="col" class="col-lg-2">Email</th>
                    <th scope="col" class="col-lg-1">Gender</th>
                    <th scope="col" class="col-lg-1">Created</th>
                    <th colspan=2 scope="col" class="col-lg-2 text-center">Action</th>
                </tr>
              </thead>
        
              <tbody class="text-white bg-secondary">
                <?php
                while ($row = mysqli_fetch_array($result))
                {
                  echo $row[0];
                  echo '
                  <tr>
                    <th scope="row">'.$row[0].'</th>
                    <td class="col-lg-2">'.$row[1].'</td>
                    <td class="col-lg-2">'.$row[2].' '.$row[3].'</td>
                    <td class="col-lg-2">'.$row[4].'</td>
                    <td class="col-lg-2">'.$row[5].'</td>
                    ';
        
                    if($row[6]==0){
                      echo '<td class="col-lg-1">Male</td>';
                    }
                    else {
                      echo '<td class="col-lg-1">Female</td>';
                    }
        
                    echo '
                    <td class="col-lg-1">'.$row[8].'</td>
                    <td class="col-lg-1">
                      <a href="crud.php?editRow='.$row['id'].'" class="btn btn-info" data-toggle="modal" data-target="#updateRow">Update</a>
                    </td>
                    <td class="col-lg-1">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteRow">Delete</button>
                    </td>
                    </tr>';
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        
        <!-- Insert Pop-up Modal = WORKED -->
        <div class="modal fade" id="popupAddRow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        
              <form action="crud-insert.php" method="post" class="form">
                <div class="modal-body">
                  <div class="row justify-content-md-center">
                    <div class="form-group col-lg-6">
                      <label for="prof">User Name</label>
                      <input type="text" class="form-control" id="prof" name="prof" placeholder="Username" required>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="fnm">First Name</label>
                      <input type="text" class="form-control" id="fnm" name="fnm" placeholder="First Name"  required>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="lnm">Last Name</label>
                      <input type="text" class="form-control" id="lnm" name="lnm" placeholder="Last Name"  required>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="dob">Date of Birth</label>
                      <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth"  required>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="gender">Gender</label>
                      <select class="form-control" name="gender" id="gender">
                        <option value="0" required>Male</option>
                        <option value="1" required>Female</option>
                      </select>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="email">Email id</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Enter email id"  required>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="addRow">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
          
        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteRow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Row</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="crud-insert.php" method="post">
                <input type="hidden" name="deleteRow">
                <div class="modal-body">
                  Do you want to delete a row ?
                </div>
                <div class="modal-footer">
                  <?php $row = mysqli_fetch_array($result);?>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <?php echo '
                  <a href="crud-insert.php?deleteRow='.$row['id'].'" class="btn btn-danger">Delete</a>';
                  echo $row['id'];
                  ?>
                </div>
              </form>
            </div>
          </div>
        </div>
        
        <!-- Update Pop-up Modal -->
        <div class="modal fade" id="updateRow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="crud-insert.php" method="post" class="form">
                <div class="modal-body">
                  <div class="row justify-content-md-center">
                    <div class="form-group col-lg-6">
                      <label for="prof">User Name</label>
                      <input type="text" class="form-control" id="prof" name="prof" placeholder="Username" required>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="fnm">First Name</label>
                      <input type="text" class="form-control" id="fnm" name="fnm" placeholder="First Name"  required>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="lnm">Last Name</label>
                      <input type="text" class="form-control" id="lnm" name="lnm" placeholder="Last Name"  required>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="dob">Date of Birth</label>
                      <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="gender">Gender</label>
                      <select class="form-control" name="gender" id="gender">
                        <option value="0" required>Male</option>
                        <option value="1" required>Female</option>
                      </select>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="email">Email id</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Enter email id"  required>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="editRow">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
          
      </body>
      </html>
      <?php
    }
  }
  else {
        header('location:login.php?message=Please Login First');
  }
  mysqli_close($conn);
?>