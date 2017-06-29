<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && $action == 'delete') {
  return action_delete();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && $action == 'edit') {
  return action_edit();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['id']) && $action == 'new') {
  return action_new();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['id'])) {
  return action_index();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
  $result = action_show();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
  return action_update();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_GET['id'])) {
  return action_create();
}

?>
