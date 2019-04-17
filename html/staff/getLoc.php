<?php
require_once ('../../config.php');
$rid = $_POST["requestID"];
$sql = "SELECT location from request where request_id = '$rid'";
$result = mysqli_query($link,$sql);
while ($row = mysqli_fetch_array($result))
echo $row["location"];

 ?>
