<?php
var_dump(dirname(__DIR__));
$file = __DIR__.DIRECTORY_SEPARATOR.'demo.txt';
file_put_contents($file, 'Marca comment czaeazeaza va', FILE_APPEND);
