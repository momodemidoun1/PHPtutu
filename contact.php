<?php
$title = 'Nous contacter';
require 'elements/header.php';
require_once 'data/config.php';
$heure = (int)($_GET['heure'] ?? date('G'));
$jour = (int)($_GET['jour'] ?? date('N') -1);
$crenaux = CRENAUX[$jour];
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
        <form action="" method="GET">
            <div class="form-group">
                <input type="number" class="form-control" name="heure" value="<?=$heure ?>">
            </div>
            <div class="form-group">
                <?= select('jour', $jour, JOURS)?>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" >Voir si le magasin est ouvert</button>
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
 <?php require 'elements/footer.php'; ?>