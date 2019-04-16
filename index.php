<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KFUPM Maintenance System</title>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="styles/general-styles.css">
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
<!--Navigation-->
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">KFUPM Maintenance</a>
        <!--Collapse button-->
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--Links-->
        <div class="collapse navbar-collapse justify-content-end" id="topheader">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Home</a>
                <a class="nav-item nav-link" href="#about-us">About</a>
                <a class="nav-item nav-link" href="#services-offered">Services Offered</a>
                <a class="nav-item nav-link" href="#how-it-works">How it works</a>
                <a class="nav-item nav-link" href="html/signUp/signup.html">
                    <button class="btn btn-outline-info btn-sm" type="button">Sign up</button>
                </a>
                <a class="nav-item nav-link" href="html/signIn/signin.html">
                    <button class="btn btn-outline-primary btn-sm" type="button">Log in</button>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Header -->
<header class="overlay py-1 mb-5">
    <div class="container vh-100">
        <div class="row mt-5 align-items-center">
            <div class="col-lg-6 col-md-6">
                <h1 class="display-4 text-white mt-5 mb-2">Welcome to <br> KFUPM Maintenance System</h1>
                <p class="lead mb-5 text-white-50">Your one-stop maintenance solution. <br>Regardless of quantity of
                    maintenance service, we use only high quality material. Maintaining outspoken discipline in any kind
                    of work place. Top notch dedication towards timely work completion.</p>
            </div>
        </div>
    </div>

</header>

<!--About Us-->
<div class="container" id="about-us">
    <div class="row">
        <div class="col-md-12 mb-5">
            <h2 class="display-4">About Us</h2>
            <hr>
            <p class="description">We value our Customers!
                When you’re in need of a maintenance repair, our seasoned technicians can quickly step in to assist in
                returning your home or property back to working order. With years of experience in the field, we have
                the knowledge and expertise to get the job done right the first time. Whether you’re looking for a quick
                screen replacement or more extensive work like HVAC servicing, Painting and more, we are ready to get to
                work for you.
            </p>
            <div class="row">
                <div class="card mx-auto my-3" style="width: 15rem; height: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title">Always Available</h5>
                        <p class="card-text">24/7 round the clock emergency service. Get guidance until we reach
                            you.</p>
                    </div>
                </div>
                <div class="card mx-auto my-3" style="width: 15rem; height: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title">Quality Material</h5>
                        <p class="card-text">Quality Material
                            Using only best quality materials for any kind of maintenance.</p>
                    </div>
                </div>
                <div class="card mx-auto my-3" style="width: 15rem; height: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title">Timely completion</h5>
                        <p class="card-text">With full fledged expert technicians, your job will done on time.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require('servicesOffered.php'); ?>

<div class="container" id="how-it-works">
    <div class="row">
        <div class="col-md-12 mb-5">
            <h2 class="display-4">How it works</h2>
            <hr>
            <p class="description">It's just <strong>3</strong> simple steps</p>
            <h3>1. Choose a service</h3>
            <p class="ml-4">Select Electrical, Plumbing, Carpentry, etc.</p>
            <h3>2. Enter details</h3>
            <p class="ml-4">Determine location, date and time and take a picture or record a video for the requested service.</p>
            <h3>3. Job done</h3>
            <p class="ml-4">We will send you the specialized team and you will get an email when the job is done.</p>

        </div>
    </div>
</div>


<!-- Footer -->
<footer class="py-3 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; 2019</p>
    </div>
</footer>

<!--Bootstrap-->
<script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<script>
    $('#topheader .navbar-nav a').on('click', function () {
        $('#topheader .navbar-nav').find('a.active').removeClass('active');
        $(this).addClass('active');
    });
</script>
</body>
</html>