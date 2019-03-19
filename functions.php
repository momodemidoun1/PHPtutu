<?php
require 'config.php';
function nav_item(string $link, string $title, string $linkclass = '') {
  $classe ='nav-item';
  if(($_SERVER['SCRIPT_NAME']) === $link){
    $classe .= ' active';
  }
 return <<<HTML
 <li class="$classe">
  <a class="$linkclass" href="$link"> $title <span class="sr-only">(current)</span></a>
</li>
HTML;
}

function nav_menu(string $linkclass = ''){
  return 
        nav_item('/index.php', 'Acceuil', $linkclass) . 
        nav_item('/contact.php', 'Nous contacter', $linkclass); 
}

function Deviner($chiffre, $nombre){
  if ($chiffre > $nombre){
    return '<div class="alert alert-warning" role="alert">
    Le chiffre que vous avez entrer est plus grand que a deviner!
  </div>';
  }elseif ($chiffre < $nombre){
    return '<div class="alert alert-warning" role="alert">
    Le chiffre que vous avez entrer est plus petit que a deviner! 
  </div>';
  }
  return '<br> <div class="alert alert-success" role="alert">
  Bravo vous avez deviner le chiffre!
  ' .$nombre . '</div>';
}

function checkbox(string $name, string $value, int $price, array $data) :string
{
  $attributes = '';
  if(isset($data[$name]) && in_array($value, $data[$name])){
    $attributes .= 'checked';
  }
  return <<<HTML
          <input type="checkbox" name="{$name}[]" value="$value" $attributes> 
          $value - $price €
HTML;
}

function radio(string $name, string $value, int $price, array $data) :string
{
  $attributes = '';
  if(isset($data[$name]) && $value === $data[$name]){ //we have a radio type => impossible to check two radio case <> checkbox thats why we didnt do (in_array) function => we only have 1 value returned .
    $attributes .= 'checked';
  }
  return <<<HTML
          <input type="radio" name="$name" id="" value="$value" $attributes> <!--we removed the {$name} cause we dont have an array returned we have 1 single value --> 
          $value - $price €
HTML;
}

function crenau_html(array $crenaux) :string
{
  /* My solution
  $horaire = [];
  foreach($crenaux as $crenau){
     $horaire [] =  implode(' à ' ,$crenau);
  }
  */
  //grafikart solution
  if(empty($crenaux)){
    return 'Fermé';
  }
  $phrase = [];
  foreach($crenaux as $crenau){
    $phrase [] =  'de <strong> ' . $crenau[0] . '</strong> à ' . '<strong>' . $crenau[1] .'h </strong>'; 
  }
  return 'Ouvert de '.implode(' et ', $phrase);  
  //return 'Le magasin est ouvert de ' . $horaire[0] .' et de ' . $horaire[1] . ' .'; //My return
}

function jours_html(array $crenaux, array $jours) :string{
  $ouv = '';
  foreach($jours as $jour){
    foreach($crenaux as $crenau){
      $ouv .= crenau_html($crenau, $jour) ."\n";

  }
}
  return $ouv;
}

function in_crenaux(int $heure, array $crenaux) :string{
  foreach($crenaux as $crenau){
    $debut = $crenau[0];
    $fin = $crenau[1];
    if($heure >= $debut && $heure < $fin){
      return <<<HTML
                <div class ="alert alert-success">Le magasin est ouvert! </div>
HTML;
    }

  }
    return <<<HTML
              <div class ="alert alert-danger">Le magasin est fermé! </div>
HTML;


}