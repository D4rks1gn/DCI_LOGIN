<?php
session_start();
if(isset($_SESSION['uname']))
{
  include_once "crud-dci-login.php";
  $query = 'SELECT * FROM crud_dci';
  $result = mysqli_query($conn, $query);

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
        include "alert.php";
      ?>

        <!-- Top Navigation Bar -->
        <!-- navigation bar -->
        <?php 
          include "navbar.php";
        ?>
        
        
        <!-- CRUD Table = WORKED -->
        <div class="container mt-3">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#popupAddRow">+ Add Row</button>
        
          <div class="table-responsive-md text-white">
            <table class="table table-sortable">
              <thead class="bg-primary text-white">
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
                // Show Table Function
                function show($sql_result)
                {
                  $con = mysqli_connect("localhost","root","","dci login");

                  $query_run = mysqli_query($con, $sql_result);
                  if(mysqli_num_rows($query_run)>0) {
                      while ($row = mysqli_fetch_array($query_run)) {
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
                          ?>
                          <td class="col-lg-1"><?php echo $row[8] ?></td>

                          <!-- Update hidden -->
                          <td class="col-lg-1">
                            <a href="crud.php?editRow=<?php echo $row[0] ?>" class="btn btn-info" hidden data-toggle="modal" data-target="#updateRow">UPDATE</a>
                            <input type="hidden" name="id" value="<?php echo $row[0] ?>">
                          <!-- Update --> <a href="crud-update.php?editRow=<?php echo $row[0] ?>" class="btn btn-info">UPDATE</a>
                          </td>
                          <!-- Delete hidden -->
                          <td class="col-lg-1">
                            <a href="crud.php?deleteRow=<?php echo $row[0] ?>" hidden class="btn btn-danger" data-toggle="modal" data-target="#deleteRow">DELETE</a>
                            <input type="hidden" name="id" value="<?php echo $row[0] ?>">
                            <!-- Delete --> <a href="crud-insert.php?deleteRow=<?php echo $row[0] ?>" class="btn btn-danger">DELETE</a>
                          </td>
                        </tr>
                        <?php 
                      } 
                  }
                  else {
                    ?>
                    <tr>
                      <td colspan="8" class="text-center">No Records Found</td>
                    </tr>
                    <?php
                  }
                }
                
                // Show Search Result
                include "crud-dci-login.php";
                if(isset($_GET['search']))
                {
                  $filterValues = $_GET['search'];
                  $sql = "SELECT * FROM crud_dci WHERE CONCAT(username,first_name,last_name,gender,date_of_birth,email,created_by) LIKE '%$filterValues%' ";
                  $tableData = show($sql);
                }
                // Show all database data
                else
                {
                  $sql = 'SELECT * FROM crud_dci';
                  $tableData = show($sql);
                }
              ?>
              </tbody>
            </table>
          </div>
        </div>
        
        <?php
          //  Pop-up Model
          include "crud-popup-model.php";
        ?>
      </body>
      </html>
      <?php
  }
  else {
        header('location:login.php?message=Please Login First');
  }
}
mysqli_close($conn);
?>