<?php
function add_vue(): void{
    $file_name = date('Y-m-d');
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'counter-' . $file_name;
    $counter = 1;
    if (file_exists($file)){//If the file already exist we increment our counter by 1
        $counter = (int)file_get_contents($file);
        $counter++;
    }
    file_put_contents($file, $counter); //in all cases this lane gonna be excuted and wether its sending 1 to the 'counter.php' or it sends the counter incremendted
}

function vue_number(): string{
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'counter-' . date('Y-m-d');
    return file_get_contents($file);
}

//print the total number of visits of an giving month
function month_number_vue(int $year, int $month): int{
    $total = 0;
    $month = str_pad($month, 2, '0', STR_PAD_LEFT);
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'counter-' . $year . '-' . $month . '-' . '*';
    $files = glob($file);
    foreach($files as $file){
        $total += (int)file_get_contents($file);
    }
    return $total;
}

function vue_number_detail_month(int $year, int $month): array{
    $month = str_pad($month, 2, '0', STR_PAD_LEFT);
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'counter-' . $year . '-' . $month . '-' . '*';
    $files = glob($file);
    $vues =[];
    foreach($files as $file){
       $parts = explode('-', basename($file)); 
       $vues[] = [
           'year' => $parts[1],
           'month' => $parts[2],
           'day' => $parts[3],
           'visits' => file_get_contents($file),
       ];
    }
    return $vues;
}