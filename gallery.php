<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel='stylesheet' href="assets/styles/application.css" type='text/css'>
    <link rel='stylesheet' href="assets/styles/slides.css" type='text/css'>
    <script type="text/javascript" src="script/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="script/slides.min.jquery.js"></script>
    <script>
      $(function(){ //настройка параметров для слайдера
        $('#products').slides({
          preload: true,
          preloadImage: 'img/gallery/loading.gif',
          effect: 'slide, fade',
          crossfade: true,
          slideSpeed: 200,
          fadeSpeed: 500,
          generateNextPrev: true,
          generatePagination: false
        });
      });
    </script>
    <title>Ресторан | Ереван</title>
  </head>
  <body>
    <div id="base_block">
      <div id="header">
        <? include "blocks/header.php" ?>
      </div>
      <div id="content">
        <div class="header">Фотогалерея</div>
        <div id="container">
          <div id="products">
            <div class="slides_container">
              <?
                $dir = "img/gallery/photos"; //задаем директорию для всех фотографий
                if(is_dir($dir)) {   //проверяем наличие директории
                  $files = scandir($dir); //сканируем (получаем массив файлов)
                  array_shift($files); // удаляем из массива '.'
                  array_shift($files); // удаляем из массива '..'
                  for($i = 0; $i < sizeof($files); $i++)
                  echo "<img src=\"".$dir."/".$files[$i]."\" width=\"640\">"; 
                 } 
              ?>
            </div>
          </div>
        </div>
      </div>
      <div id="footer">
        <? include "blocks/footer.php" ?>
      </div>
    </div>
  </body>
</html>
