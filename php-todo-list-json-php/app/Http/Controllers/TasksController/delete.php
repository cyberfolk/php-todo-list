<?php
include __DIR__ . '/helper/functions.php';
$deleted_path = 'tasks/tasksDeleted.json';
$start_path = $_POST['start_path']; // The directory that contains the task to move - tasksTodo.json or tasksDone.json

if (isset($_POST['index'])) {
    $index = $_POST['index'];

    // read the json file with file_get_contents
    $start_json = file_get_contents($start_path);
    $deleted_json = file_get_contents($deleted_path);
    // convert the json_json into an associative array with json_decode()
    $start_array = json_decode($start_json, true);
    $deleted_array = json_decode($deleted_json, true);

    // Get the deleted from start_array
    $deleted_task = $start_array[$index];
    // Set true done field
    $deleted_task["done"] = true;
    // Add the deleted task to the array
    array_unshift($deleted_array, $deleted_task);
    // remove object in array by index
    array_splice($start_array, $index, 1); //array_splice accepts 3 parameters (array, start, length) removes the given array and then normalizes the index

    // convert the array back into a json string
    $start_json = json_encode($start_array);
    $deleted_json = json_encode($deleted_array);
    // replace the file content using file_put_contents()
    file_put_contents($start_path, $start_json);
    file_put_contents($deleted_path, $deleted_json);
}
