<?php

/* ===== Data with variable ====== */
/*
$server = "localhost";
$username = "root";
$password = "";
$database = "dci login"
*/

// Get connection
$con = mysqli_connect("localhost","root","","dci login");
if($con==false )
{
 die('Could not connect: '.mysqli_error());
}
// Choose which file
switch ($_POST['action'])
{
  case 'register':
    $uname = $_POST['username']; // Getting user_name
    $email = $_POST['email']; // Getting email_id
    $hash_pwd = hash('md5',$_POST['password']); // Getting password Encypted using 'md5' hashing
    // Insert data into table
    $query = 'INSERT INTO login_data (user_name, email_id, password) VALUES ("'.$uname.'", "'.$email.'", "'.$hash_pwd.'")';
    $result = mysqli_query($con, $query); // Execute MySQL query
    // Redirect to login page after successful registration
    if ($result)
    {
      header("location:login.php");
    } // End if
    break; // End of switch 'register'

  case 'signin':
    $uname = $_POST['usernm']; // Get username
    $pwd = $_POST['passwd']; // Get password

    $query = 'SELECT * FROM login_data WHERE user_name="'.$uname.'"'; // Query to get username from database
    $result = mysqli_query($con, $query); // Executes query

    if(mysqli_num_rows($result)>0) // True if username is already available
    {
      // Fetch field using indexed array function
      while ($row = mysqli_fetch_array($result))
      {
        $hash = $row[3];

        // Checking if both hash is equal
        $verified = md5($pwd) == $hash;
        if ($verified)
        {
          // Get username using database column_index
          $uname = $row[1];
          
          /* ===== SESSION ===== */
          session_start();
          $_SESSION['uname'] = $row[1];

          header("location:crud.php"); // Welcome page
        } // End if
        else
        {
          header("location:login.php?message= Username or password is incorrect");
        } // End else
      } // End While
    } // End if
    else
    {
      header("location:login.php?message= Please enter a valid Username and Password");
    } // End else

    break; // End of case 'Login'
} // End Switch statement
mysqli_close($con);

/* ====== Hashing password ======= */
/*
$pwd = hash('sha512',$_POST['passwd']);
echo $pwd;
*/

?>
