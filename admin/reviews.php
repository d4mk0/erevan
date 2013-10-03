<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel='stylesheet' href="../assets/styles/admin.css" type='text/css'>
    <title>Администраторская часть | Ереван</title>
    <?
      include "../blocks/connect_db.php";
      if(isset($_POST['status']) and isset($_POST['id'])) {
        $status = $_POST['status'];
        $id = $_POST['id']; 
        $query = sprintf("UPDATE reviews SET status='%s' WHERE id=%s", $status, $id);
        mysql_query($query); #обновление статуса отзыва
      }
    ?>
  </head>
  <body>
    <? include "blocks/notify.php" ?>
    <div class="header">
      Редактирование отзывов
    </div>
    <? include "blocks/menu.php" ?>
    <div id="base">
      <div class="reviews_menu">
        <span><a href="reviews.php">Все</a></span>
        <span><a href="reviews.php?status=new">Новые</a></span>
        <span><a href="reviews.php?status=approved">Подтвержденные</a></span>
        <span><a href="reviews.php?status=rejected">Удаленные</a></span>
      </div>
      <?
        $reviews_on_page = 5;
        if($_GET['page'] > 0) $page = $_GET['page'];
        else $page = 1;
        if(isset($_GET['status'])) { #если параметром GET передан статус, выбираются только
          $status = $_GET['status']; #отзывы с определенным статусом, например new(новые)
          $query = sprintf("SELECT count(id) FROM reviews WHERE status='%s'", $status);
        } else $query = "SELECT count(id) FROM reviews"; #иначе выбираются все
        $result = mysql_query($query);
        $row_count = mysql_fetch_array($result);
        $count = $row_count['count(id)'];
        if ($count == 0) echo "<h2>Отзывов в этой категории нет</h2>";
        if(isset($_GET['status'])) {
          $query = sprintf("SELECT * FROM reviews WHERE status='%s' ORDER BY id DESC LIMIT %s
          OFFSET %s", $status, $reviews_on_page, ($page-1)*$reviews_on_page);
        } else {
          $query = sprintf("SELECT * FROM reviews ORDER BY id DESC LIMIT %s
          OFFSET %s", $reviews_on_page, ($page-1)*$reviews_on_page);
        }
        $result = mysql_query($query);
        $count = $count-($page-1)*$reviews_on_page;
        echo "<div class='reviews'>";
        while ($row = mysql_fetch_array($result)) {
          printf("<div class='review'>
            <div><b>#%s</b></div>
            <div><b>Текст:</b> %s</div>
            <div><b>Пользователь:</b> %s</div>
            <div><b>Время:</b> %s</div>
            <div><b>Телефон:</b> %s</div>
            <div><b>E-mail:</b> %s</div>
            ",
          $count--, $row['text'], $row['username'], $row['date'], $row['phone'], $row['email']);
          if(isset($status)) { #создание параметров для следующих страниц, на которые мы переходим
                               #если результаты не умещаются на одной странице
            $status_link = "status=".$status; #создание происходит только если был GET параметр status
          } else {
            $status_link = '';
          }
          $statuses['new'] = "Новый";
          $statuses['rejected'] = "Отклоненный";
          $statuses['approved'] = "Подтвержденный";
          echo "<form action='reviews.php?".$status_link."' method='post'>";
          echo "<div><b>Статус:</b> <select name='status'>";
          foreach($statuses as $key => $value) { #создание опций для select_boxа
            if($key == $row['status']) $option = 'selected';
            else $option = '';
            printf("<option value='%s' %s>%s</option>", $key, $option, $value);
          }
          echo "</select>";
          echo "<input type='hidden' value='".$row['id']."' name='id'>";
          echo "<span><input type='submit' value='Изменить'></div>";
          echo "</form></div>";
        }
        echo "</div>";

        $count_pages = $row_count['count(id)'] == $reviews_on_page ? $row_count['count(id)']/$reviews_on_page : $row_count['count(id)']/$reviews_on_page+1;
        if($count_pages >= 2){
          echo "<div class='pages'>Страницы: ";
          for($i = 1; $i <= $count_pages; $i++) { #создание блока "Страницы"
            if($i != $page) printf("<span><a href='reviews.php?page=%s&%s'>%s</a></span>", $i, $status_link, $i);
            else printf("<span class='current_page'>%s</span>", $i);
          }
          echo "</div>";
        }
      ?>
    </div>
  </body>
</html>
