<?php
$title = 'Nous contacter';
require 'header.php';
require_once 'config.php';
$crenaux = CRENAUX[(int)date('N') -1];
$heure = (int)date('G');
$ouvert = in_crenaux($heure, $crenaux);        
?>

<div class="row">
    <div class="col-md-8">
        <h2> Nous contacter </h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto repellendus vero ea saepe 
            earum exercitationem in nihil aperiam dignissimos doloribus, adipisci vitae ipsam eveniet tenetur consectetur
            rem! Id, ullam quod!</p>
    </div>
    <div class="col-md-4">
        <?= $ouvert?>
        <h3>Horaire de travail</h3>
        <form action="/contact.php" method="GET">
            <div class="form-group">
                <input type="number" class="form-control" name="heure" id="">
            </div>
            <select class="custom-select">
                <option selected>Open this select menu</option>
                <?php foreach(JOURS as $jour) :?>
                    <option value="<?=$jour?>"><?=$jour?></option> 
                <?php endforeach;?>
            </select>
                <button type="submit" class="btn btn-primary btn-sm">Envoyer</button>
        </form>
        <ul>
            <?php foreach(JOURS as $k => $jour) : ?>
                <li <?php if((int)date('N') -1 === $k ):?>
                    <?= 'style="color:green"'?>>
                    <?php $key = $k;?>
                <?php endif;?>
                    <strong><?= $jour?> : </strong>
                    <?= crenau_html(CRENAUX[$k])?>       
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
 <?php require 'footer.php'; ?>