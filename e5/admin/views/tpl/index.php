<h1><a href="index.php?action=new">New Article</a></h1>

<table align='center' class='lesson' border=1>
<?php foreach ($articles_list as $myrow) { ?>
     <tr>
         <td class='lesson_title'>
           <p class='lesson_name'><h1><a href="index.php?action=edit&id=<?php echo $myrow['id']?>"><?php echo $myrow["title"] ?></a></h1></p>
           <p class='lesson_adds'>Дата добавления: <?php echo $myrow["date"] ?></p>
           <p class='lesson_adds'>Автор статьи: <?php echo $myrow["author"] ?></p>
         </td>
      </tr>

     <tr>
         <td><?php echo $myrow["description"] ?><h3><a href="index.php?action=delete&id=<?php echo $myrow['id']?>" style="color:red">Delete</a></h3></td>
     </tr>

<?php } ?>
