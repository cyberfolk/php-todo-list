<?php
include __DIR__ . '/functions.php';

$file_path = 'tasksDone.json';
$tasks_json_string = file_get_contents($file_path);
echo $tasks_json_string;
