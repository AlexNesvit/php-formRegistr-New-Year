<?php
include('../include/functions.php');
require_once '../include/pdoConnect.php';
include('../actions/admin/userCrud/adminUserEdit.php');
logged_only();
$PDO = PdoConnect::getInstance();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Boutiqie | Administration</title>
    <meta content="ONG de solidarité internationale qui vise à alléger les souffrances des populations les plus pauvres du monde." name="description">
    <meta content="aide humanitaire, ong, human heart" name="keywords">

    <!-- Favicons -->
    <link href="../../assets/img/iconfav.jpg" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../assets/css/style.css" rel="stylesheet">
</head>
<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <img src="../../assets/img/iconfav.jpg" alt="icon Human-Heart" class="logoD">
        <a href="../../dashboard.php" class="logo d-flex align-items-center">

            <span class="d-none d-lg-block">Boutique</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->





</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="../../dashboard.php">
                <i class="bi bi-house-heart"></i>
                <span>Accueil</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="../dashboardUser.php">
                <i class="bi bi-person"></i>
                <span>Utilisateurs</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-collection-fill"></i>
                <span>Dons</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="../dashboardCategory.php">
                <i class="bi bi-card-list"></i>
                <span>Catégories</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-cash"></i>
                <span>Donations</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="../../logout.php">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Déconnexion</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Gestion Utilisateurs</h1>
    </div><!-- End Page Title -->
    <?php if (isset($_SESSION['flash'])) : ?>
        <?php foreach ($_SESSION['flash'] as $type => $message) : ?>
            <div class="ms-1 me-3 alert alert-<?= $type; ?>">
                <?= $message; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
    <?php if (!empty($errors)) : ?>
        <div class="ms-1 me-3 alert alert-danger">
            <p>Vous n'avez pas rempli le formulaire correctement</p>
            <?php foreach ($errors as $error) : ?>
                <ul>
                    <li><?= $error; ?></li>
                </ul>
            <?php endforeach; ?>

        </div>
    <?php endif; ?>
    <section class="section">
        <div class="row">
            <div class="  profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form method="POST">

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-lg-3 col-form-label">Nom</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="name" type="text" class="form-control" id="name" value="<?=  $user->name; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="username" class="col-md-4 col-lg-3 col-form-label">Prénom</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="username" type="text" class="form-control" id="username" value="<?=  $user->username; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="phone" class="col-md-4 col-lg-3 col-form-label">Téléphone</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="phone" type="text" class="form-control" id="phone" value="<?=
                            $user->phone; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="email" type="text" class="form-control" id="email" value="<?=
                            $user->email; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="address" type="text" class="form-control" id="Address" value="<?=
                            $user->address; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="zipcode" class="col-md-4 col-lg-3 col-form-label">Code Postal</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="zipcode" type="text" class="form-control" id="zipcode" value="<?=
                            $user->zipcode; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="city" class="col-md-4 col-lg-3 col-form-label">Ville</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="city" type="text" class="form-control" id="city" value="<?=
                            $user->city; ?>">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="validateProfil">Sauvegarder les
                            changements</button>
                        <a href="../../actions/admin/userCrud/adminUserDelete.php?id=<?=$user->id ?>" class="btn btn-danger">Supprimer votre
                            compte</a>
                    </div>
                </form><!-- End Profile Edit Form -->

                    <!-- Change Password Form -->
                    <form  method="POST" class="mt-3">

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-lg-3 col-form-label">Changer le mot de passe
                            </label>
                            <div class="col-md-8 col-lg-9">
                                <input name="password" type="password" class="form-control" id="password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password_confirm" class="col-md-4 col-lg-3 col-form-label">Confirmer le
                                mot de passe</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="password_confirm" type="password" class="form-control" id="password_confirm">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="validatePass" >Changer le  mot de
                                passe</button>
                        </div>
                    </form><!-- End Change Password Form -->

                </div>

            </div>

    </section>

</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->

<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Template Main JS File -->
<script src="../../assets/js/main.js"></script>

</body>

</html>