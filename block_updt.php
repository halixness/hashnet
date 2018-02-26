<?php

    // Generated value class
    class Stone { 
        public $value = '';
        public $index = array();
    } 
    
    // Getting JSON
    $stone = json_decode($_POST["stone"]);
    
    // DB Connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hashnet";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // String cleaning and db storing
    $stone->value = preg_replace('/\s+/', '', $stone->value);
    $sql = "INSERT INTO dictionary (value, hash, z, x, c, v, b, n, m, l, k, h) VALUES ('" . $stone->value . "','"
           . md5($stone->value) . "',"
           . $stone->index[0] . ", "
           . $stone->index[1] . ", "
           . $stone->index[2] . ", "
           . $stone->index[3] . ", "
           . $stone->index[4] . ", "
           . $stone->index[5] . ", "
           . $stone->index[6] . ", "
           . $stone->index[7] . ", "
           . $stone->index[8] . ", "
           . $stone->index[9] . ");";
        
    // Result
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();


?>