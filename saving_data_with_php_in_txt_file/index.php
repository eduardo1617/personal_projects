<?php
$file = fopen('database.txt', 'r');

$users = [];

while (!feof($file)) {

    $dataBase = unserialize(fgets($file));
    if(empty($dataBase)) {
        continue;
    }
    $users[] = $dataBase;
 }

fclose($file);

require_once 'index.view.php';