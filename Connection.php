<?php
error_reporting(0);
ini_set('display_errors', 0);
include "Config.php";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
