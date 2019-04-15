<?php
require '../../../config.php';
$id = $_POST["id"];
$name = $_POST["name"];
addToDatabase($id, $name, $link);
UpdateTable($id,$name);


function addToDatabase($id, $name ,$link) {
  $type = 2;       // Status as 1 means the person is active and working
  // Insert these values into the table user
  $sql = "INSERT into user values($id, '$name', 'password',$type)";
  mysqli_query($link,$sql);
  echo $sql;
}

function UpdateTable($id, $name) {
    // use echo to create the row
    echo "<tr>";       // id of each serial number is in each row so easier to access when we need to delete

    echo "<td>" . $id . "</td>";
    echo "<td>" . $name . "</td>";
    echo "<td>" . "<button type = \"button\" class = \"btn btn-danger mx-auto\">Remove" . "</button>" . "</td>";
    // type = button needed to avoid refresh
    echo "</tr>";
}
 ?>
