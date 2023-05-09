<?php
include __DIR__ . '/helper/functions.php';

$file_path = 'tasksTodo.json';

if (isset($_POST['new_task'])) {
  $task = [
    "name" => $_POST['new_task'],
    "done" => false
  ];

  // read the json file with file_get_contents
  $tasks_json = file_get_contents($file_path);
  // convert the json_json into an associative array with json_decode()
  $tasks_array = json_decode($tasks_json, true);
  //add the new task to the array
  array_unshift($tasks_array, $task);

  // convert the array back into a json string
  $tasks_array = json_encode($tasks_array);
  // replace the file content using file_put_contents()
  file_put_contents($file_path, $tasks_array);
}
