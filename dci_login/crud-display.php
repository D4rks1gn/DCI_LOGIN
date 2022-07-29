<?php
session_start();
if(isset($_SESSION['uname'])){

    include_once "crud-dci-login.php";
    $sql = 'SELECT * FROM crud_dci WHERE user_name ="'.$_SESSION['uname'].'"';
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==1) {
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
                <div class="col-sm-3 bg">[Logo]</div>
                <div class="col-sm bg text-right">Home About Contact</div>
                <div class="col-sm-2 bg"><a href="logout.php" name="logout" class="btn btn-danger">Logout</a></div>
                </div>
            </div>

            <div class="grid-layouts container-md text-center">
                <div class="row text-center">
                <div class="col-sm">Welcome '.$_SESSION['uname'].'</div>
                </div>
                <div class="form">
                <form class="" action="" method="post">
                    <!-- Left title -->
                    <div class="row">
                    <div class="col-sm">Profile Name :</div>
                    <div class="col-sm"><span>'.$_SESSION['uname'].'</span>></div>
                    </div>

                    <div class="row">
                    <div class="col-sm">Full Name :</div>
                    <div class="col-sm"><span>'.$row[2].' '.$row[3].'</span></div>
                    </div>

                    <div class="row">
                    <div class="col-sm">Date of Birth :</div>
                    <div class="col-sm"><span>'.$row[4].'</span></div>
                    </div>

                    <div class="row">
                    <div class="col-sm">Email :</div>
                    <div class="col-sm"><span>'.$row[5].'</span></div>
                    </div>

                    <div class="row">
                    <div class="col-sm">Gender :</div>
                    <div class="col-sm"><span>'.$row[6].'</span></div>
                    </div>

                    </div>
                    <div class="row">
                    <div class="col-sm">State :</div>
                    <div class="col-sm"><span>'.$row[7].'</span></div>
                    </div>
                    
                </form>
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