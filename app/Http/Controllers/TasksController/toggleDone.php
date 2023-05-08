<?php
$file_path = 'tasks.json';

if (isset($_POST['index'])) {
    $index = $_POST['index'];

    // read the json file with file_get_contents
    $tasks_string = file_get_contents($file_path);
    // convert the json_string into an associative array with json_decode()
    $tasks_array = json_decode($tasks_string, true);

    $tasks_array[$index]["done"] = !$tasks_array[$index]["done"];

    // convert the array back into a json string
    $tasks_array_toggled = json_encode($tasks_array);
    // replace the file content using file_put_contents()
    file_put_contents($file_path, $tasks_array_toggled);
    // add header application/json
    header('Content-Type: application/json');

    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: X-Requested-With");
}
