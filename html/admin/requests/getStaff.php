<?php

    require_once('../../../config.php');

    $requestID = $_POST['requestID'];

    $sql = "Select type_id from request inner join service s on request.service_id = s.id WHERE request_id = $requestID";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    $serviceType = $row['type_id'];

    $sql = "SELECT id, name FROM staff natural join user WHERE type_id = $serviceType";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<select name=\"people\" id=\"people\" class=\"form-control\" required>
                            <option value=\"\" disabled selected>Select a staff</option>";
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $name = $row['name'];
            echo "<option value=\"$id\">$name</option>";
        }
        echo "</select>";
    } else {
        echo "There are no staff for this jobs";
    }
