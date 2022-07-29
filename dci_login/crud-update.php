<?php
include_once("crud-dci-login.php");
session_start();
if(isset($_SESSION['uname'])) {
  $id=$_GET['editRow'];

  $query="SELECT * FROM crud_dci WHERE id=$id";
  $query_run=mysqli_query($conn,$query);
  $row = mysqli_fetch_array($query_run);
  ?>

  <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/crud-update.css">
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

    <title>Update Page</title>
    </head>
    <body>

    <!-- Bootstrap Java Script -->
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

    <div class="table-responsive">
      <div class="container">
        <form action="crud-insert.php?editRow=<?php echo $row[0]?>" method="post" class="form">
          <table class="table text-white table-sm">
            <thead class="bg-primary">
              <th colspan=2 class="text-center">Update Form</th>
            </thead>
            <tbody class="bg-secondary">
              <tr>
                <th scope="row"><label for="prof">User Name</label></th>
                <td>
                  <input type="text" class="form-control" id="prof" name="prof" value="<?php echo $row[1] ?>" placeholder="Username" required>
                </td>
              </tr>
              <tr>
              <th scope="row"><label for="fnm">First Name</label></th>
                <td>
                  <input type="text" class="form-control" id="fnm" name="fnm" value="<?php echo $row[2] ?>" placeholder="First Name"  required>
                </td>
              </tr>
              <tr>
              <th scope="row"><label for="fnm">Last Name</label></th>
                <td>
                  <input type="text" class="form-control" id="lnm" name="lnm" value="<?php echo $row[3] ?>" placeholder="First Name"  required>
                </td>
              </tr>
              <tr>
              <th scope="row"><label for="dob">Date of Birth</label></th>
                <td>
                  <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row[4] ?>" required>
                </td>
              </tr>
              <tr>
                <th scope="row"><label for="email">Email id</label></th>
                <td>
                  <input type="text" class="form-control" id="email" name="email" value="<?php echo $row[5] ?>" placeholder="Enter email id"  required>
                </td>
              </tr>
              <tr>
                <th scope="row"><label for="gender">Gender</label></th>
                <td>
                  <select class="form-control" name="gender" id="gender">
                  <?php
                  if(strcmp($row[6],0)==0){ ?>
                    <option value="0" selected required>Male</option>
                    <option value="1" required>Female</option>    <?php
                  }
                  else { ?>
                    <option value="0" required>Male</option>
                    <option value="1" selected required>Female</option>
                  <?php
                  }
                  ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td colspan=2 class="text-center"><button class="btn btn-primary" type="submit">Save changes</a></button></td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
    </div>
    </body>
    </html>
  <?php
  }
  else {
        header('location:login.php?message=Please Login First');
  }
  mysqli_close($conn);
?>