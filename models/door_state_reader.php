<?php
    //include_once('../includes/db.inc.php');

    $servername = "localhost";
    $username = "namai";
    $password = "namaipass";
    $dbname = "namu_sistema";
    
    $state = $_POST['state'];
    $state = trim($state);



        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $datenow = date('Y-m-d');
        $timenow = date('H:i:s');

        $sql = "INSERT INTO durys1_busena(logdate, logtime, door_state) VALUES (\"$datenow\",\"$timenow\",\"$state\")";
        $result = $conn->query($sql);
        
        if(!$result)
        {
            die('Invalid query: ' . $conn->connect_error);
        }

        $conn->close();
 
    ?>



