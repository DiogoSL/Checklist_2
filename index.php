<?php
require_once 'lib/setup.php';

$errors = [];
$userInput = null;
$action = null;

if (isset($_POST['action'])) {
  $action = $_POST['action'];
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

$tasks = $_SESSION['tasks'];

?>
<html>

<head>
  <title>Checklist</title>
</head>

<body style="background-color:red;" >

  <?php var_dump($_SESSION); ?>

  <form action="" method="post">
    <input type='hidden' name='action' value='addTask'></input>
    <input style="align=center" value="" type='text' name='userInput' placeholder='What do you want to remeber?' size="40"></input>
    <button type='submit'>Save</button>
  </form>

<?php foreach ($errors as $error) : ?>
  <p><?php echo $error; ?> </p>
<?php endforeach; ?>


  <ul>
    <?php foreach ($tasks as $task): ?>
      <li><?php echo $task; ?><a href='action=deleteTask&userInput=<?php echo urlencode($task)?>'>Remove</a></li>
    <?php endforeach; ?>
  </ul>


</body>
</html>
