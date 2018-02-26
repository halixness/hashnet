<?php

    // Db connection
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

?>

<html>

    <!-- Lib -->
    <head>
        <script
          src="https://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
    </head>
    
    
    <body style="background-image: url('bg.jpg');">
        
        <!-- NavBar -->
        <div style="background-color:black;" class="navbar transparent navbar-inverse navbar-fixed-top">
           <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="index.php">Hashnet</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Decrypter</a></li>
              <li><a href="min.html">Miner</a></li>
            </ul>
          </div>
        </div>
        
        <!-- Centered Form -->
        <div class="card" style="margin-top: 20%; margin-left: 40%;width: 30rem; background-color:white; padding: 60px; border-radius: 10px;">
            
            <h3 id="hashpass"> 
                <?php
                        
                        error_reporting(0);

                        // Processing input hash
                        if(isset($_REQUEST["input_hash"]) && !is_null($_REQUEST["input_hash"]))
                        {

                            // CSS Stuff
                            echo "<style>#hashpass{display:block}</style>";       
                            echo "<style>#inputpass{display:none}</style>"; 

                            // Querying value in local DB
                            $sql = "SELECT value FROM dictionary WHERE hash = '" . $_REQUEST["input_hash"] . "'";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo trim($row["value"]);
                                }
                            } else {
                                
                                // No results -> dump from Nitrxgen Remote Hash DB
                                $result = file_get_contents('http://www.nitrxgen.net/md5db/' . $_REQUEST["input_hash"]);
                                
                                if($result == "")
                                    echo trim("No hash found!");
                                else 
                                    echo $result;
                            
                            
                            }
                            $conn->close();

                        } else
                            echo "<style>#hashpass{display:none}</style>";     
                ?>     
            </h3>
            
            <!-- Input Form -->
            <form id="inputpass">
                  <div class="form-group">
                    <label for="input_hash">Hash</label>
                    
                    <input name="input_hash" type="text" class="form-control" id="input_hash" aria-describedby="hash_input" placeholder="">

                    <br>   
                    <small id="hash_input" class="form-text text-muted"> 
                      
                    <!-- Querying stats -->
                    <?php
                      
                        $sql = "SELECT COUNT(*) as count FROM dictionary";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo trim($row["count"]);
                                }
                            } else {
                                
                                echo "0";
                            
                        }
                        
                    ?>
                        
                     hashes local, 1 trilion on remote db.</small>
                  </div>
              <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </body>
</html>
