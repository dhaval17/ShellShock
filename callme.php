<?php
//Stores id
$id = $_GET['id'];
$f = 'id.log';
file_put_contents($f, $id . "\n", FILE_APPEND | LOCK_EX);

header("HTTP/1.0 302 Forced Bye Bye");
?>