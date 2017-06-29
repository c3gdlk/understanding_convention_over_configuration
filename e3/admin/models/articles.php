<?php
function all_articles() {
  $result = mysql_query("SELECT id,title,description,author,date FROM articles");
  $myrow = mysql_fetch_array ($result);

  $articles_list = array();

  do {
    $articles_list[] = $myrow;
  }  while ($myrow = mysql_fetch_array ($result));

  return $articles_list;
}

function get_article($id) {
  $result = mysql_query("SELECT * FROM articles WHERE id=$id");
  return mysql_fetch_array($result);
}

function create_article($title, $meta_d, $meta_k, $date, $description, $text, $author) {
  return mysql_query ("INSERT INTO articles (title,meta_d,meta_k,date,description,text,author) VALUES ('$title', '$meta_d','$meta_k','$date','$description','$text','$author')");
}

function update_article($id, $title, $meta_d, $meta_k, $text) {
  return mysql_query ("UPDATE articles SET title='$title', meta_d='$meta_d', meta_k='$meta_k', text='$text' WHERE id='$id'");
}

function delete_article($id) {
  return mysql_query("DELETE FROM articles WHERE id='$id'");
}
?>
