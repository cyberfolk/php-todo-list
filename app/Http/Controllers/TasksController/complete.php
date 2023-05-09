<?php
include __DIR__ . '/helper/functions.php';
$todo_path = 'tasks/tasksTodo.json';
$done_path = 'tasks/tasksDone.json';

if (isset($_POST['index'])) {
    $index = $_POST['index'];

    // read the json file with file_get_contents
    $todo_json = file_get_contents($todo_path);
    $done_json = file_get_contents($done_path);
    // convert the json_string into an associative array with json_decode()
    $todo_array = json_decode($todo_json, true);
    $done_array = json_decode($done_json, true);

    // Get the deleted from todo_array
    $done_task = $todo_array[$index];
    // Set true done field
    $done_task["done"] = true;
    // Add the deleted task to the array
    array_unshift($done_array, $done_task);
    // remove object in array by index
    array_splice($todo_array, $index, 1); //array_splice accepts 3 parameters (array, start, length) removes the given array and then normalizes the index

    // convert the array back into a json string
    $todo_json = json_encode($todo_array);
    $done_json = json_encode($done_array);
    // replace the file content using file_put_contents()
    file_put_contents($todo_path, $todo_json);
    file_put_contents($done_path, $done_json);
}
