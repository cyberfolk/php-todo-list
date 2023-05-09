<?php
include __DIR__ . '/helper/functions.php';

$todo_path = '/tasks/tasksTodo.json';
$start_path = $_POST['start_path']; // The directory that contains the task to move - tasksDeleted.json or tasksDone.json

if (isset($_POST['index'])) {
    $index = $_POST['index'];

    // read the json file with file_get_contents
    $todo_json = file_get_contents($todo_path);
    $start_json = file_get_contents($start_path);
    // convert the json_json into an associative array with json_decode()
    $todo_array = json_decode($todo_json, true);
    $start_array = json_decode($start_json, true);

    // Get the restored task from start_array
    $restored_task = $start_array[$index];
    // Add the restored task to the array
    array_unshift($todo_array, $restored_task);
    // remove object in array by index
    array_splice($start_array, $index, 1); //array_splice accepts 3 parameters (array, start, length) removes the given array and then normalizes the index

    // convert the array back into a json string
    $todo_json = json_encode($todo_array);
    $start_json = json_encode($start_array);
    // replace the file content using file_put_contents()
    file_put_contents($todo_path, $todo_json);
    file_put_contents($start_path, $start_json);
}
