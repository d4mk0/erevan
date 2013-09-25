<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel='stylesheet' href="../assets/styles/admin.css" type='text/css'>
    <link rel='stylesheet' href="../assets/styles/form_style.css" type='text/css'>
    <title>Администраторская часть | Ереван</title>
    <?
      include "../blocks/connect_db.php";
    ?>
  </head>
  <body>
    <div id="base">
      <? include "blocks/notify.php" ?>
      <div class="header">
        Редактирование пользовательского меню сайта
      </div>
      <? include "blocks/menu.php" ?>
      
      <div class="contacts">
        <?
          $query = "SELECT * FROM menus";
          $result = mysql_query($query);
          while($row = mysql_fetch_array($result)) {
            printf("<form action='blocks/update_menu_item.php' method='post'>
              <input type='text' name='name' value='%s'>
              <input type='text' name='path' value='%s'>
              <input type='hidden' name='id' value='%s'>
              <input type='submit' value='Изменить'>
              <a href='blocks/delete_menu_item.php?id=%s'
              onclick=\"return confirm('Вы точно хотите удалить меню из списка?')\">Удалить</a>
            </form>", $row['name'], $row['path'], $row['id'], $row['id']);
          }
        ?>
        <div class="new_contact">
          <form action="blocks/add_menu_item.php" method="post">
            <input type="text" name="name" value="Введите название"
                   onblur="if (this.value == '') this.value = 'Введите название';"
                   onfocus="if (this.value == 'Введите название') this.value = '';">
            <input type="text" name="path" value="Введите путь"
                   onblur="if (this.value == '') this.value = 'Введите путь';"
                   onfocus="if (this.value == 'Введите путь') this.value = '';">
            <input type="submit" value="Добавить">
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
