<?php
  #скрипт удаления контактов
  include "../../blocks/connect_db.php";
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = sprintf("DELETE FROM contacts WHERE id=%s", $id);
    mysql_query($query);
    echo '<meta http-equiv="refresh" content="0;URL=../contacts.php">';
  }
?>