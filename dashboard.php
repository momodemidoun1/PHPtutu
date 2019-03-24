<?php 
require 'elements/header.php'; 
require_once 'functions/counter.php';
$file_name = date('Y-m-d');
$year = (int)date('Y');
$year_selected = empty($_GET['year']) ? $year : (int)$_GET['year'];
$total = vue_number(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'counter ' . $file_name . '.php');
?>
<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <strong style="font-size:2em"><?= $total ?></strong> <br>
        Visite total
      </div>
    </div>
  </div>
    <div class="col-md-8">
      <div class="list-group">
        <?php for ($i = $year; $i >= $year - 5; $i--): ?>
          <a href="dashboard.php?year=<?= $i ?>" class="list-group-item <?= $i === $year_selected? $active = 'active' : ''?>"><?= $i ?></a>
        <?php endfor; ?>
</div>
  </div>
</div>


<?php require 'elements/footer.php' ?>
