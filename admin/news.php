<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel='stylesheet' href="../assets/styles/admin.css" type='text/css'>
    <title>Администраторская часть | Ереван</title>
    <?
      include "../blocks/connect_db.php";
      if(isset($_POST['title']) and isset($_POST['text'])) {
        $title = $_POST['title'];
        $text = $_POST['text'];
        if($title != '' and $text != '') {
          if(isset($_POST['id'])) {
            $id = $_POST['id'];
            $query = sprintf("UPDATE news SET title='%s', text='%s' WHERE id='%s'", $title, $text, $id);
          } else {
            $query = sprintf("INSERT INTO news (title, text) VALUES('%s', '%s')", $title, $text);
          }
          mysql_query($query);
        }
      }
    ?>
  </head>
  <body>
    <? include "blocks/notify.php" ?>
    <div class="header">Управление новостями</div>
    <? include "blocks/menu.php" ?>
    <div id="base">
      <div class='news_menu'>
        <span><a href="add_news.php">Добавить новость</a></span>
      </div>
      <?
        $news_on_page = 5;
        if($_GET['page'] > 0) $page = $_GET['page'];
        else $page = 1;
        $query = "SELECT count(id) FROM news";
        $result = mysql_query($query);
        $row_count = mysql_fetch_array($result);
        $count = $row_count['count(id)'];
        $query = sprintf("SELECT * FROM news ORDER BY id DESC LIMIT %s
          OFFSET %s", $news_on_page, ($page-1)*$news_on_page);
        $result = mysql_query($query);
        $count = $count-($page-1)*$news_on_page;
        echo "<div class='news'>";
        while ($row = mysql_fetch_array($result)) {
          printf("<div class='new'>
            <div><b>#%s</b></div>
            <div><b>Заголовок:</b> %s</div>
            <div><b>Текст:</b> %s</div>
            <div><b>Время добавления:</b> %s</div>
            <div><a href='edit_news.php?id=%s'>Изменить</a>
            <a href='blocks/delete_news.php?id=%s'
            onclick=\"return confirm('Вы точно хотите удалить эту новость?')\">
            Удалить</a></div></div>
            ", $count--, $row['title'], $row['text'], $row['date'],
                  $row['id'], $row['id']);
        }
        echo "</div>";

        $count_pages = $row_count['count(id)'] == $news_on_page ? $row_count['count(id)']/$news_on_page : $row_count['count(id)']/$news_on_page+1;
        if($count_pages >= 2){
          echo "<div class='pages'>Страницы: ";
          for($i = 1; $i <= $count_pages; $i++) {
            if($i != $page) printf("<span><a href='reviews.php?page=%s'>%s</a></span>", $i, $i);
            else printf("<span>%s</span>", $i);
          }
          echo "</div>";
        }
      ?>
    </div>
  </body>
</html>
