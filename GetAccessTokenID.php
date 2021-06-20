<?php
include "Config.php";
if ($_GET["token"] == $server_token) {
	include "Connection.php";

	$sql = 'SELECT * FROM `uyn_logintoken` WHERE authCode = "' . addslashes($_GET["code"]) . '"';
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 echo '{"id": "' . $row["id"] . '"}';
		}
	}
	else {
	   echo '{"id": null}';
	}
	$conn->close();
}
else {
	echo 'Invalid token';
}
?>