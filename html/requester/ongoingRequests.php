<!--Ongoing Requests-->
<div class="container mb-5">
    <div class="row mt-3">
        <div class="col-sm-12">
            <h2 class="display-5">Your ongoing requests</h2>
            <hr>
        </div>
    </div>

    <div class="row mt-3" id="ongoing-requests">
        <?php
            require_once('../../config.php');

            $userID = $_SESSION['id'];

            $sql = "SELECT request_id, service, status, requested_at 
                    FROM request INNER JOIN service ON request.service_id = service.id 
                    WHERE user_id = '$userID'
                    AND status='Processing' OR status='In-progress';";
            $result = mysqli_query($link, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo "<div class=\"col-lg-4 col-md-6\"><div class=\"card mb-4\"\"><div class=\"card-body d-flex flex-column justify-content-between\">";
                    $service = $row['service'];
                    echo "<h5 class=\"card-title\">$service</h5>";
                    $time = $row['requested_at'];
                    echo "<h6 class=\"card-subtitle mb-3 text-muted\">Requested at: $time</h6>";
                    $requestID = $row['request_id'];
                    echo "<p class=\"card-text\">Request ID: $requestID</p>";
                    $status = $row['status'];
                    echo "<p class=\"card-text\">Status: $status</p>";
                    echo "<div class=\"row mt-3\">
                        <div class=\"col\">
                            <button class=\"btn btn-primary w-100 rate\">Rate</button>
                        </div>
                        <div class=\"col\">
                            <button class=\"btn btn-outline-danger w-100 cancel\">Cancel</button>
                        </div>
                    </div>";
                    echo "</div></div></div>";
                }
            } else {
//                echo "<div class=\"alert alert-info\" role=\"alert\">You do not have any on going requests</div>";
            }
        ?>
    </div>
</div>
