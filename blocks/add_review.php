<?php
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
  echo '<meta http-equiv="refresh" content="0;URL=../reviews.php">';
?>
