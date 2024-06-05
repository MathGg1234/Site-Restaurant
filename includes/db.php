<?php
$servername = "localhost";
$username = "root";
$password = "[MDPPour@dminD4]";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
