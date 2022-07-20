<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dci login";

    $conn = mysqli_connect($server, $username, $password, $dbname);
    if($conn ==false )
    {
        die('Could not connect: '.mysqli_error());
    }

?>