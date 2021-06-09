<?php
error_reporting(0);
ini_set('display_errors', 0);
include "Config.php";
include "Connection.php";

$sql = "SELECT * FROM `uyn_pingrespond` WHERE 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $info[$row["id"]] = $row["quote"];
    }
    echo json_encode($info);
} else {
    echo "[]";
}
$conn->close();
?>