<?php
require 'header.php';
require_once 'functions.php';
$parfums = [
    'fraise' => 4,
    'vanille' => 5,
    'chocolat' => 3
];
$cornets = [
    'pot' => 2,
    'cornet' => 3
];
$supplements = [
    'pepite de chocolat' => 2,
    'chatilly' => 5
];
$ingredients = [];
$total = 0;

foreach(['parfum', 'supplement', 'cornet'] as $name){
    if(isset($_GET[$name.'s'])){
        $liste = $name.'s';
        $choix = $_GET[$name.'s'];
        if(is_array($choix)){
            foreach ($choix as $value){
                if(isset($$liste[$value])){
                    $ingredients[] = $value;
                    $total += $$liste[$value];
                }
            }
        }else{
            if(isset($$liste[$value])){
                $ingredients[] = $choix;
                $total += $$liste[$choix];     
            }
            }
    }
}
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Votre glace</h5>
            <ul>
                <?php foreach($ingredients as $ingredient) :?>
                    <li><?= $ingredient ?></li>
                <?php endforeach; ?>                
            </ul>   
        <p><strong> Prix : </strong><?= $total ?> - €</p>  
    </div>
</div>
<h1>Composer votre glace</h1>
<form action="/jeu.php" method="GET">  
<h2>Choisissez vos gouts</h2>
    <?php foreach($parfums as $parfum => $price):?>
        <div class="checkbox">
            <label >
                <?= checkbox('parfums', $parfum, $price, $_GET)?>
            </label>
        </div>
    <?php endforeach; ?> 
    <h2>Choisissez votre cornet</h2>
    <?php foreach($cornets as $cornet => $price):?>
        <div class="radio">
            <label >
                <?= radio('cornets', $cornet, $price, $_GET) ?>
            </label>
        </div>
    <?php endforeach; ?>
    <h2>Choisissez vos supplements</h2>
    <?php foreach($supplements as $supplement => $price):?>
        <div class="checkbox">
            <label >
                <?= checkbox('supplements', $supplement,$price, $_GET)?>
            </label>
        </div>
    <?php endforeach; ?> 
    <button type="submit" class="btn btn-primary btn-sm">Composer ma glace</button>
</form>

<?php
require 'footer.php'?>