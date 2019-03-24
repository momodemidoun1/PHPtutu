<?php
$user   = [
    'prenom' => 'Jhon',
    'nom' => 'Doe',
    'age' => 18
];
setcookie('user', serialize($user));
require 'elements/header.php';  
?>
<div class="container">
    <h3>Profile</h3>
    <a href="profile.php?action=deconnecter">Se deconnecter</a>
    <?php if($nom) : ?>
        <div class="alert alert-success">
            <?= 'Bonjour ' . htmlentities($nom) ?>
        </div>4
    <?php else:?>
        <form action="" method="POST" class="form-group">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" name="name" class="form-control" placeholder="Enter your name">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                <button type="submit" class="btn btn-success">Envoyer</button>
            </div>
            </div>
        </form>
    </div> <!-- //container --> 
    <?php endif;?>
<?php
require 'elements/footer.php';
?>