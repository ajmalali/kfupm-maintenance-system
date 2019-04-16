<?php
    require_once ("../../config.php");
    session_start();

    $name = $_POST["name"];
    $email = $_POST["email"];
    $id = $_POST["id"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $type = 3;    // 3 is for Requester
    // Check whether the ID exists
    $idExists = checkIDExists($id, $link);

    if ($idExists) {
        echo "ID already exists";
    } else {
        // insert into the user table
        $_SESSION["id"] = $id;
        $_SESSION["name"] = $name;
        $sql = "INSERT INTO USER VALUES ($id, '$name', '$password', $type)";
        mysqli_query($link, $sql);
        $sql = "INSERT INTO requester (Id, mobile, email) VALUES ($id, $phone, '$email')";
        mysqli_query($link, $sql);
    }

    function checkIDExists($id, $link) {
        $sql = "SELECT id from user where id = $id";
        echo $sql;
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
