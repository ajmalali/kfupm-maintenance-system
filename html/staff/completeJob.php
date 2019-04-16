<?php
    require_once ('../../config.php');

    $requestID = $_POST['requestID'];

    $sql = "UPDATE request SET status = 'Completed' WHERE request_id = $requestID";
    mysqli_query($link, $sql);

    $sql = "SELECT request_id, service, rating, requested_at FROM request INNER JOIN service s on request.service_id = s.id
                    WHERE request_id = $requestID;";

    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row["request_id"] . "</td>";
                echo "<td>" . $row["service"] . "</td>";
                echo "<td>" . $row["rating"] . "</td>";
                echo "<td>" . $row["requested_at"] . "</td>";
                echo "</tr>";
            }
        }
    }
