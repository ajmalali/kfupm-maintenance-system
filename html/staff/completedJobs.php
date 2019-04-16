<!--Previous Requests-->
<div class="container mb-5">
    <div class="row mt-3">
        <div class="col-sm-12">
            <h2 class="display-5">Your completed jobs</h2>
            <hr>
        </div>
    </div>

    <table class="table table-striped" id="completed-jobs">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Request ID</th>
            <th scope="col">Service</th>
            <th scope="col">Rating</th>
            <th scope="col">Requested at</th>
        </tr>
        </thead>
        <tbody>
        <?php
            require_once ('../../config.php');

            $userID = $_SESSION['id'];
            $sql = "SELECT request_id, service, rating, requested_at 
                    from assignment natural join request inner join service s on request.service_id = s.id 
                    WHERE staff_id = $userID AND status = 'Completed';";

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
            } else {
                echo "You do not have any previous requests";
            }
        ?>
        </tbody>
    </table>
</div>