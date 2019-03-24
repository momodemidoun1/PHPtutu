<?php

$file_name =  __DIR__ . DIRECTORY_SEPARATOR . 'emails'. DIRECTORY_SEPARATOR .  date('Y-m-d');
$error = null;
if(!empty($_POST['email'])){
    $email = $_POST['email'];
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        file_put_contents($file_name, $email.PHP_EOL, FILE_APPEND);
    }else{
        $error = 'Email  invalide';
    }
}
?>
<?= $alert ?>
<h3>S'inscrire au newsletter</h3>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui commodi delectus rem ipsam laboriosam ratione, dignissimos libero illum repellendus laborum non eius asperiores. Amet minima sint sapiente. Error, voluptates repellat!
</p>
<?php if($error) :?>
 <div class="alert alert-danger">
    <?= $error ?>   
 </div>
<?php endif;?>
<form action="" method="POST" class="form-inline">
    <input type="text" name="email" class="form-control" placeholder="Entrez votre email" required value="<?= htmlentities($email)?>">
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

