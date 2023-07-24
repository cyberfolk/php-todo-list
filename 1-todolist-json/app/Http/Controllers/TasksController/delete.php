<?php
$file_path = 'tasks.json';

if (isset($_POST['index'])) {
    $index = $_POST['index'];

    // read the json file with file_get_contents
    $tasks_string = file_get_contents($file_path);
    // convert the json_string into an associative array with json_decode()
    $tasks_array = json_decode($tasks_string, true);

    // remove object in array by index
    array_splice($tasks_array, $index, 1); //array_splice accepts 3 parameters (array, start, length) removes the given array and then normalizes the index
    // OR 
    // unset($tasks_array[$index]); //removes the array at given index
    // $reindex = array_values($tasks_array); //normalize index
    // $tasks_array = $reindex; //update variable 

    // convert the array back into a json string
    $tasks_array = json_encode($tasks_array);
    // replace the file content using file_put_contents()
    file_put_contents($file_path, $tasks_array);
    // add header application/json
    header('Content-Type: application/json');

    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: X-Requested-With");
}
