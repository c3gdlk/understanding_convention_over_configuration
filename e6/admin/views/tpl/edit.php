<?php echo start_form("index.php?action=edit","post" ) ?>
   <?php echo form_hidden_field("id", $myrow->id) ?>
   <p><?php echo form_input("Title","article[title]", $myrow->title) ?></p>
   <p><?php echo form_input("Meta description","article[meta_d]", $myrow->meta_d) ?></p>
   <p><?php echo form_input("Meta keywords","article[meta_k]", $myrow->meta_k) ?></p>
   <p><?php echo form_textarea("Content","article[text]", $myrow->text) ?></p>

   <p><?php echo form_submit("Save") ?> </p>
<?php echo end_form() ?>
