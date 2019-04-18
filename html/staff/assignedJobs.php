<!--Ongoing Requests-->
<div class="container mb-5">
    <div class="row mt-3">
        <div class="col-sm-12">
            <h2 class="display-5">Your assigned jobs</h2>
            <hr>
        </div>
    </div>

    <div class="row mt-3" id="ongoing-requests">
        <?php
            session_start();
            require_once('../../config.php');

            $userID = $_SESSION['id'];

            $sql = "SELECT request_id, location, time, comments, building_number, room_number, service
                    from assignment natural join request inner join service s on request.service_id = s.id AND NOT status = 'Completed'
                    WHERE user_id = $userID;";

            $result = mysqli_query($link, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo "<div class=\"col-lg-4 col-md-6\"><div class=\"card mb-4\"\"><div class=\"card-body d-flex flex-column justify-content-between\">";
                    $service = $row['service'];
                    echo "<h5 class=\"card-title\">$service</h5>";
                    $time = $row['time'];
                    echo "<h6 class=\"card-subtitle mb-3 text-muted\">Preferred time: $time</h6>";
                    $requestID = $row['request_id'];
                    echo "<p class=\"card-text\">Request ID: $requestID</p>";
                    $location = $row['location'];
                    $bldg = $row['building_number'];
                    echo "<p class=\"card-text\">Building Number: $bldg</p>";
                    $room = $row['room_number'];
                    echo "<p class=\"card-text\">Room Number: $room</p>";
                    $comments = $row['comments'];
                    echo "<p class=\"card-text\">Comment: $comments</p>";
                    echo "<div class=\"row mt-3\">
                        <div class=\"col\">
                            <button class=\"btn btn-primary w-100 complete\">Complete</button>
                        </div>
                        <div class=\"col\">
                            <button class=\"btn btn-dark w-100 location\" data-toggle=\"modal\" data-target=\".bd-example-modal-lg\" onclick=\"showLocation($requestID)\">
                            Location
                            </button>
                        </div>
                    </div>";
                    echo "</div></div></div>";
                }
            }
        ?>
    </div>
</div>
