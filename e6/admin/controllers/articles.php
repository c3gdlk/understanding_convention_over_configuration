<?php

function action_index() {
  $result = array();

  $result['articles_list'] = Article::all();
  $result['render_template'] = 'index';

  return $result;
}

function action_show() {
  $result = array();
  $result['myrow'] = Article::one($_GET['id']);
  $result['render_template'] = 'edit';

  return $result;
}

function action_new() {
  $result = array();
  $result['render_template'] = 'new';

  return $result;
}

function action_create() {
  $result = array();

  $article = new Article($_POST['article']);
  if ($article->save()) {
    $result['render_content'] = "<p>Success</p><a href=\"index.php\">Back to list</a>";
  }
  else {
    $result['render_template'] = 'new';
  }

  return $result;
}

function action_edit() {
  $result = array();
  $result['myrow'] = Article::one($_GET['id']);
  $result['render_template'] = 'edit';

  return $result;
}

function action_update() {
  $result = array();

  $article = Article::one($_POST['id']);
  $article->assign_attributes($_POST['article']);

  if ($article->save()) {
    $result['render_content'] = "<p>Success</p><a href=\"index.php\">Back to list</a>";
  }
  else {
    $result['myrow'] = $article;
    $result['render_template'] = 'edit';
  }

  return $result;
}

function action_delete() {
  $result = array();

  $article = Article::one($_GET['id']);
  $article->delete();

  return action_index();
}


$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$result = include "lib/rest.php";

extract($result);
