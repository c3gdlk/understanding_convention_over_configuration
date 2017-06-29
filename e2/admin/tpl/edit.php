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
