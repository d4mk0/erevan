<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel='stylesheet' href="assets/styles/application.css" type='text/css'>
    <link rel='stylesheet' href="assets/styles/form_style.css" type='text/css'>
    <? include "blocks/connect_db.php" ?>
    <title>Ресторан | Ереван</title>
  </head>
  <body>
    <div id="base_block">
      <div id="header">
        <? include "blocks/header.php" ?>
      </div>
      <div id="content">
        <div class="header">Новости ресторана</div>
        <div class="news">
          <?
            $news_on_page = 10; #количество новостей на странице
            if($_GET['page'] > 0) $page = $_GET['page']; #вычисление текущего номера страницы
            else $page = 1; #если он был передан GET параметром, то берется он, иначе 1
            $result = mysql_query("SELECT count(id) FROM news"); #запрашиваем количество записей в таблице новостей
            $row_count = mysql_fetch_array($result);
            $count = $row_count['count(id)'];
            $query = sprintf("SELECT * FROM news ORDER BY id DESC LIMIT 5
              OFFSET %s", ($page-1)*$news_on_page); #создаем запрос на получение нужных нам записей из таблицы
            $result = mysql_query($query);
            $count = $count-($page-1)*$news_on_page; #Вычисляем общее количество новостей 
            while ($row = mysql_fetch_array($result)) {
              printf("<div class='new'>
                    <div class='title'>%s</div>
                    <div class='text'>%s</div>
                    <div class='date'>%s</div>
                    </div>",
                $row['title'], $row['text'], date("d-m-Y", strtotime($row['date'])));
            } #date приводит время к формату 01-01-1970, strtotime преобразует строку во время
            $count_pages = $row_count['count(id)'] == $news_on_page ? $row_count['count(id)']/$reviews_on_page : $row_count['count(id)']/$reviews_on_page+1;
            #вычислени общего количества страниц
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
      </div>
      <div id="footer">
        <? include "blocks/footer.php" ?>
      </div>
    </div>
  </body>
</html>
