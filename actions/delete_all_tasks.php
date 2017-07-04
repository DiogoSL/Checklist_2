<?php
function deleteAllTasks () {
  if (!$_SESSION['tasks']) {
  return ['You don\'t have any tasks'];
  }
    $_SESSION['tasks'] = [];

  return [];
}
$errors = deleteAllTasks();
