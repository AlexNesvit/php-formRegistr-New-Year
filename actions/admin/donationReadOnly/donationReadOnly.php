<?php
session_start();
require_once '../include/database.php';
// liste tous les utilisateurs du site
$req = $pdo->prepare('SELECT don.Title, donation.Date, users.name, users.email, donation.value FROM don  JOIN donation ON donation.don_iddon = don.iddon JOIN users ON `donation`.`user_iduser` = users.id');
$req->execute();
$donations = $req->fetchAll();