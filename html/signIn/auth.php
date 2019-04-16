<?php
    require_once("../../config.php");

    session_start();
    $id = $_POST["id"];
    $password = $_POST["password"];

    $sql = "SELECT * from user where id = $id and password = '$password' ";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $type = $row['type'];
            $name = $row['name'];
        }
        if ($type == 1) {  // Admin
            $url = '../admin/requests.php';
        } else if ($type == 2) {   //  Staff
            $url = '../staff/staff-dashboard.php';
        } else if ($type == 3) {  // Requester
            $url = '../requester/user-dashboard.php';
        }
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
        echo $url;
    } else {
        echo 0;
    }

