<?php
session_start();
require_once '../include/pdoConnect.php';

$PDO = PdoConnect::getInstance();
// liste tous les utilisateurs du site
$req = $PDO->prepare('SELECT * FROM users');
$req->execute();
$allUsers = $req->fetchAll(PDO::FETCH_OBJ);
