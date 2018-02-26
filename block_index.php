<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hashnet";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT MAX(z) as z, MAX(x) as x, MAX(c) as c, MAX(v) as v, MAX(b) as b, MAX(n) as n, MAX(m) as m, MAX(l) as l, MAX(k) as k, MAX(h) as h
            FROM dictionary;";
        
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo(json_encode($row));
        }
    } else {
        echo "0 results";
    }
    $conn->close();


?>