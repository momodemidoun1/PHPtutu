<?php
$file = __DIR__.DIRECTORY_SEPARATOR.'demo.csv';
$resource = fopen($file, 'r+');
$k = 0;
while ($ligne = fgets($resource)) { //every round $ligne gets a new value which represents the real ligne in demo.csv
    $k++;
    if($k === 0){
        fwrite($resource, 'Salut les gens ');
        break;
    }
}// while loop will exit once we attend to the seeked ligne(1000), or when fgets send false.(fgets sends false when it arrive to the end  of file )

