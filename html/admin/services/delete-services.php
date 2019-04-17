<?php
require '../../../config.php';

$id = $_POST["id"];

ChangeStatus($id, $link);

function ChangeStatus($id, $link) {
  // UPDATE the status column of the receptionist
  $sql = "DELETE FROM service WHERE id = $id;" ;
  mysqli_query($link, $sql);
  // $sql .= "DELETE FROM user WHERE id = $id";
  // mysqli_multi_query($link,$sql);
  echo $sql;
}


 ?>
