<?php
  function start_form($action, $method) {
    return "<form name=\"form1\" method=\"$method\" action=\"$action\">";
  }

  function end_form() {
    return "</form>";
  }

  function form_input($label, $name, $value='') {
    return "<label>$label<br><input value=\"$value\" type=\"text\" name=\"$name\" id=\"$name\"></label>";
  }

  function form_textarea($label, $name, $value='') {
    return "<label>$label<textarea name=\"$name\" id=\"$name\" cols=\"40\" rows=\"20\">$value</textarea></label>";
  }

  function form_submit($value) {
    return "<label><input type=\"submit\" name=\"submit\" id=\"submit\" value=\"$value\"></label>";
  }

  function form_hidden_field($name, $value) {
    return "<input id=\"$name\" name=\"$name\" type=\"hidden\" value=\"$value\">";
  }

?>
