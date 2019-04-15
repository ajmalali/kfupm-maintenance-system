<?php
    require_once('../../config.php');

    $id = $_POST['serviceType'];
    $sql = "SELECT id, service FROM service WHERE type_id = $id";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $name = $row['service'];
            $id = $row['id'];
            echo "<option value=\"$id\">$name</option>";
        }
    }

