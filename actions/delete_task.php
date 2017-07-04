<?php
function deleteTask ($userInput) {
  foreach ($_SESSION['tasks'] as $key => $value) {
    if ($value == $userInput) {
      unset($_SESSION['tasks'][$key]);
    }
  }
}
deleteTask($_GET['userInput']);
