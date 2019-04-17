<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <a class="navbar-brand" href="../../index.php">KFUPM Maintenance</a>
        <!--Collapse button-->
        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler"
                data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--Links-->
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <div class="navbar-nav ">
                <a class="nav-item nav-link" href="#">Requests</a>
                <a class="nav-item nav-link" href="services/services.php">Services</a>
                <a class="nav-item nav-link" href="staff/staff.php">Staff</a>
                <a class="nav-item nav-link" href="users/users.php">Users</a>
                <a class="nav-item nav-link active" href="#">Generate Report</a>
                <a class="nav-item nav-link" href="../../index.php">
                    <button class="btn btn-warning btn-sm" type="button">Sign Out</button>
                </a>
            </div>
        </div>
    </div>
</nav>


<div class="container">
    <h2 class="display-5 mt-3">Request Statistics</h2>
    <h5 class="display-5 text-muted">Here you can view the statistics for maintenance requests</h5>
    <hr>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Pending :</th>
            <th scope="col">Ongoing :</th>
            <th scope="col">Completed :</th>
            <th scope="col">Total :</th>
        </tr>
        </thead>
        <tbody>

        <?php
            require '../../config.php';
            $result1 = mysqli_query($link, "SELECT COUNT(*) as c FROM Request WHERE Status = 'Processing'");
            $row = mysqli_fetch_assoc($result1);
            echo "<td>" . $row['c'] . "</td>";
            $result2 = mysqli_query($link, "SELECT COUNT(*) as c FROM Request WHERE Status = 'Processing'");
            $row = mysqli_fetch_assoc($result2);
            echo "<td>" . $row['c'] . "</td>";
            $result3 = mysqli_query($link, "SELECT COUNT(*) as c FROM Request WHERE Status = 'Processing'");
            $row = mysqli_fetch_assoc($result3);
            echo "<td>" . $row['c'] . "</td>";
            $result4 = mysqli_query($link, "SELECT COUNT(*) as c FROM Request");
            $row = mysqli_fetch_assoc($result4);
            echo "<td>" . $row['c'] . "</td>";

            echo "</tr>";

        ?>

        </tbody>
    </table>

</div>


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