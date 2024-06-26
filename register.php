<?php
require 'actions/users/registerAction.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Boutiqie | S'inscrire</title>
    <meta content="ONG de solidarité internationale qui vise à alléger les souffrances des populations les plus pauvres du monde." name="description">
    <meta content="aide humanitaire, ong, human heart" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/iconfav.jpg" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <!-- <link href="assets/css/style.css" rel="stylesheet"> -->
    <link href="assets/css/dev-style.css" rel="stylesheet">
</head>
<body>
<?php if (isset($_SESSION['flash'])) : ?>
    <?php foreach ($_SESSION['flash'] as $type => $message) : ?>
        <div class="ms-1 me-3 alert alert-<?= $type; ?>">
            <?= $message; ?>
        </div>
    <?php endforeach; ?>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>
  <main>
  <?php include ('include/menu.php')?>
                      <div class=" text-center">
                          <a class="fud" href="login.php">
                              Se connecter
                          </a>
                      </div>
                  </div>
              </div>
          </nav>
      </div>
      <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4
      bg-light bg-gradient
">
        <div class="container">
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
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/iconfav.jpg" alt="" class="logoD">
                  <span class="d-none d-lg-block">Boutique inscription</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Créer un compte</h5>
                    <p class="text-center small">Entrez vos informations personnelles pour créer un compte</p>
                  </div>

                  <form class="row g-3" method="POST">

                    <div class="col-12">
                      <label for="yourName" class="form-label">Votre Nom</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                    </div>
                    <div class="col-12">
                      <label for="yourLastName" class="form-label">Votre Prénom</label>
                      <input type="text" name="username" class="form-control" id="yourLastName" required>
                    </div>
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Votre Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                    </div>
                    <div class="col-12">
                      <label for="yourPhone" class="form-label">Votre téléphone</label>
                      <input type="text" name="phone" class="form-control" id="yourPhone" required>
                    </div>
                      <div class="col-12">
                          <label for="address" class="form-label">Votre adresse</label>
                          <input type="text" name="address" class="form-control" id="address" required>
                      </div>
                      <div class="col-12">
                          <label for="zipcode" class="form-label">Votre code postal</label>
                          <input type="text" name="zipcode" class="form-control" id="zipcode" required>
                      </div>
                      <div class="col-12">
                          <label for="city" class="form-label">Votre ville</label>
                          <input type="text" name="city" class="form-control" id="city" required>
                      </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Votre mot de passe</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                    </div>
                    <div class="col-12">
                      <label for="password_confirm" class="form-label">Confirmez votre mot de passe</label>
                      <input type="password" name="password_confirm" class="form-control" id="password_confirm" required>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="validate">Créer compte</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Vous avez déjà un compte? <a href="login.php">Connexion</a></p>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
      <?php include ('include/footer.php')?>
    </div>
  </main><!-- End #main -->
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>