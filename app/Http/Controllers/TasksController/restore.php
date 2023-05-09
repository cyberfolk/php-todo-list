<?php
include __DIR__ . '/helper/functions.php';

$todo_path = 'tasksTodo.json';
$deleted_path = 'tasksDeleted.json';

if (isset($_POST['index'])) {
    $index = $_POST['index'];

    // read the json file with file_get_contents
    $todo_json = file_get_contents($todo_path);
    $deleted_json = file_get_contents($deleted_path);
    // convert the json_json into an associative array with json_decode()
    $todo_array = json_decode($todo_json, true);
    $deleted_array = json_decode($deleted_json, true);

    // Get the deleted from todo_array
    $restored_task = $deleted_array[$index];
    // Add the deleted task to the array
    array_unshift($todo_array, $restored_task);
    // remove object in array by index
    array_splice($deleted_array, $index, 1); //array_splice accepts 3 parameters (array, start, length) removes the given array and then normalizes the index

    // convert the array back into a json string
    $todo_json = json_encode($todo_array);
    $deleted_json = json_encode($deleted_array);
    // replace the file content using file_put_contents()
    file_put_contents($todo_path, $todo_json);
    file_put_contents($deleted_path, $deleted_json);
}
