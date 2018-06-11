<?php
$servername = "localhost";
$username = "namai";
$password = "namaipass";
$dbname = "namu_sistema";

$temp = $_GET['temp'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$datenow = date('Y-m-d');
$timenow = date('H:i:s');
$sql = "INSERT INTO kambarys1_temp(logdate, logtime, temp) VALUES (\"$datenow\",\"$timenow\",\"$temp\")";
$result = $conn->query($sql);

if(!$result)
{
    die('Invalid query: ' . $conn->connect_error);
}
echo "<h1>The data has been sent!</h1>";
$conn->close();
?>