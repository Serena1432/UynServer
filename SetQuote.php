<?php
error_reporting(0);
ini_set('display_errors', 0);
include "Config.php";
if ($_GET["token"] == $server_token) {
include "Connection.php";

$sql = "SELECT * FROM `uyn_pingrespond` WHERE id = " . addslashes($_GET["id"]);
$result = $conn->query($sql);

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$sql2 = "UPDATE `uyn_pingrespond` SET `quote` = '" . addslashes($_GET["quote"]) . "' WHERE id = " . addslashes($_GET["id"]);
   if (mysqli_query($conn, $sql2)) {
       echo "Success";
   } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
}
}
else {
   $sql = "INSERT INTO `uyn_pingrespond` (`id`, `quote`) VALUES (" . addslashes($_GET["id"]) . ", '" . addslashes($_GET["quote"]) . "')";
   if (mysqli_query($conn, $sql)) {
       echo "Success";
   } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
}
$conn->close();
}
else {
echo 'Invalid token';
}
?>
