<?php
ini_set("display_errors",1);
require 'model.php';
  $fname = isset($_REQUEST['firstname'])? $_REQUEST['firstname'] : "" ;
  $lname = isset($_REQUEST['lastname'])? $_REQUEST['lastname']: "";
  $titre = isset($_REQUEST['title'])? $_REQUEST['title']: "";
  $article = isset($_REQUEST['article'])? $_REQUEST['article']: "";
  $categorie = isset($_REQUEST['categorie'])? $_REQUEST['categorie']: "";

  function checkInput($fnm, $lnm, $t, $art, $cat) {
    if(!empty($fnm) && !empty($lnm) && !empty($t) && !empty($art) && !empty($cat)){
      return true;
    }
    return false;
  }
  if(checkInput($fname, $lname, $titre, $article, $categorie)){
    echo $categorie;
    addArticle($fname, $lname, $titre, $article, $categorie);
    header("Location: http://alij.student.codeur.online/mini_blog/");
    die();
  }
  else{
    echo 'error inputs';
  }
?>
