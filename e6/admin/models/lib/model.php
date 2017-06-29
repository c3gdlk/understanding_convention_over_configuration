<?php

class Model {
  public $id = null;

  private $_where = array();
  private $_data = array();

  public function __get($name) {
    if (isset($this->_data[$name]))
      return $this->_data[$name];
    else
      return null;
  }

  function __construct($data=array()) {
    $this->assign_attributes($data);
  }

  static public function table_name() {
    throw new Exception('Not implemented');
  }

  static public function new_instance() {
    throw new Exception('Not implemented');
  }

  public function valid() {
    return true;
  }

  static public function all() {
    $result = mysql_query("SELECT * FROM " . static::table_name());
    $myrow = mysql_fetch_array ($result);

    $data = array();

    do {
      $data[] = static::new_instance($myrow);
    }  while ($myrow = mysql_fetch_array ($result));

    return $data;
  }

  public static function one($id) {
    $table_name = static::table_name();
    $result = mysql_query("SELECT * FROM $table_name WHERE id=$id");
    return static::new_instance(mysql_fetch_array($result));
  }

  public function assign_attributes($data) {
    $this->_data = $data;
    if (isset($data['id'])) {
      $this->id = $data['id'];
    }
  }

  public function save() {
    if (!$this->valid()) {
      return false;
    }

    $sql = '';
    $table_name = static::table_name();

    if ($this->id) {
      $values = [];

      foreach ($this->_data as $field => $value) {
        if ($field != 'id')
          $values[] = "$field='$value'";
      }

      $values = implode(',', $values);
      $sql = "UPDATE $table_name SET $values WHERE id='$this->id'";
    }
    else {
      $fields = [];
      $values = [];
      foreach ($this->_data as $field => $value) {
        $fields[] = $field;
        $values[] = "'$value'";
      }

      $fields = implode(',', $fields);
      $values = implode(',', $values);

      $sql = mysql_query ("INSERT INTO $table_name ($fields) VALUES ($values)");
    }

    mysql_query($sql);

    return true;
  }

  public function delete() {
    $table_name = static::table_name();
    return mysql_query("DELETE FROM $table_name WHERE id='$this->id'");
  }
}

?>
