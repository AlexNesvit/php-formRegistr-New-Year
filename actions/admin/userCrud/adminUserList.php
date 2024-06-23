<?php
session_start();
require_once '../include/pdoConnect.php';
// liste tous les utilisateurs du site
$req = $pdo->prepare('SELECT * FROM users');
$req->execute();
$allUsers = $req->fetchAll();