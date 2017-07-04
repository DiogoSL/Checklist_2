<?php
require_once 'lib/setup.php';

$errors = [];
$userInput = null;
$action = null;

if (isset($_POST['action'])) {
  $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
  $action = $_GET['action'];
}

if (!isset($_SESSION['tasks'])) {
  $_SESSION['tasks'] = [];
}

if ($userInput !== null) {
  $_SESSION['tasks'][ ] = $userInput;
}

if ($action == 'addTask') {
  require_once 'actions/addTask.php';
}

if ($action == 'deleteTask') {
  require_once 'actions/delete_task.php';
}

if ($action == 'deleteAllTasks') {
  require_once 'actions/delete_all_tasks.php';
}

$tasks = $_SESSION['tasks'];

?>
<html>

<head>
  <title>Checklist</title>
</head>

<body style="background-color:red;" >

  <?php var_dump($_SESSION); ?>
  <?php var_dump($_POST); ?>

  <form action="" method="post">
    <input type='hidden' name='action' value='addTask'></input>
    <input style="align=center" value="" type='text' name='userInput' placeholder='What do you want to remeber?' size="40"></input>
    <button type='submit'>Save</button>
  </form>

<?php foreach ($errors as $error) : ?>
  <p><?php echo $error; ?> </p>
<?php endforeach; ?>

<a href='?action=deleteAllTasks'>Remove all tasks</a>
  <ul>
    <?php foreach ($tasks as $task): ?>
      <li><?php echo $task; ?><a href='?action=deleteTask&userInput=<?php echo urlencode($task)?>'>Remove</a></li>
    <?php endforeach; ?>
  </ul>


</body>
</html>
