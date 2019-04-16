<?php
require '../../../config.php';

$id = $_POST["id"];

ChangeStatus($id, $link);

function ChangeStatus($id, $link) {
  // UPDATE the status column of the receptionist
  $sql = "DELETE FROM requester WHERE id = $id;" ;
  $sql .= "DELETE FROM user WHERE id = $id";
  mysqli_multi_query($link,$sql);
  echo $sql;
}


 ?>
