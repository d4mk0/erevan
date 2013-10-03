<?
  #Меню навигации для пользовательской части
  include "blocks/connect_db.php";
  $query = "SELECT * FROM menus";
  $result = mysql_query($query);
  echo "<div id='menu'>";
  while ($row = mysql_fetch_array($result)) {
    echo "<a href=\"".$row['path']."\"><span>".$row['name']."</span></a>";
  }
  echo "</div>";
?>