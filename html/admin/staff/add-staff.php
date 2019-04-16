<?php
    require '../../../config.php';
    $id = $_POST["id"];
    $name = $_POST["name"];
    $type = $_POST["type"];
    addToDatabase($id, $name, $type, $link);

    $sql = "SELECT name FROM servicetype WHERE type_id = $type";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    $serviceType = $row['name'];
    UpdateTable($id, $name, $serviceType);

    function addToDatabase($id, $name, $type, $link) {
        $userType = 2;       // Status as 1 means the person is active and working
        // Insert these values into the table user
        $sql = "INSERT into user values($id, '$name', 'password', $userType)";
        mysqli_query($link, $sql);

        $sql = "INSERT into staff values($id, $type)";
        mysqli_query($link, $sql);
    }

    function UpdateTable($id, $name, $type) {

        // use echo to create the row
        echo "<tr>";       // id of each serial number is in each row so easier to access when we need to delete
        echo "<td>" . $id . "</td>";
        echo "<td>" . $name . "</td>";
        echo "<td>" . $type . "</td>";
        echo "<td>" . "<button type = \"button\" class = \"btn btn-danger mx-auto\">Remove" . "</button>" . "</td>";
        // type = button needed to avoid refresh
        echo "</tr>";
    }
