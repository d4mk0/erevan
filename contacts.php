<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel='stylesheet' href="assets/styles/application.css" type='text/css'>
    <link rel='stylesheet' href="assets/styles/form_style.css" type='text/css'>
    <script type="text/javascript" src="script/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="script/reviews.js"></script>
    <? include "blocks/connect_db.php" ?>
    <title>Ресторан | Ереван</title>
  </head>
  <body>
    <div id="base_block">
      <div id="header">
        <? include "blocks/header.php" ?>
      </div>
      <div id="content">
        <div class="header">Контакты</div>
         <div class="map">
        <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0"
                marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=ru&amp;geocode=&amp;q=%D0%9F%D0%B5%D0%BD%D0%B7%D0%B0+%D0%9A%D0%B8%D1%80%D0%BE%D0%B2%D0%B0+42&amp;aq=&amp;sll=53.193982,45.012116&amp;sspn=0.209388,0.676346&amp;t=m&amp;g=%D0%9F%D0%B5%D0%BD%D0%B7%D0%B0&amp;ie=UTF8&amp;hq=&amp;hnear=%D1%83%D0%BB.+%D0%9A%D0%B8%D1%80%D0%BE%D0%B2%D0%B0,+42,+%D0%9F%D0%B5%D0%BD%D0%B7%D0%B0,+%D0%9F%D0%B5%D0%BD%D0%B7%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C,+%D0%A0%D0%BE%D1%81%D1%81%D0%B8%D1%8F,+440000&amp;ll=53.190711,45.018026&amp;spn=0.001636,0.005284&amp;z=14&amp;output=embed"></iframe><br />
        </div>
        <div class="contacts">
          <?
            $query = "SELECT * FROM contacts";
            $result = mysql_query($query);
            while ($row = mysql_fetch_array($result)) {
              printf("<div>%s: %s</div>", $row['name'], $row['value']);
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
