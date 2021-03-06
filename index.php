<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><!--Установка кодировки страницы-->
    <link rel='stylesheet' href="assets/styles/application.css" type='text/css'><!--Подключение теблицы стилей-->
    <script type="text/javascript" src="script/jquery-2.0.3.js"></script><!--Подключение библиотеки jQuery-->
    <title>Ресторан | Ереван</title>
  </head>
  <body>
    <div id="base_block">
      <div id="header">
        <? include "blocks/header.php" #подключение шапки сайта ?>
      </div>
      <div id="content">
        <div class="header">Вы находитесь на главной странице ресторана Ереван</div>
        <div class="description">
          Армянский ресторан «Ереван» - это зал вместимостью до 100 человек.
          Наш ресторан идеально подходит, как для проведения деловых переговоров
          и обсуждения бизнес идей с партнёрами, для романтического ужина при свечах,
          так и для больших корпоративных мероприятий, проведения свадьбы,
          торжеств, юбилея, семейного праздника. Каждые день у нас поют вокалисты,
          голоса которых не оставят равнодушными даже самого изысканного меломана.
          Мы стараемся сделать так, что бы ваше корпоративное мероприятие, банкет,
          свадебное торжество, день рождения прошли в ярких красках и запомнились
          на долгие годы.Для Вас в ресторане работает команда профессионалов,
          состоящая в первую очередь из поваров высшей категории, настоящих
          ценителей армянской кухни, а так же коллектив фото-, видео-операторов,
          оформителей, профессиональных музыкантов.
        </div>
      </div>
      <div id="footer">
        <? include "blocks/footer.php" #подключение футера ?>
      </div>
    </div>
  </body>
</html>
