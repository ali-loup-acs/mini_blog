<?php

function getArticles(){
  try {
    $dbh = connect();
    $sth = $dbh->prepare('SELECT * FROM M1_ARTICLE INNER JOIN M1_AUTEUR
    ON M1_AUTEUR.id = M1_ARTICLE.auteur_id INNER JOIN M1_CATEGORIE ON M1_CATEGORIE.id = M1_ARTICLE.categorie_id;');
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    $dbh = null;
  } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
  return $result;
}

function getArticlesFilter($authors,$categories){
    try {
      $dbh = connect();
      $sql = "SELECT * FROM M1_ARTICLE INNER JOIN M1_AUTEUR
      ON M1_AUTEUR.id = M1_ARTICLE.auteur_id INNER JOIN M1_CATEGORIE
      ON M1_CATEGORIE.id = M1_ARTICLE.categorie_id";
      $i = 0; // counter
      foreach ($categories as $value) {
        if ($value<0) {
          $sql .= ' WHERE (1=1';
        }
        else {
          $sql .= $i? " OR categorie_id = ".$value : " WHERE ( categorie_id = ".$value;
        }
        $i++;
      }
      $sql .= ')';
      $i = 0; // counter
      foreach ($authors as $value) {
        if ($value<0) {
          $sql = ' AND (1=1';
        }
        else {
          $sql .= $i? " OR auteur_id = ".$value : " AND ( auteur_id = ".$value;
        }
        $i++;
      }
      $sql .= ');';
      $sth = $dbh->prepare($sql);
      $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      $sth = null;
      $dbh = null;
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
    return $result;
}

function getCategorie(){
  try {
    $dbh = connect();
    $sth = $dbh->prepare('SELECT * FROM M1_CATEGORIE;');
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    $dbh = null;
  } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
  return $result;
}

function getAuteurs(){
  try {
    $dbh = connect();
    $sth = $dbh->prepare('SELECT * FROM M1_AUTEUR;');
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = null;
    $dbh = null;
  } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
  return $result;
}
function addArticle($pnm, $nm, $t, $art, $cat){
  $id_auteur = NULL; // id auteur
  $id_categorie = NULL; // id categorie
  try{
    $dbh = connect();
    $sth = $dbh->prepare("SELECT * FROM `M1_AUTEUR` WHERE nom = '$nm' AND prenom = '$pnm';");
    $sth->execute();
    $id_auteur = $sth->fetch(PDO::FETCH_ASSOC)['id'];// get the id of the author
    if(!$sth->rowCount()){
      $sth = $dbh->prepare("INSERT INTO M1_AUTEUR(nom, prenom) VALUES ('$nm','$pnm');");
      $sth->execute();
      $id_auteur = $dbh->lastInsertId();
    }
    $sth = null;
    $sth = $dbh->prepare("SELECT * FROM `M1_CATEGORIE` WHERE categorie = '$cat';");
    $sth->execute();
    $id_categorie = $sth->fetch(PDO::FETCH_ASSOC)['id'];// get the id of the categorie
    if(!$sth->rowCount()){
      $sth = $dbh->prepare("INSERT INTO M1_CATEGORIE(categorie) VALUES ('$cat');");
      $sth->execute();
      $id_categorie = $dbh->lastInsertId();
    }
    $sth = null;
    $sth = $dbh->prepare("INSERT INTO M1_ARTICLE (auteur_id, titre, message, categorie_id, date_publication)
    VALUES ('$id_auteur', '$t', '$art', '$id_categorie', NOW());");
    $sth->execute();
    $sth = null;
    $dbh = null;
  } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
  }
  // return $result;
}
function connect(){
    require '.init.php';
    return new PDO('mysql:host='.$hostname.';dbname='.$dbname.';charset=utf8mb4', $username, $password);
}
