<?php
include "lib/model.php";

class Article extends Model {

  static public function table_name() {
    return 'articles';
  }

  static public function new_instance($data) {
    return new Article($data);
  }

  public function valid() {
    return $this->title && $this->text;
  }

}

?>
