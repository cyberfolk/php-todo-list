<?php
include __DIR__ . '/functions.php';
$todo_path = 'tasksTodo.json';
$done_path = 'tasksDone.json';

if (isset($_POST['index'])) {
    $index = $_POST['index'];

    // read the json file with file_get_contents
    $todo_string = file_get_contents($todo_path);
    $done_string = file_get_contents($done_path);
    // convert the json_string into an associative array with json_decode()
    $todo_array = json_decode($todo_string, true);
    $done_array = json_decode($done_string, true);

    $todo_array[$index]["done"] = !$todo_array[$index]["done"];

    // Get the deleted from todo_array
    $done_task = $todo_array[$index];
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
