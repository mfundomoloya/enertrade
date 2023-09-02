<?php
    // Database connection code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bot_chicken";

    $error = "";
    try {
        //code...
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    } catch ( Exception $e) {
        $error  = "Database Connection Failed: ".$e->getMessage();
    }
    
?>