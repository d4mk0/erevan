<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel='stylesheet' href="assets/styles/application.css" type='text/css'>
    <link rel='stylesheet' href="assets/styles/form_style.css" type='text/css'>
    <script type="text/javascript" src="script/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="script/reviews.js"></script>
    <?
      include "connect_db.php";
      if($_POST['username'] != '' and $_POST['text'] != '' and
      $_POST['phone'] != '' ) {
        $username = $_POST['username'];
        $text = $_POST['text'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $query = sprintf("INSERT INTO reviews (username, text, phone, email)
          VALUES ('%s','%s','%s','%s')", $username, $text, $phone, $email);
        mysql_query($query);
      }
    ?>
    <title>Ресторан | Ереван</title>
  </head>
  <body>
    <div id="base_block">
      <div id="header">
        <? include "blocks/header.php" ?>
      </div>
      <div id="content">
        <div class="header">Здесь типа будут всякие там отзывы</div>
        <div class="review_invite">
          Оставьте свой отзыв
        </div>
        <div class="new_review">
          <form action="reviews.php" method="post">
            <table class="new_review_table">
              <tr>
                <td>Ваше имя:</td>
                <td><input type="text" name="username" maxlength="50"></td>
              </tr>
              <tr>
                <td>Текст:</td>
                <td><textarea required name="text" cols="50" rows="3"></textarea></td>
              </tr>
              <tr>
                <td>Телефон:</td>
                <td><input type="text" name="phone" maxlength="15"></td>
              </tr>
              <tr>
                <td>E-mail:</td>
                <td><input type="email" name="email" maxlength="30"></p></td>
              </tr>
              <tr>
                <td colspan="2" align="center"><input type="submit" value="Добавить"></td>
              </tr>
            </table>
            <p></p>
          </form>
        </div>
        <div class="reviews">
          <?
            echo $_POST['text'];
            $reviews_on_page = 5;
            if($_GET['page'] > 0) $page = $_GET['page'];
            else $page = 1;
            $result = mysql_query("SELECT count(id) FROM reviews");
            $row_count = mysql_fetch_array($result);
            $count = $row_count['count(id)'];
            $query = sprintf("SELECT * FROM reviews ORDER BY id DESC LIMIT 5
              OFFSET %s", ($page-1)*$reviews_on_page);
            $result = mysql_query($query);
            $count = $count-($page-1)*$reviews_on_page;
            while ($row = mysql_fetch_array($result)) {
              printf("<table class='review'>
                    <tr>
                    <td class='number'>#%s</td>
                    </tr>
                    <tr>
                      <td class='image'><img src=\"img/anonymous.png\" width=\"60\"></td>
                      <td class='text'>%s</td>
                    </tr>
                    <tr>
                      <td><div class='username'>%s</div></td>
                      <td class='date'>%s</td>
                    </tr>
                  </table>",
                $count--, $row['text'], $row['username'], date("d.m", strtotime($row['date'])));
            }
            
            echo "<div class='pages'>Страницы: ";
            for($i = 1; $i <= ($row_count['count(id)']/$reviews_on_page+1); $i++) {
              if($i != $page) printf("<span><a href='reviews.php?page=%s'>%s</a></span>", $i, $i);
              else printf("<span>%s</span>", $i);
            }
            echo "</div>";
          ?>
        </div>
      </div>
      <div id="footer">
        <? include "blocks/footer.php" ?>
      </div>
    </div>
  </body>
</html>
