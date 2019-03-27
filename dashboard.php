<?php 
require 'functions/auth.php';
force_user_connected();
require 'elements/header.php'; 
require 'functions/counter.php';
$file_name = date('Y-m-d');
$year = (int)date('Y');
$month = date('m');
$selected_year = empty($_GET['year']) ? null : (int)$_GET['year'];
$selected_month = empty($_GET['month']) ? null : $_GET['month'];
if ($selected_year && $selected_month){
  $total = month_number_vue($selected_year, $selected_month);
  $detail = vue_number_detail_month($selected_year, $selected_month);
} else{
  $total = vue_number();
}
$months = [
  '01' => 'janvier',
  '02' => 'fevrier',
  '03' => 'mars',
  '04' => 'avril',
  '05' => 'mai',
  '06' => 'juin',
  '07' => 'juillet',
  '08' => 'aout',
  '09' => 'septembre',
  '10' => 'octobre',
  '11' => 'novembre',
  '12' => 'decembre'
];
?>
<div class="row">
    <div class="col-md-4">
      <div class="list-group">
        <?php for ($i = $year; $i >= $year - 4; $i--): ?>
          <a href="dashboard.php?year=<?= $i ?>" class="list-group-item <?= $i === $selected_year ? 'active' : ''?>"><?= $i ?></a>
          <?php if($i === $selected_year): ?>
            <?php foreach ($months as $key => $name): ?>
              <div class="list-group">
                <a href="dashboard.php?year=<?= $selected_year ?>&month=<?= $key ?>" class="list-group-item <?= $key === $selected_month ? 'active' : ''?>" ><?= $name ?></a> 
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        <?php endfor; ?>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card mb-4">
      <div class="card-body">
        <strong style="font-size:2em"><?= $total ?></strong> <br>
        Visite total
      </div>
    </div>
    <?php if (isset($detail)) : ?>
      <h2>detail de visites pour le mois</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Jour</th>
            <th>Nombre de visites</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($detail as $line) :?>
            <tr> 
              <td>
              <?= $line['day']?>
              </td>
              <td>
              <?= $line['visits']?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>       
</div>
<?php require 'elements/footer.php' ?>
