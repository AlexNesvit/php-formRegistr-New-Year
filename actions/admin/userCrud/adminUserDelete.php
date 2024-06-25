<?php
session_start();
include ('../../../include/pdoConnect.php');
$PDO = PdoConnect::getInstance();
$user_id = $_GET['id'];

$PDO->prepare('DELETE FROM users WHERE id = ?')->execute([$user_id]);
$_SESSION['flash']['success'] = "Le compte a bien été supprimé";
header('Location: ../../../vueDashboard/dashboardUser.php');
exit();