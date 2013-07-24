<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel='stylesheet' href="../assets/styles/admin.css" type='text/css'>
    <link rel='stylesheet' href="../assets/styles/form_style.css" type='text/css'>
    <title>Администраторская часть | Ереван</title>
    <?
      include "../blocks/connect_db.php";
      if(isset($_POST['name']) and isset($_POST['value'])) {
        $name = $_POST['name'];
        $value = $_POST['value'];
        $query = sprintf("INSERT INTO contacts (name, value)
          VALUES ('%s','%s')", $name, $value);
        mysql_query($query);
      }
    ?>
  </head>
  <body>
    <div id="base">
      <? include "blocks/notify.php" ?>
      <div class="header">
        Редактирование контактов сайта
      </div>
      <? include "blocks/menu.php" ?>
      
      <div class="contacts">
        <?
          $query = "SELECT * FROM contacts";
          $result = mysql_query($query);
          while($row = mysql_fetch_array($result)) {
            printf("<form action='blocks/update_contact.php' method='post'>
              <input type='text' name='name' value='%s'>
              <input type='text' name='value' value='%s' style='width:700px;'>
              <input type='hidden' name='id' value='%s'>
              <input type='submit' value='Изменить'>
              <a href='blocks/delete_contact.php?id=%s'
              onclick=\"return confirm('Вы точно хотите удалить контакт из списка?')\">Удалить</a>
            </form>", $row['name'], $row['value'], $row['id'], $row['id']);
          }
        ?>
        <div class="new_contact">
          <form action="contacts.php" method="post">
            <input type="text" name="name" value="Введите название"
                   onblur="if (this.value == '') this.value = 'Введите название';"
                   onfocus="if (this.value == 'Введите название') this.value = '';">
            <input type="text" name="value" value="Введите сам контакт"
                   onblur="if (this.value == '') this.value = 'Введите сам контакт';"
                   onfocus="if (this.value == 'Введите сам контакт') this.value = '';"
                   style='width:700px;'>
            <input type="submit" value="Добавить">
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
