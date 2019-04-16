<?php
    require_once ('../../config.php');

    $requestID = $_POST['requestID'];
    $rating = $_POST['rating'];

    $sql = "UPDATE request SET rating = $rating, status = 'Completed' WHERE request_id = $requestID";
    mysqli_query($link, $sql);

    $sql = "SELECT request_id, status, service, rating, requested_at FROM request INNER JOIN service s on request.service_id = s.id
                    WHERE request_id = $requestID;";

    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row["request_id"] . "</td>";
                echo "<td>" . $row["service"] . "</td>";
                echo "<td>" . $row["rating"] . "</td>";
                echo "<td>" . $row["requested_at"] . "</td>";
                $status = $row["status"];
                if ($status == "Processing") {
                    $class = "text-primary";
                } else if ($status == "Cancelled") {
                    $class = "text-danger";
                } else {
                    $class = "text-success";
                }
                echo "<td class='$class'>" . $status . "</td>";
                echo "</tr>";
            }
        }
    }
