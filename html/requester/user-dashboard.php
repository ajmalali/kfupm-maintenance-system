<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KFUPM Maintenance System</title>

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../../styles/general-styles.css">
    <link rel="stylesheet" href="../../styles/user-dashboard.css">
</head>

<body>
<!--Navigation-->
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="../../index.php">KFUPM Maintenance</a>
        <!--Collapse button-->
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--Links-->
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <!-- Add spacer, to align navigation to the right in desktop -->
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#request-service">Request Service</a>
                <a class="nav-item nav-link" href="#">Profile</a>
                <a class="nav-item nav-link" href="../../index.php">
                    <button class="btn btn-outline-warning btn-sm" type="button">Sign Out</button>
                </a>
            </div>
        </div>
    </div>
</nav>

<!--Request a service-->
<div class="container my-4" id="request-service">
    <div class="row mt-3">
        <div class="col-sm-12">
            <h2 class="display-5">Request a service</h2>
            <hr>
        </div>
    </div>
    <div class="card shadow p-3 bg-white rounded">
        <div class="card-body">
                <form id="service-request">
                    <div class="form-group">
                        <label for="serviceType">Service type</label>
                        <select name="serviceType" id="serviceType" class="form-control" required>
                            <option value="" disabled selected>Select a service type</option>
                            <?php
                                session_start();
                                require_once('../../config.php');

                                $sql = "SELECT name, type_id FROM servicetype";
                                $result = mysqli_query($link, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        $name = $row['name'];
                                        $id = $row['type_id'];
                                        echo "<option value=\"$id\">$name</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service">Service</label>
                        <select name="service" id="service" class="form-control" required>
                            <option value="" disabled selected>Select a service type</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="time">Time Preference</label>
                        <select name="time" id="time" class="form-control" required>
                            <option value="Any time" selected>Any time</option>
                            <option value="Morning (7am - 12pm)">Morning (7am - 12 pm)</option>
                            <option value="Afternoon (1pm - 4pm)">Afternoon (1pm - 4pm)</option>
                            <option value="Night (6pm - 10pm)">Night (6pm - 10pm)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="form-group">
                        <label for="buildingNumber">Building Number</label>
                        <input type="number" class="form-control" id="buildingNumber"
                               placeholder="Bldg 24" min="1" max="100" name="buildingNumber" aria-describedby="optional">
                        <small id="optional" class="form-text text-muted">Optional</small>
                    </div>
                    <div class="form-group">
                        <label for="roomNumber">Room Number</label>
                        <input type="number" class="form-control" id="roomNumber"
                               placeholder="Room 121" name="roomNumber" min="0" max="3000" aria-describedby="optional">
                        <small id="optional" class="form-text text-muted">Optional</small>
                    </div>
                    <div class="form-group">
                        <label for="comment">Comments</label>
                        <input type="text" class="form-control" id="comment"
                               placeholder="Add any comment" name="comment" aria-describedby="optional">
                        <small id="optional" class="form-text text-muted">Optional</small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-4 p-2">Request</button>
                </form>

        </div>
    </div>
</div>

<?php //require ('ongoingRequests.php'); ?>

<div class="container mb-4">
    <div class="row mt-3">
        <div class="col-sm-12">
            <h2 class="display-5">Your ongoing requests</h2>
            <hr>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-4 col-md-6">
            <div class="card mb-2">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title">Covering surfaces with primer and undercoat</h5>
                    <h6 class="card-subtitle mb-3 text-muted">Requested at: 10-3-2019</h6>
                    <p class="card-text">Request ID: 1</p>
                    <p class="card-text">Status: Processing</p>
                    <div class="row mt-3">
                        <div class="col">
                            <button class="btn btn-primary w-100 rate">Rate</button>
                        </div>
                        <div class="col">
                            <button class="btn btn-outline-danger w-100 cancel">Cancel</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('previousRequests.php'); ?>

<script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="user-dashboard.js"></script>
</body>
</html>
