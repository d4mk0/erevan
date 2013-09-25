<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel='stylesheet' href="../assets/styles/admin.css" type='text/css'>
    <link rel='stylesheet' href="../assets/styles/form_style.css" type='text/css'>
    <title>Администраторская часть | Ереван</title>
  </head>
  <body>
    <? include "blocks/notify.php" ?>
    <div class="header">Управление новостями</div>
    <? include "blocks/menu.php" ?>
    <div id="base">
    <div class="add_news">
    <form action="news.php" method="post">
      <div>Заголовок: <input type="text" name="title" maxlength="255"></div>
      <div>Текст: <textarea required name="text" rows="10" style="width: 500px;"></textarea></div>
      <input type="submit" value="Добавить">
    </form>
    </div>
    </div>
  </body>
</html>