<?php
  include "../../blocks/connect_db.php";
  if(isset($_POST['name']) and isset($_POST['path']) and isset($_POST['id'])) {
    $name = $_POST['name'];
    $path = $_POST['path'];
    $id = $_POST['id'];
    $query = sprintf("UPDATE menus SET path='%s', name='%s' WHERE id='%s'", $path, $name, $id);
    mysql_query($query);
    echo '<meta http-equiv="refresh" content="0;URL=../menu_edit.php">';
  }
?>
  