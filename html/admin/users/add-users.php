<?php
require '../../../config.php';
$id = $_POST["id"];
$name = $_POST["name"];
$number = $_POST["number"];
$email = $_POST["email"];
addToDatabase($id, $name, $number, $email, $link);
UpdateTable($id, $name,$number, $email);


function addToDatabase($id, $name, $number, $email, $link) {
  $type = 3;
  // Insert these values into the table user
  $sql = "INSERT into user values($id, '$name', 'password',$type)";
  mysqli_query($link,$sql);

  $sql = "INSERT into requester values($id, $number,'$email')";
  mysqli_query($link,$sql);
  echo $sql;
}

function UpdateTable($id, $name,$number, $email) {
    // use echo to create the row
    echo "<tr>";       // id of each serial number is in each row so easier to access when we need to delete

    echo "<td>" . $id . "</td>";
    echo "<td>" . $name . "</td>";
    echo "<td>" . $number . "</td>";
    echo "<td>" . $email . "</td>";
    echo "<td>" . "<button type = \"button\" class = \"btn btn-danger mx-auto\">Remove" . "</button>" . "</td>";
    // type = button needed to avoid refresh
    echo "</tr>";
}
 ?>
