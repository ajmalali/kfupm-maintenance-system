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
                <a class="nav-item nav-link active" href="#">Requests</a>
                <a class="nav-item nav-link" href="services.html">Services</a>
                <a class="nav-item nav-link" href="staff.html">Staff</a>
                <a class="nav-item nav-link" href="users.html">Users</a>
                <a class="nav-item nav-link" href="reports.html">Generate Report</a>
                <a class="nav-item nav-link" href="../../index.php">
                    <button class="btn btn-warning btn-sm" type="button">Sign Out</button>
                </a>
            </div>
        </div>
    </div>
</nav>


<div class="container">
    <h2 class="display-5 mt-3">Assign Staff</h2>
    <h5 class="display-5 text-muted">Here you can assign a request to staff</h5>
    <hr>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Location</th>
            <th scope="col">Time</th>
            <th scope="col">Status</th>
            <th scope="col">User</th>
            <th scope="col">Service</th>
            <th scope="col">Building</th>
            <th scope="col">Room</th>
        </tr>
        </thead>
        <tbody>

        <?php
             require '../../config.php';
             $result = mysqli_query($conn,"SELECT * FROM Request WHERE Status = "Unassigned"");

             while($row = mysqli_fetch_array($result))
                {
                    $id = $row["Request_ID"];
                    echo "<tr id = \"$id\">";
                    echo "<td>" . $row["Request_ID"] . "</td>";
                    echo "<td>" . $row["Location"] . "</td>";
                    echo "<td>" . $row["Time"] . "</td>";
                    echo "<td>" . $row["Status"] . "</td>";
                    echo "<td>" . $row["User"] . "</td>";
                    echo "<td>" . $row["Service"] . "</td>";
                    echo "<td>" . $row["Building"] . "</td>";
                    echo "<td>" . $row["Room"] . "</td>";
                    $sql2 = "Select Name from user where type == 2";
                    $result2 = mysqli_query($conn,$sql2);
                    echo "<td>"."<select name='category'>"."</td>";
                    while ($row2= mysqli_fetch_array($result2) )
                        {
                            echo "<option value='' >".htmlspecialchars($row2["name"])."</option>";
                        }
                    echo "</select>";
                    echo "</tr>";
                }
        mysqli_close($conn);
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