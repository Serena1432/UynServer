<?php
include "Config.php";
include "Connection.php";

$sql = "SELECT * FROM `uyn_customprefix` WHERE 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $info[$row["id"]] = $row["prefix"];
    }
    echo json_encode($info);
} else {
    echo "[]";
}
$conn->close();
?>
