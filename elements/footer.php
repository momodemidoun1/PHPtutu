<?php 
require_once 'functions/counter.php';
$file_name = date('Y-m-d');
add_vue();
$vues = vue_number(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'counter ' . $file_name . '.php'); // we stored the value of the function to avoid calling the file_get_contents every time (can be so heavy on load).  
?>
</main><!-- /.container -->
<div class="container">
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h5>Navigation</h5>
        <ul class="list-unstyled">
            <li> <?= nav_menu() ?> </li>
        </ul>
    </div>
</div>
</div>
<div class="container">
<p>Le nombre de page vues est : <?= $vues ?></p>
<?php require 'newsletter.php'; ?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
