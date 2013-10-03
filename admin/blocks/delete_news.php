<?php
  #скрипт удаления новостей
  include "../../blocks/connect_db.php";
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = sprintf("DELETE FROM news WHERE id=%s", $id);
    mysql_query($query);
    echo '<meta http-equiv="refresh" content="0;URL=../news.php">';
  }
?>