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
    <link rel="stylesheet" href="../styles/general-styles.css">
    <link rel="stylesheet" href="../styles/user-dashboard.css">
</head>

<body>
<!--Navigation-->
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="../index.php">KFUPM Maintenance</a>
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
                <a class="nav-item nav-link" href="#services-offered">Request Service</a>
                <a class="nav-item nav-link" href="#">Profile</a>
                <a class="nav-item nav-link" href="../index.php">
                    <button class="btn btn-outline-warning btn-sm" type="button">Sign Out</button>
                </a>
            </div>
        </div>
    </div>
</nav>

<div class="container my-4">
    <div class="row mt-3">
        <div class="col-sm-12">
            <h2 class="display-5">Request a service</h2>
            <hr>
        </div>
    </div>
    <!--Sign in, Sign Up radio buttons-->
    <div class="card shadow p-3 bg-white rounded">
        <div class="card-body">
                <form method="POST" class="register-form" id="auth-form">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="John Smith" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                               placeholder="john.smith@example.com" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                            anyone else.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="id">ID Number</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="201XXXXXX" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="05XXXXXXXX"
                               pattern="05[0-9]{8}" oninvalid="setCustomValidity('Please enter a number in the format 05XXXXXXXX')" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="re-password">Confirm Password</label>
                        <input type="password" class="form-control" id="re-password"
                               placeholder="Confirm Password" name="re-password" required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="tandc" required>
                        <label class="form-check-label" for="tandc">I agree to the Terms and
                            Conditions</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-4 p-2">Register</button>
                </form>

        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row mt-3">
        <div class="col-sm-12">
            <h2 class="display-5">Your ongoing requests</h2>
            <hr>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-sm">
            <div class="card bg-light mb-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Light Repair</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Request Status : Processing</h6>
                    <p class="card-text">Expected Time : 7:00 PM</p>
                    <a href="#" class="btn btn-primary">Rate </a>
                    <a href="#" class="btn btn-danger">Cancel Request</a>
                </div>
            </div>
        </div>

        <div class="col-sm">
            <div class="card bg-light mb-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Door Repair</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Request Status : Processing</h6>
                    <p class="card-text">Expected Time : 2:00 PM</p>
                    <a href="#" class="btn btn-primary">Rate </a>
                    <a href="#" class="btn btn-danger">Cancel Request</a>
                </div>
            </div>
        </div>

        <div class="col-sm">
            <div class="card bg-light mb-3 " style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">AC Repair</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Request Status : Completed</h6>
                    <p class="card-text">Expected Time : 6:00 PM</p>
                    <a href="#" class="btn btn-primary">Rate </a>
                    <a href="#" class="btn btn-danger">Cancel Request</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
