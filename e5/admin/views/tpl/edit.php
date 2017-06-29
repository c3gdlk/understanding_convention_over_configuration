<?php echo start_form("index.php","post" ) ?>
   <?php echo form_hidden_field("id", $myrow['id']) ?>
   <p><?php echo form_input("Title","title", $myrow['title']) ?></p>
   <p><?php echo form_input("Meta description","meta_d", $myrow['meta_d']) ?></p>
   <p><?php echo form_input("Meta keywords","meta_k", $myrow['meta_k']) ?></p>
   <p><?php echo form_textarea("Content","text", $myrow['text']) ?></p>

   <p><?php echo form_submit("Save") ?> </p>
<?php echo end_form() ?>
