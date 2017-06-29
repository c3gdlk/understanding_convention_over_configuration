<?php echo start_form("index.php","post" ) ?>
   <p><?php echo form_input("Title","title") ?></p>
   <p><?php echo form_input("Meta description","meta_d") ?></p>
   <p><?php echo form_input("Meta keywords","meta_k") ?></p>
   <p><?php echo form_input("Date","date", "2015-01-27") ?></p>
   <p><?php echo form_input("Author","author") ?></p>
   <p><?php echo form_textarea("Description","description") ?></p>
   <p><?php echo form_textarea("Content","text") ?></p>

   <p><?php echo form_submit("Save") ?> </p>
<?php echo end_form() ?>
