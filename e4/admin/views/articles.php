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
