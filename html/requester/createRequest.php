<?php
    require_once('../../config.php');

    $service = $_POST['service'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $buildingNumber = $_POST['buildingNumber'];
    $roomNumber = $_POST['roomNumber'];
    $comment = $_POST['comment'];
    $userID = $_POST['userID'];

    echo $service. " " . $time. " ". $location. " ". $buildingNumber. " ". $roomNumber ." ". $userID;
    $sql = "INSERT INTO request (location, time, status, comments, user_id, service_id) VALUES ('$location', '$time', 'Processing', '$comment', '$userID', '$service')";
    if (!mysqli_query($link, $sql)) {
        echo "QUERY ERROR ".mysqli_error($link);
    }

