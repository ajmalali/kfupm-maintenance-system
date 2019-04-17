<?php
    require_once('../../../config.php');
    $requestID = $_POST['requestID'];

    $sql = "UPDATE request
            SET status = 'Rejected'
            WHERE request_id = $requestID;";

    mysqli_query($link, $sql);
