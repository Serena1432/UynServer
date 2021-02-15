<?php
include "Config.php";
if ($_GET["token"] == $server_token) {
include "Connection.php";
 
$sql = "DELETE FROM `uyn_customprefix` WHERE id = " . $_GET["id"];
 
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