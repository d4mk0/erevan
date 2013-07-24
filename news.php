<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel='stylesheet' href="assets/styles/application.css" type='text/css'>
    <link rel='stylesheet' href="assets/styles/form_style.css" type='text/css'>
    <?
      include "blocks/connect_db.php";
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
        <div class="header">Новости ресторана</div>
        <div class="reviews">
          <?
            $reviews_on_page = 5;
            if($_GET['page'] > 0) $page = $_GET['page'];
            else $page = 1;
            $result = mysql_query("SELECT count(id) FROM reviews WHERE status='approved'");
            $row_count = mysql_fetch_array($result);
            $count = $row_count['count(id)'];
            $query = sprintf("SELECT * FROM reviews WHERE status='approved' ORDER BY id DESC LIMIT 5
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
            $count_pages = $row_count['count(id)'] == $reviews_on_page ? $row_count['count(id)']/$reviews_on_page : $row_count['count(id)']/$reviews_on_page+1;
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
