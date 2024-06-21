<?php
session_start();
require_once '../include/pdoConnect.php';
// liste tous les utilisateurs du site
$req = $pdo->prepare('SELECT `don`.`iddon`, `don`.`Title`, `categorie`.`Title` AS categories FROM `don` JOIN `categorie` ON `categorie`.`idcategorie` = `don`.`categorie_idcategorie` ');
$req->execute();
$dons = $req->fetchAll();