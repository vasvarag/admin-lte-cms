<?php

function connect() {
    $info = 'sqlite:database.sqlite3';
    $connection = null;

    try {
      $connection = new PDO($info);
    } catch(PDOException $e) {
      print "Error Founds: ".$e->getMessage().PHP_EOL;
      die();
    }

    return $connection;
}

$db = connect(); 

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $db->exec("CREATE TABLE IF NOT EXISTS products (
//   id  INTEGER PRIMARY KEY AUTOINCREMENT,
//   name  VARCHAR(250),
//   description TEXT,
//   intro  VARCHAR(250),
//   subcategory VARCHAR(250),
//   cover_img VARCHAR(250),
//   featured_img  VARCHAR(250),
//   alt_tag VARCHAR(250)
// )");

// $db->exec("CREATE TABLE IF NOT EXISTS users (
//   id INTEGER PRIMARY KEY,
//   username VARCHAR(250),
//   email VARCHAR(250)
// )");

// $db->exec("INSERT INTO users VALUES ('4', '444', '4444444@gmail.com')");
// $db->exec("INSERT INTO products VALUES ('1', 'name  #1', 'description #1', 'into  #1', 'subcategory #1', 'cover_img#1', 'featured_img#1', 'alt_tag #1')");
// $db->exec("INSERT INTO products VALUES ('2', 'name  #2', 'description #2', 'into  #2', 'subcategory #2', 'cover_img#2', 'featured_img#2', 'alt_tag #2')");
// $db->exec("INSERT INTO products VALUES ('3', 'name  #3', 'description #3', 'into  #3', 'subcategory #3', 'cover_img#3', 'featured_img#3', 'alt_tag #3')");
// $db->exec("INSERT INTO products VALUES ('5', 'name  #4', 'description #4', 'into  #4', 'subcategory #4', 'cover_img#4', 'featured_img#4', 'alt_tag #4')");
// $db->exec("INSERT INTO products VALUES ('6', 'name  #6', 'description #6', 'into  #6', 'subcategory #6', 'cover_img#6', 'featured_img#6', 'alt_tag #6')");




