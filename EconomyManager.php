<?php
include "Config.php";
if ($_GET["token"] == $server_token || $_POST["token"] == $server_token)
{
    include "Connection.php";

    if ($_POST["type"] == "add")
    {
        $sql2 = "INSERT INTO `uyn_economymanager`(`id`, `data`) VALUES (" . addslashes($_POST["id"]) . ", \"" . addslashes($_POST["data"]) . "\")";
        if (mysqli_query($conn, $sql2))
        {
            echo "Success";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    if ($_POST["type"] == "update")
    {
        $sql2 = "UPDATE `uyn_economymanager` SET `data` = \"" . addslashes($_POST["data"]) . "\" WHERE `id` = " . addslashes($_POST["id"]);
        if (mysqli_query($conn, $sql2))
        {
            echo "Success";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else if ($_GET["type"] == "delete")
    {
        $sql2 = "DELETE FROM `uyn_economymanager` WHERE id = " . addslashes($_GET["id"]);
        if (mysqli_query($conn, $sql2))
        {
            echo "Success";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else if ($_GET["type"] == "get")
    {
        $sql = "SELECT * FROM `uyn_economymanager` WHERE 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            $data = [];
            while ($row = $result->fetch_assoc())
            {
                $data[$row["id"]] = json_decode($row["data"]);
            }
            echo json_encode($data);
        }
        else
        {
            echo "[]";
        }
        $conn->close();
    }
}
else
{
    echo 'Error: Invalid token';
}
?>
