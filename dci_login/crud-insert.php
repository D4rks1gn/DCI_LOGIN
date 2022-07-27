<?php
session_start();
if(isset($_SESSION['uname'])) {

    include_once "crud-dci-login.php";
    
// Insert Row
    if(isset($_POST['addRow']))
    {
        $profile = $_POST['prof'];
        $fname = $_POST['fnm'];
        $lname = $_POST['lnm'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $gen = $_POST['gender'];

        $query = 'INSERT INTO crud_dci (username, first_name, last_name, date_of_birth, email, gender, created_by) VALUES ("'.$profile.'","'.$fname.'","'.$lname.'","'.$dob.'","'.$email.'","'.$gen.'","'.$_SESSION['uname'].'")';
        $result = mysqli_query($conn, $query);
        $_SESSION['msg1']="1 Row Inserted";
        header("location:crud.php");
    }
//    else {
//        $_SESSION['msg1']="No Records Inserted";
//        header("location:crud.php");
//    }

// Update Row
    if (isset($_POST['editRow'])) {
        $profile = $_POST['prof'];
        $fname = $_POST['fnm'];
        $lname = $_POST['lnm'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $gen = $_POST['gender'];

        $id=$_POST['editRow'];
        $query = "UPDATE crud_dci SET username = $profile, first_name = $fname, last_name = $lname, date_of_birth = $dob, email = $email, gender = $gen WHERE id=$id";
        $result = mysqli_query($conn, $query);

        $_SESSION['msg2']="1 Row Updated";
        header("location:crud.php");
    }
//   else {
//       $_SESSION['msg2']="Nothing Updated";
//       header("location:crud.php");
//   }

// Delete Row
    if(isset($_GET['deleteRow'])) {
        $id=$_GET['deleteRow'];
        $query = "DELETE FROM crud_dci WHERE id=$id";
        $result = mysqli_query($conn, $query);
        $_SESSION['msg3']="1 Row Deleted";
        header("location:crud.php");
    }
//    else {
//        $_SESSION['msg3']="No Records Found";
 //       header("location:crud.php");
  //  }
}
else {
    header('location:login.php?message=Please Login First');
}
mysqli_close($conn);
?>