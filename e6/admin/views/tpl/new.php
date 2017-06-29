<?php echo start_form("index.php?action","post" ) ?>
   <p><?php echo form_input("Title","article[title]") ?></p>
   <p><?php echo form_input("Meta description","article[meta_d]") ?></p>
   <p><?php echo form_input("Meta keywords","article[meta_k]") ?></p>
   <p><?php echo form_input("Date","article[date]", "2015-01-27") ?></p>
   <p><?php echo form_input("Author","article[author]") ?></p>
   <p><?php echo form_textarea("Description","article[description]") ?></p>
   <p><?php echo form_textarea("Content","article[text]") ?></p>

   <p><?php echo form_submit("Save") ?> </p>
<?php echo end_form() ?>
