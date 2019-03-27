<?php
require 'functions/auth.php';
if(is_connected()){
    header('Location: dashboard.php');
}
$errors = [];
if(!empty($_POST)){
    if($_POST['email'] === 'momo@gmail.com' && $_POST['password'] === 'admin'){
        session_start();
        $_SESSION['connected'] = 'connected';
        header('Location: dashboard.php');
        exit();
    }else{
        $errors[] = 'Email ou mot de passe invalide';
    } 
}

require 'elements/header.php';
?>
<h2>Connexion</h2>
<?php if(!empty($errors)): ?>
    <?php foreach($errors as  $k => $error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endforeach; ?>
<?php endif; ?>
<form method="POST" action="">
    <div class="form-group">
        <input type="email" name="email" class="form-control mb-2" placeholder="Enter your email">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button> 
</form>

<?php require 'elements/footer.php' ?>