<?php
  #скрипт добавления разделов меню
  include "../../blocks/connect_db.php";
  if(isset($_POST['name']) and isset($_POST['path'])) {
    if($_POST['name'] != 'Введите название' and $_POST['path'] != 'Введите путь'){
      $name = $_POST['name'];
      $path = $_POST['path'];
      $query = sprintf("INSERT INTO menus (name, path)
        VALUES ('%s','%s')", $name, $path);
      mysql_query($query);
    }
  }
  echo '<meta http-equiv="refresh" content="0;URL=../menu_edit.php">';
?>
