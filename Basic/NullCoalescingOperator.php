<?php

$data = [
    "action" => "Create"
];
$action = $data["action"] ?? "Nothing";

echo $action . PHP_EOL;

// isset check data is initialized and not null
if (isset($data['action'])) {
    $action = $data['action'];
}

echo $action . PHP_EOL;
