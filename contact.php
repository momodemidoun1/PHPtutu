<?php
$title = 'Nous contacter';
require 'header.php';
require_once 'config.php'; 
$crenaux = jours_html(CRENAUX, JOURS);
?>
<div class="row">
    <div class="col-md-8">
        <h2> Nous contacter </h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto repellendus vero ea saepe 
            earum exercitationem in nihil aperiam dignissimos doloribus, adipisci vitae ipsam eveniet tenetur consectetur
            rem! Id, ullam quod!</p>
    </div>
    <div class="col-md-4">
        <h3>Horaire de travail</h3>
        <?= $crenaux?>       
    </div>
</div>
 <?php require 'footer.php'; ?>