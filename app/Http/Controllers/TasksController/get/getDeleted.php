<?php
include __DIR__ . './../helper/functions.php';

$file_path = '../tasks/tasksDeleted.json';
$tasks_json_string = file_get_contents($file_path);
echo $tasks_json_string;
