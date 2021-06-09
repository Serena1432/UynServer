<?php
error_reporting(0);
ini_set('display_errors', 0);
include "Config.php";
if ($_GET["token"] == $server_token) {
    include "Connection.php";

    if ($_GET["type"] == "set") {
        $sql = "SELECT * FROM `uyn_toggleping` WHERE server = " . addslashes($_GET["server"]);
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $sql2 = "UPDATE `uyn_toggleping` SET `enabled` = " . addslashes($_GET["enabled"]) . " WHERE server = " . addslashes($_GET["server"]);
                if (mysqli_query($conn, $sql2)) {
                    echo "Success";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }
        else {
            $sql = "INSERT INTO `uyn_toggleping` (`server`, `enabled`) VALUES (" . addslashes($_GET["server"]) . ", " . addslashes($_GET["enabled"]) . ")";
            if (mysqli_query($conn, $sql)) {
                echo "Success";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
    else if ($_GET["type"] == "get") {
        $sql = "SELECT * FROM `uyn_toggleping` WHERE 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $info[$row["server"]] = $row["enabled"];
            }
            echo json_encode($info);
        } else {
            echo "[]";
        }
        $conn->close();
    }
}
else {
echo 'Invalid token';
}
$conn->close();
?>
