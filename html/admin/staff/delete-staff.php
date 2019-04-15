<?php
require '../../../config.php';

$id = $_POST["id"];

ChangeStatus($id, $link);

function ChangeStatus($id, $link) {
  // UPDATE the status column of the receptionist
  $sql = "DELETE FROM user WHERE id = $id";
  mysqli_query($link,$sql);
  echo $sql;
}


 ?>
