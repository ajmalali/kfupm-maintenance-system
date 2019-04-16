<?php
require '../../../config.php';
$id = $_POST["id"];
$service = $_POST["service"];
$serviceType = $_POST["service-type"];

addToDatabase($id, $service,$serviceType, $link);
UpdateTable($id, $service);


function addToDatabase($id, $service, $serviceType, $link) {
  $sql = "INSERT into service values($id, $serviceType, '$service')";
  mysqli_query($link,$sql);

}

function UpdateTable($id, $service) {
    // use echo to create the row
    echo "<tr id = \"$id\">";       // id of each serial number is in each row so easier to access when we need to delete

    echo "<td>" . $id . "</td>";
    echo "<td>" . $service . "</td>";
    echo "<td>" . "<button onclick = \"deleteRow($id)\" type = \"button\" class = \"btn btn-danger mx-auto\">Remove" . "</button>" . "</td>";
    // type = button needed to avoid refresh
    echo "</tr>";
}
 ?>
