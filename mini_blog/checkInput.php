<?php
$fname = $_REQUEST['firstname'];
$lname = $_REQUEST['lastname'];
$titre = $_REQUEST['title'];
$article = $_REQUEST['article'];
$category = $_REQUEST['category'];

function checkInput($fname, $lname, $titre, $article, $category) {
  if(empty($fname) && empty($lname) && empty($titre) && empty($article) && empty($category)) {
     echo'error ali';
   }
     return false;
   }
   checkInput($fname, $lname, $titre, $article, $category);
?>
