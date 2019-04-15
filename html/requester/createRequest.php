<?php
    require_once('../../config.php');

    session_start();

    $service = $_POST['service'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $buildingNumber = $_POST['buildingNumber'];
    $roomNumber = $_POST['roomNumber'];
    $comment = $_POST['comment'];
    $userID = $_SESSION['id'];

    $sql = "INSERT INTO request (location, time, status, comments, user_id, service_id,  requested_at)
    VALUES ('$location', '$time', 'Processing', '$comment', '$userID', '$service', NOW())";

    if (!mysqli_query($link, $sql)) {
        echo "QUERY ERROR " . mysqli_error($link);
    }

    $sql = "SELECT request_id, requested_at, service FROM request INNER JOIN service s on request.service_id = s.id ORDER BY request_id DESC LIMIT 1";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    $requestID = $row['request_id'];
    $time = $row['requested_at'];
    $serviceName = $row['service'];


    // Add to Ongoing requests
    echo "<div class=\"col-lg-4  col-md-6\"><div class=\"card mb-4\"\"><div class=\"card-body d-flex flex-column justify-content-between\">";
    echo "<h5 class=\"card-title\">$serviceName</h5>";
    echo "<h6 class=\"card-subtitle mb-3 text-muted\">Requested at: $time</h6>";
    echo "<p class=\"card-text\">Request ID: $requestID</p>";
    echo "<p class=\"card-text\">Status: Processing</p>";
    echo "<div class=\"row mt-3\">
                        <div class=\"col\">
                            <a href=\"#\" class=\"btn btn-primary w-100\">Rate</a>
                        </div>
                        <div class=\"col\">
                            <a href=\"#\" class=\"btn btn-outline-danger w-100\">Cancel</a>
                        </div>
                    </div>";
    echo "</div></div></div>";

