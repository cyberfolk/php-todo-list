<?php

function get_file_string($file_path)
{
    $file_string = file_get_contents($file_path);
    echo $file_string;
}

// add header application/json
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
