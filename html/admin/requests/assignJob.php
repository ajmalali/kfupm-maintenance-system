<?php
    require_once('../../../config.php');

    $requestID = $_POST['requestID'];
    $staff = $_POST['staffID'];

    $sql = "INSERT INTO assignment (request_id, staff_id) VALUES ($requestID, $staff)";
    mysqli_query($link, $sql);

    $sql = "UPDATE request
            SET status = 'In-progress'
            WHERE request_id = $requestID;";
    mysqli_query($link, $sql);


