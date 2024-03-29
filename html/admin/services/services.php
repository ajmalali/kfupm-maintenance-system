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
                        <a class="nav-item nav-link" href="../requests/requests.php">Requests</a>
                        <a class="nav-item nav-link active" href="#">Services</a>
                        <a class="nav-item nav-link" href="../staff/staff.php">Staff</a>
                        <a class="nav-item nav-link" href="../users/users.php">Users</a>
                        <a class="nav-item nav-link" href="../report.php">Generate Report</a>
                        <a class="nav-item nav-link" href="../../../index.php">
                            <button class="btn btn-warning btn-sm" type="button">Sign Out</button>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
            <h2 class="display-5 mt-3">Services Details</h2>
            <h5 class="display-5 text-muted">Here you can manage all the services you can offer</h5>
            <hr>
            <div class="add">
              <button class="btn btn-success" id="add-service" data-toggle="modal" data-target="#exampleModal">Add</button>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Service Type</th>
                        <th scope="col">Service</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  require_once '../../../config.php';
                  $result = mysqli_query($link,"SELECT id, service, name From service natural join servicetype");

                  while($row = mysqli_fetch_array($result))
                  {
                    $id = $row["id"];
                    echo "<tr id = \"$id\">";       // id of each serial number is in each row so easier to access when we need to delete
                    echo "<td>" . $row["id"] . "</td>";
                      echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["service"] . "</td>";
                    echo "<td>" . "<button type = \"button\" onclick= \"deleteRow($id)\" class = \"btn btn-danger mx-auto\">Remove" . "</button>" . "</td>";
                    // type = button needed to avoid refresh
                    echo "</tr>";
              }

              mysqli_close($link);
              ?>

            </table>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Please Enter the Service Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form>
                    <div class="form-group">
                        <label for="service-type" class="col-form-label">Service Type:</label>
                        <input type="number" class="form-control" id="service-type">
                    </div>
                  <div class="form-group">
                    <label for="first-name" class="col-form-label">Service:</label>
                    <input type="text" class="form-control" id="service-field">
                  </div>
                </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addService()" data-dismiss="modal">Save changes</button>
              </div>
            </div>
          </div>
        </div>


        <!--Bootstrap-->
        <script
                src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous">
        </script>
        <script crossorigin="anonymous"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script crossorigin="anonymous"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                <script src="serviceOps.js" type="text/javascript"></script>


    </body>
</html>
