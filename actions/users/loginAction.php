<?php
require_once 'include/pdoConnect.php';

$PDO = PdoConnect::getInstance();

    if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
        
        $req = $PDO->prepare('SELECT * FROM users WHERE (username = :username OR email = :username)');
        $req->execute(['username' => $_POST['username']]);
        $user = $req->fetchObject();
        
        $userPassPost = $_POST['password'];
        $userPass = $user->password;
        die();
        if ($user) {
            if (password_verify($userPassPost , $userPass)) {
                session_start();
                $_SESSION['auth'] = $user;

                if($user->role == 0){
                    $_SESSION['flash']['success'] = "Vous êtes bien connecté";
                    header('Location: vueProfil/profile.php');
                }else {
                    $_SESSION['flash']['success'] = "Bienvenu Admin";
                    header('Location: dashboard.php');
                }
                exit();
            } else {
                $_SESSION['flash']['danger'] = "Identifiant ou mot de passe incorrect";
            }
        }
    }

