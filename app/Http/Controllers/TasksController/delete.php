<?php
$todo_path = 'tasksTodo.json';
$deleted_path = 'tasksDeleted.json';

if (isset($_POST['index'])) {
    $index = $_POST['index'];

    // read the json file with file_get_contents
    $todo_string = file_get_contents($todo_path);
    $deleted_string = file_get_contents($deleted_path);
    // convert the json_string into an associative array with json_decode()
    $todo_array = json_decode($todo_string, true);
    $deleted_array = json_decode($deleted_string, true);

    // Get the deleted from todo_array
    $deleted_task = $todo_array[$index];
    // Add the deleted task to the array
    array_unshift($deleted_array, $deleted_task);
    // remove object in array by index
    array_splice($todo_array, $index, 1); //array_splice accepts 3 parameters (array, start, length) removes the given array and then normalizes the index

    // convert the array back into a json string
    $todo_array = json_encode($todo_array);
    $deleted_array = json_encode($deleted_array);
    // replace the file content using file_put_contents()
    file_put_contents($todo_path, $todo_array);
    file_put_contents($deleted_path, $deleted_array);


    // add header application/json
    header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: X-Requested-With");
}
