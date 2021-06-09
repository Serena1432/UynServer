<?php
error_reporting(0);
ini_set('display_errors', 0);
include "Config.php";
if ($_GET["token"] == $server_token) {
include "Connection.php";
 
// Câu SQL Insert
$sql = "DELETE FROM `uyn_pingrespond` WHERE id = " . $_GET["id"];
 
if (mysqli_query($conn, $sql)) {
    echo "Success";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
 
mysqli_close($conn);
}
else {
	echo 'Invalid token';
}
?>