<!-- MODELS  -->
<?php
require "../includes/bd.php";

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





<!-- CONTROLLERS  -->

<?php
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if (isset($_POST['title']))
{
  $title = $_POST['title'];

  if ($title == '')
  {
    unset($title);
  }

}

if (isset($_POST['meta_d']))      {$meta_d = $_POST['meta_d']; if ($meta_d == '') {unset($meta_d);}}
if (isset($_POST['meta_k']))      {$meta_k = $_POST['meta_k']; if ($meta_k == '') {unset($meta_k);}}
if (isset($_POST['date']))        {$date = $_POST['date']; if ($date == '') {unset($date);}}
if (isset($_POST['description'])) {$description = $_POST['description']; if ($description == '') {unset($description);}}
if (isset($_POST['text']))        {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['author']))      {$author = $_POST['author']; if ($author == '') {unset($author);}}

if (isset($_POST['id']))          {$id = $_POST['id'];}
if (isset($_GET['id']))           {$id = $_GET['id'];}




if ($action == 'index'):

  $articles_list = all_articles();
  $render_template = 'index';

endif;

if ($action == 'new'):
  if (isset($title)):
    if (isset($title) && isset($meta_d) && isset($meta_k) && isset($date) && isset($description) && isset($text) && isset($author))
    {
      $result = create_article($title, $meta_d, $meta_k, $date, $description, $text, $author);

      if ($result == 'true') {$render_content = "<p>Success</p><a href=\"index.php\">Back to list</a>"; }
      else {$render_content = "<p>Fail!</p>";}
    }
    else
    {
      $render_content = "<p>Not valid.</p>";
    }

  else:
    $render_template = 'new';
  endif;
endif;

if ($action == 'edit'):
  if (isset($title)):

    if (isset($title) && isset($meta_d) && isset($meta_k) && isset($text) )
    {
      $result = update_article($id, $title, $meta_d, $meta_k, $text);

      if ($result == 'true') {$render_content = "<p>Success</p><a href=\"index.php\">Back to list</a>"; }
      else {$render_content = "<p>Fail!</p>";}
    }
    else
    {
      $render_content = "<p>Not valid.</p>";
    }

  else:

      $myrow = get_article($id);
      $render_template = 'edit';

  endif;
endif;

if ($action == 'delete'):

  if (isset($id)  )
  {
    $result = delete_article($id);

    if ($result == 'true') {$render_content = "<p>Success</p><a href=\"index.php\">Back to list</a>"; }
    else {$render_content = "<p>Fail!</p>";}
  }

endif;

?>


<!-- VIEWS  -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>index</title>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div>
<?php
if (isset($render_content))
  echo $render_content;
else
  include "tpl/$render_template.php";
?>
</div>
</body>
</html>
