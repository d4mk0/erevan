<!--Оповещение для новых отзывов-->
<div id="notify">
  <?
      $query = "SELECT count(id) FROM reviews WHERE status='new'";
      $result = mysql_query($query);
      $row_count = mysql_fetch_array($result);
      $count = $row_count['count(id)'];
      if($count > 0) {
        printf("Имеются новые отзывы: <a href='reviews.php?status=new'>%s шт!</a>", $count);
      }
  ?>
</div>