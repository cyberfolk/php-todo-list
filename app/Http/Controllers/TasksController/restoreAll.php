<?php
include __DIR__ . '/functions.php';

$todo_path = 'tasksTodo.json';
$deleted_path = 'tasksDeleted.json';

// read the json file with file_get_contents
$todo_string = file_get_contents($todo_path);
$deleted_string = file_get_contents($deleted_path);
// convert the json_string into an associative array with json_decode()
$todo_array = json_decode($todo_string, true);
$deleted_array = json_decode($deleted_string, true);

// Restore all deleted_array into todo_array
$todo_array = array_merge($todo_array, $deleted_array);
// remove object in array by index
array_splice($deleted_array, 0, count($deleted_array)); //array_splice accepts 3 parameters (array, start, length) removes the given array and then normalizes the index

// convert the array back into a json string
$todo_json = json_encode($todo_array);
$deleted_json = json_encode($deleted_array);
// replace the file content using file_put_contents()
file_put_contents($todo_path, $todo_json);
file_put_contents($deleted_path, $deleted_json);
