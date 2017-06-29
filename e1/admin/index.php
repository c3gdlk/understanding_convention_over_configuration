<?php
require "../includes/bd.php";

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

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>index</title>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div>

<?php if ($action == 'index'): ?>
  <h1><a href="index.php?action=new">New Article</a></h1>
  <?php

  $result = mysql_query ("SELECT id,title,description,author,date FROM articles",$db);

  $myrow = mysql_fetch_array ($result); ?>

  <table align='center' class='lesson' border=1>
  <?php do { ?>
  		 <tr>
           <td class='lesson_title'>
  		 <p class='lesson_name'><h1><a href="index.php?action=edit&id=<?php echo $myrow['id']?>"><?php echo $myrow["title"] ?></a></h1></p>
  		 <p class='lesson_adds'>Дата добавления: <?php echo $myrow["date"] ?></p>
  		 <p class='lesson_adds'>Автор статьи: <?php echo $myrow["author"] ?></p></td>
           </tr>

  		 <tr>
           <td><?php echo $myrow["description"] ?><h3><a href="index.php?action=delete&id=<?php echo $myrow['id']?>" style="color:red">Delete</a></h3></td>
           </tr>

  <?php } while ($myrow = mysql_fetch_array ($result)); ?>
<?php endif; ?>

<?php if ($action == 'new'): ?>
  <?php if (isset($title)): ?>
    <?php
    if (isset($title) && isset($meta_d) && isset($meta_k) && isset($date) && isset($description) && isset($text) && isset($author))
    {
      $result = mysql_query ("INSERT INTO articles (title,meta_d,meta_k,date,description,text,author) VALUES ('$title', '$meta_d','$meta_k','$date','$description','$text','$author')");

      if ($result == 'true') {echo "<p>Success</p>"; echo "<a href=\"index.php\">Back to list</a>"; }
      else {echo "<p>Fail!</p>";}
    }
    else

    {
      echo "<p>Not valid.</p>";
    }
    ?>
  <?php else: ?>
    <form name="form1" method="post" action="index.php?action=new">
     <p>
       <label>Title<br>
         <input type="text" name="title" id="title">
         </label>
     </p>
     <p>
       <label>Meta Description<br>
       <input type="text" name="meta_d" id="meta_d">
       </label>
     </p>
     <p>
       <label>Meta Keywords<br>
       <input type="text" name="meta_k" id="meta_k">
       </label>
     </p>
     <p>
       <label>Date<br>
       <input name="date" type="text" id="date" value="2015-01-27">
       </label>
     </p>
     <p>
       <label>Description
       <textarea name="description" id="description" cols="40" rows="5"></textarea>
       </label>
     </p>
     <p>
       <label>Content
       <textarea name="text" id="text" cols="40" rows="20"></textarea>
       </label>
     </p>
     <p>
       <label>Author<br>
       <input type="text" name="author" id="author">
       </label>
     </p>
     <p>
       <label>
       <input type="submit" name="submit" id="submit" value="Create">
       </label>
     </p>
    </form>
  <?php endif; ?>
<?php endif; ?>

<?php if ($action == 'edit'): ?>
  <?php if (isset($title)): ?>
    <?php
    if (isset($title) && isset($meta_d) && isset($meta_k) && isset($text) )
    {
      $result = mysql_query ("UPDATE articles SET title='$title', meta_d='$meta_d', meta_k='$meta_k', text='$text' WHERE id='$id'");

      if ($result == 'true') {echo "<p>Success</p>"; echo "<a href=\"index.php\">Back to list</a>"; }
      else {echo "<p>Fail!</p>";}
    }
    else

    {
      echo "<p>Not valid.</p>";
    }
    ?>
  <?php else: ?>
    <?php
      $result = mysql_query("SELECT * FROM articles WHERE id=$id");
      $myrow = mysql_fetch_array($result);
    ?>
    <form name="form1" method="post" action="index.php?action=edit">
       <p>
         <label>Title<br>
           <input value="<?php echo $myrow['title'] ?>" type="text" name="title" id="title">
           </label>
       </p>
       <p>
         <label>Meta description<br>
         <input value="<?php echo $myrow['meta_d'] ?>" type="text" name="meta_d" id="meta_d">
         </label>
       </p>
       <p>
         <label>Meta keywords<br>
         <input value="<?php echo $myrow['meta_k'] ?>" type="text" name="meta_k" id="meta_k">
         </label>
       </p>

       <p>
         <label>Content
         <textarea name="text" id="text" cols="40" rows="20"><?php echo $myrow['text'] ?></textarea>
         </label>
       </p>
	      <input name="id" type="hidden" value="<?php echo $myrow['id'] ?>">

       <p>
         <label>
         <input type="submit" name="submit" id="submit" value="Save">
         </label>
       </p>
     </form>
  <?php endif; ?>
<?php endif; ?>

<?php if ($action == 'delete'): ?>
  <?php
    if (isset($id)  )
    {
      $result = mysql_query ("DELETE FROM articles WHERE id='$id'");

      if ($result == 'true') {echo "<p>Success</p>"; echo "<a href=\"index.php\">Back to list</a>"; }
      else {echo "<p>Fail!</p>";}
    }
  ?>
<?php endif; ?>

</div>
</body>
</html>
