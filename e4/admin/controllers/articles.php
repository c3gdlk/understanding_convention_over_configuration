<?php

function action_index() {
  $result = array();

  $result['articles_list'] = all_articles();
  $result['render_template'] = 'index';

  return $result;
}

function action_new() {
  $result = array();
  if (isset($_POST['title']) && $_POST['title']):
    if (isset($_POST['title']) && isset($_POST['meta_d']) && isset($_POST['meta_k']) && isset($_POST['date']) && isset($_POST['description']) && isset($_POST['text']) && isset($_POST['author']))
    {
      $r = create_article($_POST['title'], $_POST['meta_d'], $_POST['meta_k'], $_POST['date'], $_POST['description'], $_POST['text'], $_POST['author']);

      if ($r == 'true') {$result['render_content'] = "<p>Success</p><a href=\"index.php\">Back to list</a>"; }
      else {$result['render_content'] = "<p>Fail!</p>";}
    }
    else
    {
      $result['render_content'] = "<p>Not valid.</p>";
    }

  else:
    $result['render_template'] = 'new';
  endif;

  return $result;
}

function action_edit() {
  $result = array();

  if (isset($_POST['title'])):

    if (isset($_POST['title']) && isset($_POST['meta_d']) && isset($_POST['meta_k']) && isset($_POST['text']) )
    {
      $r = update_article($_POST['id'], $_POST['title'], $_POST['meta_d'], $_POST['meta_k'], $_POST['text']);

      if ($r == 'true') {$result['render_content'] = "<p>Success</p><a href=\"index.php\">Back to list</a>"; }
      else {$result['render_content'] = "<p>Fail!</p>";}
    }
    else
    {
      $result['render_content'] = "<p>Not valid.</p>";
    }

  else:

    $result['myrow'] = get_article($_GET['id']);
    $result['render_template'] = 'edit';

  endif;

  return $result;
}

function action_delete() {
  $result = array();

  if (isset($_GET['id'])  )
  {
    $r = delete_article($_GET['id']);

    if ($r == 'true') {$result['render_content'] = "<p>Success</p><a href=\"index.php\">Back to list</a>"; }
    else {$result['render_content'] = "<p>Fail!</p>";}
  }

  return $result;
}


$action = isset($_GET['action']) ? $_GET['action'] : 'index';
switch ($action) {
  case 'index':
      $result = action_index();
      break;
  case 'new':
      $result = action_new();
      break;
  case 'edit':
      $result = action_edit();
      break;
  case 'delete':
      $result = action_delete();
      break;
}

extract($result);
