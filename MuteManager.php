<?php
include "Config.php";
if ($_GET["token"] == $server_token)
{
    include "Connection.php";

    if ($_GET["type"] == "add")
    {
        $sql2 = "INSERT INTO `uyn_mutedusers`(`author`, `victim`, `server`, `endtime`) VALUES (" . addslashes($_GET["id"]) . ", " . addslashes($_GET["victim"]) . ", " . addslashes($_GET["server"]) . ", " . addslashes($_GET["endtime"]) . ")";
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
        $sql2 = "DELETE FROM `uyn_mutedusers` WHERE server = " . addslashes($_GET["server"]) . " AND victim = " . addslashes($_GET["victim"]);
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
        $sql = "SELECT * FROM `uyn_mutedusers` WHERE 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            $info = [];
            while ($row = $result->fetch_assoc())
            {
                $data = new StdClass();
                $data->id = $row["id"];
                $data->server = $row["server"];
                $data->author = $row["author"];
                $data->victim = $row["victim"];
                $data->endtime = $row["endtime"];
                array_push($info, $data);
            }
            echo json_encode($info);
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
