<?php
session_start();
echo $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>KFUPM Maintenance System</title>
        <!--Bootstrap-->
        <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="../../styles/general-styles.css" rel="stylesheet">
        <link href="../../styles/admin.css" rel="stylesheet">
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
                        <a class="nav-item nav-link" href="services.html">Services</a>
                        <a class="nav-item nav-link" href="staff.html">Staff</a>
                        <a class="nav-item nav-link" href="users.html">Users</a>
                        <a class="nav-item nav-link" href="reports.html">Generate Report</a>
                        <a class="nav-item nav-link" href="../landing.html">
                            <button class="btn btn-warning btn-sm" type="button">Sign Out</button>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
            <h2 class="display-5 mt-3">Pending Requests</h2>
            <hr>
            <div class="row mt-3">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Light Repair</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Location : Building 22</h6>
                            <p class="card-text">Requested Time: 12/3/2019, 6:00 PM</p>
                            <div class="options">
                                <a class="btn btn-primary" href="#">Assign</a>
                                <a class="btn btn-info" href="#">Details</a>
                                <a class="btn btn-danger" href="#">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Door Repair</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Location : Building 24</h6>
                            <p class="card-text">Requested Time: 12/3/2019, 7:00 PM</p>
                            <div class="options">
                                <a class="btn btn-primary" href="#">Assign</a>
                                <a class="btn btn-info" href="#">Details</a>
                                <a class="btn btn-danger" href="#">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h5 class="card-title">AC Repair</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Location : Building 22</h6>
                            <p class="card-text">Requested Time: 13/3/2019, 2:00 PM</p>
                            <div class="options">
                                <a class="btn btn-primary" href="#">Assign</a>
                                <a class="btn btn-info" href="#">Details</a>
                                <a class="btn btn-danger" href="#">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pest Control</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Location: Building 850</h6>
                            <p class="card-text">Requested Time: 14/3/2019, 1:00 PM</p>
                            <div class="options">
                                <a class="btn btn-primary" href="#">Assign</a>
                                <a class="btn btn-info" href="#">Details</a>
                                <a class="btn btn-danger" href="#">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Painting</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Location: Building 6</h6>
                            <p class="card-text">Requested Time: 14/3/2019, 7:00 PM</p>
                            <div class="options">
                                <a class="btn btn-primary" href="#">Assign</a>
                                <a class="btn btn-info" href="#">Details</a>
                                <a class="btn btn-danger" href="#">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Leaky Pipe</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Location: Building 21</h6>
                            <p class="card-text">Requested Time: 15/3/2019, 10:00 AM</p>
                            <div class="options">
                                <a class="btn btn-primary" href="#">Assign</a>
                                <a class="btn btn-info" href="#">Details</a>
                                <a class="btn btn-danger" href="#">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!--Bootstrap-->
            <script crossorigin="anonymous"
                    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                    src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script crossorigin="anonymous"
                    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script crossorigin="anonymous"
                    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                    src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>

</html>
