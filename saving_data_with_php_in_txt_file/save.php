<?php

$data = serialize($_POST);

$file = fopen('database.txt', 'a+');

fwrite($file, "$data".PHP_EOL);

fclose($file);

header('location: index.php');





