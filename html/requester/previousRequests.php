<!--Previous Requests-->
<div class="container mb-5">
    <div class="row mt-3">
        <div class="col-sm-12">
            <h2 class="display-5">Your previous requests</h2>
            <hr>
        </div>
    </div>

    <table class="table" id="previous-requests">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Request ID</th>
            <th scope="col">Service</th>
            <th scope="col">Rating</th>
            <th scope="col">Requested at</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
            require_once ('../../config.php');

            $userID = $_SESSION['id'];
            $sql = "SELECT request_id, status, service, rating, requested_at FROM request INNER JOIN service s on request.service_id = s.id
                    WHERE user_id = '$userID' AND (status = 'Completed' OR status = 'Cancelled');";

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
            } else {
                echo "You do not have any previous requests";
            }
        ?>
        </tbody>
    </table>
</div>