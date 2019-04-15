<?php
    require_once('../../config.php');

    $id = $_POST['requestID'];

    $sql = "UPDATE request SET status = 'Cancelled' WHERE request_id = $id";
    $result = mysqli_query($link, $sql);

