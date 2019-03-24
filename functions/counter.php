<?php
function add_vue(): void{
    $file_name = date('Y-m-d');
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'counter ' . $file_name .'.php';
    $counter = 1;
    if (file_exists($file)){//If the file already exist we increment our counter by 1
        $counter = (int)file_get_contents($file);
        $counter++;
    }
    file_put_contents($file, $counter); //in all cases this lane gonna be excuted and wether its sending 1 to the 'counter.php' or it sends the counter incremendted
}

function vue_number($file): string{
    return file_get_contents($file);
}