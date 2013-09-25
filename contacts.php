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
        <a id="firmsonmap_biglink" href="http://maps.2gis.ru/#/?history=project/penza/center/45.02042239427,53.189378063192/zoom/17/state/widget/id/5911502791908024/firms/5911502791908024">Перейти к большой карте</a>
        <script charset="utf-8" type="text/javascript" src="http://firmsonmap.api.2gis.ru/js/DGWidgetLoader.js"></script>
        <script charset="utf-8" type="text/javascript">new DGWidgetLoader({"borderColor":"#a3a3a3","width":"450","height":"350","wid":"eb2bec4f69b34faedf09b93756231705","pos":{"lon":"45.02042239427","lat":"53.189378063192","zoom":"17"},"opt":{"ref":"hidden","card":["name","contacts","schedule","payings"],"city":"penza"},"org":[{"id":"5911502791908024"}]});</script>
        <noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в настройках вашего браузера.</noscript>
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
