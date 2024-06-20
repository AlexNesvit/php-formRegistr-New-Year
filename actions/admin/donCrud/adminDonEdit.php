<?php require_once '../../include/functions.php';
session_start();
require_once '../../include/database.php';
// liste tous les utilisateurs du site
$req = $pdo->prepare('SELECT * FROM categorie');
$req->execute();
$categories = $req->fetchAll();

$don_id = $_GET['id'];
$reqDon = $pdo->prepare('SELECT * FROM don WHERE iddon = ?');
$reqDon->execute([$don_id]);
$don = $reqDon->fetch();

if (isset($_POST['validate'])) {

    $errors = array();
    require_once '../../include/database.php'; //appel du fichier relationnel de la base de données

    //nom d'utilisateur conditions et implémentation dans la base de données
    if (empty($_POST['title'])) {
        $errors['title'] = "Ce titre ne peut être vide";
    } else {
        $req = $pdo->prepare('SELECT iddon FROM don WHERE `Title`=?');
        $req->execute([$_POST['title']]);
        $don = $req->fetch();
    }

    //envoi des données dans la base de données. cryptage du mot de passe
    if (empty($errors)) {
        require_once '../../include/database.php';  //appel du fichier relationnel de la base de donnée
        $req = $pdo->prepare("UPDATE don  SET `Title`=?, `user_iduser` = ?, `categorie_idcategorie` = ? WHERE `iddon`= ?");
        $title = htmlspecialchars($_POST['title']);
        $category = htmlspecialchars($_POST['category']);
        $user_id = $_SESSION['auth']->id;
        $req->execute([$title, $user_id, $category, $don_id]);
        $_SESSION['flash']['success'] = 'Votre don a bien été modifié';
        header('Location: ../dashboardDon.php');
        exit();
    }
}
