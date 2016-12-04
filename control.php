<?php
ini_set("display_errors",1);
require 'mustache.php/src/Mustache/Autoloader.php';
require 'model.php';
handleView(); // génére la page index
function handleView(){
  if(isset($_REQUEST['cat'])&&isset($_REQUEST['auteur'])){
    $partHTML['data'] = getArticlesFilter($_REQUEST['auteur'],$_REQUEST['cat']);
  }
  elseif (isset($_REQUEST['auteur'])) {
    $partHTML['data'] = getArticlesFilter($_REQUEST['auteur'],array('categorie' => -1));
  }
  elseif (isset($_REQUEST['categorie'])) {
    $partHTML['data'] = getArticlesFilter(array('auteur' => -1),$_REQUEST['cat']);
  }
  else{
    $partHTML['data'] = getArticles();
  }
  $partHTML['auteurs'] = getAuteurs();
  $partHTML['categorie'] = getCategorie();
  Mustache_Autoloader::register();
  $m = new Mustache_Engine;
  echo $m->render(file_get_contents('viewIndex.html'), $partHTML);
}

?>
