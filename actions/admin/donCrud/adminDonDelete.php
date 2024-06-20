<?php
session_start();
include ('../../../include/database.php');
$don_id = $_GET['id'];

$pdo->prepare('DELETE FROM don WHERE iddon = ?')->execute([$don_id]);
$_SESSION['flash']['danger'] = "La don a bien été supprimé";
header('Location: ../../../vueDashboard/dashboardDon.php');
exit();