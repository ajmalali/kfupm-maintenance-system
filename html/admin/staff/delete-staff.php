<?php
    require '../../../config.php';

    $id = $_POST["id"];

    ChangeStatus($id, $link);

    function ChangeStatus($id, $link) {
        $sql = "DELETE FROM user WHERE id = $id";
        mysqli_query($link, $sql);

        $sql = "DELETE FROM staff WHERE id = $id";
        mysqli_query($link, $sql);
        echo $sql;
    }
