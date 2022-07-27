<?php
session_start();
if(isset($_SESSION['uname'])){

    include_once "crud-dci-login.php";
    $sql = 'SELECT * FROM crud_dci';
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0) {
        while ($row = mysqli_fetch_array($result))
          {
            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link rel="stylesheet" href="./assets/crud-display.css">
            <!-- Bootstrap link -->
            <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

            <title>View Page</title>
            </head>
            <body>

            <!-- Bootstrap Java Script -->
            <script src="./assets/js/jquery.min.js"></script>
            <script src="./assets/js/bootstrap.min.js"></script>

            <div class="grid-layouts container-fluid text-center">
                <div class="row justify-content-md-center">
                    <div class="col-lg-3 bg">[Logo]</div>
                    <div class="col-lg-5 bg text-center">Home About Contact</div>
                    <div class="col-lg bg text-center">Welcome <span class="text-primary">  <a href="crud-profile.php" name="profile" class="">'.$_SESSION['uname'].'</a></span>  <a href="logout.php" name="logout" class="btn btn-danger">Logout</a></div>
                </div>
            </div>

            <div class="grid-layouts container-md">
                
                <div classs="table-responsive justify-content-md-center">
                    <table class="table table-sm text-white  table-hover text-center">
                        <thead class="text-center text-white bg-secondary">
                            <tr>
                                <th colspan="3">Profile Information</th>
                            </tr>
                        </thead>
                        <tbody class="text-white">
                            <tr>
                                <th>Profile Name</th>
                                <td> : </td>
                                <td>'.$_SESSION['uname'].'</td>
                            </tr>

                            <tr>
                                <th>Full Name</th>
                                <td> : </td>
                                <td>'.$row[2].' '.$row[3].'</td>
                            </tr>
                            
                            <tr>
                                <th>Date of Birth</th>
                                <td> : </td>
                                <td>'.$row[4].'</td>
                            </tr>
                            
                            <tr>
                                <th>Email</th>
                                <td> : </td>
                                <td>'.$row[5].'</td>
                            </tr>
                            
                            <tr>
                                <th>Gender</th>
                                <td> : </td>';
                                if($row[6]==0){
                                    echo '<td>Male</td>';
                                }
                                else {
                                    echo '<td>Female</td>';
                                }
                            echo '
                            </tr>
                            
                            <tr>
                                <th>State</th>
                                <td> : </td>
                                <td>'.$row[7].'</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>

            </div>
            </body>
            </html>';
          }
        }

    }
    else {
        header('location:login.php?message=Please Login First');
    }
    mysqli_close($conn);
?>
