<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>KFUPM Maintenance System</title>
        <!--Bootstrap-->
        <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="../../../styles/general-styles.css" rel="stylesheet">
        <link href="../../../styles/admin.css" rel="stylesheet">
    </head>
    <body>
        <!--Navigation-->
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="../landing.html">KFUPM Maintenance</a>
                <!--Collapse button-->
                <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                        class="navbar-toggler"
                        data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--Links-->
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <div class="navbar-nav ">
                        <a class="nav-item nav-link active" href="#">Requests</a>
                        <a class="nav-item nav-link" href="../services/services.php">Services</a>
                        <a class="nav-item nav-link" href="../staff/staff.php">Staff</a>
                        <a class="nav-item nav-link" href="../users/users.php">Users</a>
                        <a class="nav-item nav-link" href="../reports.html">Generate Report</a>
                        <a class="nav-item nav-link" href="../../../index.php">
                            <button class="btn btn-warning btn-sm" type="button">Sign Out</button>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!--Ongoing Requests-->
        <div class="container mb-5">
            <div class="row mt-3">
                <div class="col-sm-12">
                    <h2 class="display-5">Pending requests</h2>
                    <hr>
                </div>
            </div>

            <div class="row mt-3" id="pending-requests">
                <?php
                    require_once('../../../config.php');

                    $sql = "SELECT request_id, requested_at, service, name, comments 
                            From request inner join service s on request.service_id = s.id inner join servicetype s2 on s.type_id = s2.type_id
                            WHERE status = 'Processing' ORDER BY requested_at;";

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
                            $type = $row['name'];
                            echo "<p class=\"card-text\">Service type: $type</p>";
                            $comments = $row['comments'];
                            echo "<p class=\"card-text\">Comment: $comments</p>";
                            echo "<div class=\"row mt-3\">
                        <div class=\"col\">
                            <button class=\"btn btn-primary w-100 assign\" data-toggle=\"modal\" data-target=\"#exampleModal\">Assign</button>
                        </div>
                        <div class=\"col\">
                            <button class=\"btn btn-outline-danger w-100 reject\">Reject</button>
                        </div>
                    </div>";
                            echo "</div></div></div>";
                        }
                    }
                ?>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Please Enter the Staff Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="first-name" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" id="name-field">
                            </div>
                            <div class="form-group">
                                <label for="id" class="col-form-label">ID:</label>
                                <input type="text" class="form-control" id="id">
                            </div>
                            <div class="form-group">
                                <label for="serviceType">Service type:</label>
                                <select name="serviceType" id="serviceType" class="form-control" required>
                                    <option value="" disabled selected>Select a service type</option>
                                </select>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="addStaff()" data-dismiss="modal">Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
            <!--Bootstrap-->
        <script
                src="https://code.jquery.com/jquery-3.4.0.min.js"
                integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
                crossorigin="anonymous"></script>
            <script crossorigin="anonymous"
                    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script crossorigin="anonymous"
                    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                    src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="requests.js" type="text/javascript"></script>
    </body>

</html>
