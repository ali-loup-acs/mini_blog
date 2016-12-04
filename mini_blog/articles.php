<?php
include('.init.php');
try {
    $dbh = new PDO('mysql:host='.$hostname.';dbname='.$dbname, $username, $password);
    $sth = $dbh->prepare('SELECT * FROM M1_ARTICLE INNER JOIN M1_AUTEUR ON M1_AUTEUR.id = M1_ARTICLE.auteur_id INNER JOIN M1_CATEGORIE ON M1_CATEGORIE.id = M1_ARTICLE.categorie_id;');
    $sth->execute();
    $result = $sth->fetchAll();
    print_r($result);
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
