<?php
  $username = 'rails';
  $password = '';
  $server = 'localhost';
  $database = 'erevan';
  $link = mysql_connect($server, $username, $password);
  if(!$link) {
    die('Error connection to server: '.mysql_error());
  }
  $db = mysql_select_db($database, $link);
  if(!$db) {
    die('Error connection to db: '.mysql_error());
  }
  mysql_query("set names utf8");
?>