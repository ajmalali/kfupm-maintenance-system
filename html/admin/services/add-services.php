<?php
require_once '../../../config.php';
$service = $_POST["service"];
$serviceType = $_POST["service-type"];

addToDatabase($service,$serviceType, $link);

function addToDatabase($service, $serviceType, $link) {
  $sql = "INSERT into service (type_id, service) values($serviceType, '$service')";
  mysqli_query($link,$sql);
  $id = mysqli_insert_id($link);
  UpdateTable($link, $id, $service, $serviceType);
}

function UpdateTable($link, $id, $service, $serviceType) {
    $sql = "SELECT name FROM servicetype WHERE type_id = $serviceType";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    // use echo to create the row
    echo "<tr id = \"$id\">";       // id of each serial number is in each row so easier to access when we need to delete
    echo "<td>" . $id . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $service . "</td>";
    echo "<td>" . "<button onclick = \"deleteRow($id)\" type = \"button\" class = \"btn btn-danger mx-auto\">Remove" . "</button>" . "</td>";
    // type = button needed to avoid refresh
    echo "</tr>";
}
 ?>
