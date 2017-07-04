<?php
function addTask ($userInput) {
  $errors = [];
  $userInput = trim($userInput);

  if ($userInput !== null) {
    foreach($_SESSION['tasks'] as $task) {
      if (strtolower($task) == strtolower($userInput)) {
        $errors[] = 'You already added this task';
        break;
      }
    }
  }
  if ($userInput == '') {
    $errors[] = 'Cannot be blank';
  }


  if (count($errors) == 0) {
$_SESSION['tasks'][] = $userInput;
  }

  return $errors;
}

$userInput = $_POST['userInput'];

$errors = addTask($userInput);
