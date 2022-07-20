<?php
session_start();
if(isset($_SESSION['uname'])){
  echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="./assets/crud-getdata.css">
      <!-- Bootstrap link -->
      <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

      <title>Document</title>
    </head>
    <body>

      <!-- Bootstrap Java Script -->
      <script src="./assets/js/jquery.min.js"></script>
      <script src="./assets/js/bootstrap.min.js"></script>

      <div class="grid-layouts container-fluid text-center">
        <div class="row">
          <div class="col-sm-3 bg">[Logo]</div>
          <div class="col-sm bg">Home About Contact</div>
          <div class="col-sm-2 bg"><button type="button" name="button">Login</button></div>
        </div>
      </div>

      <div class="grid-layouts container-md text-center">
        <div class="row text-center">
          <div class="col-sm">Enter Details</div>
        </div>
        <div class="form">
          <form class="" action="" method="post">
            <!-- Left title -->
            <div class="row">
              <div class="col-sm">Your Name :</div>
              <div class="col-sm"><input type="text" name="" value=""></div>
            </div>

            <div class="row">
              <div class="col-sm">Date of Birth :</div>
              <div class="col-sm"><input type="date" name="" value=""></div>
            </div>

            <div class="row">
              <div class="col-sm">Gender :</div>
              <div class="col-sm">
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female
              </div>
            </div>
            <div class="row">
              <div class="col-sm">State :</div>
              <div class="col-sm">
                <input type="radio" name="state" value="tamilnadu">Tamil Nadu
                <input type="radio" name="state" value="kerala">Kerala
                <input type="radio" name="state" value="andrapradesh">Andra Pradesh
              </div>
            </div>
            <div class="row">
              <div class="col text-center">
                <div class="footer">
                  <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </body>
    </html>
    ';
  }
  else {
    header('location:login.php?message=Please Login First');
  }
?>