<?php
require "includes/bd.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>index</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div>

<?php

$result = mysql_query ("SELECT id,title,description,author,date FROM articles",$db);

$myrow = mysql_fetch_array ($result); ?>

<table align='center' class='lesson' border=1>
<?php do { ?>



		 <tr>
         <td class='lesson_title'>
		 <p class='lesson_name'><h1><?php echo $myrow["title"] ?></h1></p>
		 <p class='lesson_adds'>Дата добавления: <?php echo $myrow["date"] ?></p>
		 <p class='lesson_adds'>Автор статьи: <?php echo $myrow["author"] ?></p></td>
         </tr>

		 <tr>
         <td><?php echo $myrow["description"] ?></td>
         </tr>





<?php } while ($myrow = mysql_fetch_array ($result)); ?>
</div>
</body>
</html>
