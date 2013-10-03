<?php
  #скрипт для обновления контактов
  include "../../blocks/connect_db.php";
  if(isset($_POST['name']) and isset($_POST['value']) and isset($_POST['id'])) {
    $name = $_POST['name'];
    $value = $_POST['value'];
    $id = $_POST['id'];
    $query = sprintf("UPDATE contacts SET value='%s', name='%s' WHERE id='%s'", $value, $name, $id);
    mysql_query($query);
    echo '<meta http-equiv="refresh" content="0;URL=../contacts.php">';
  }
?>
  