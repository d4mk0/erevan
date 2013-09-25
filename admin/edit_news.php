<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel='stylesheet' href="../assets/styles/admin.css" type='text/css'>
    <link rel='stylesheet' href="../assets/styles/form_style.css" type='text/css'>
    <title>Администраторская часть | Ереван</title>
    <? include "../blocks/connect_db.php" ?>
  </head>
  <body>
    <? include "blocks/notify.php" ?>
    <div class="header">Управление новостями</div>
    <? include "blocks/menu.php" ?>
    <div id="base">
    <div class="add_news">
    <?
      if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = sprintf("SELECT * FROM news WHERE id='%s'", $id);
        $result = mysql_query($query);
        $row = mysql_fetch_array($result);
        printf("<form action='news.php' method='post'>
        <input type='hidden' name='id' value='%s'>
        <div>Заголовок: <input type='text' name='title' maxlength='255' value='%s'></div>
        <div>Текст: <textarea required name='text' rows='10' style='width: 500px;'>%s</textarea></div>
        <input type='submit' value='Изменить'>
      </form>", $row['id'], $row['title'], $row['text']);
      } else {
        echo '<h1>Не указан id</h1>';
      }
    ?>
    
    </div>
    </div>
  </body>
</html>