<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Erreur 404 - Wikifruit</title>
    <?php include VIEWS_DIR . 'partials/header.php'; ?>
</head>
<body>

<?php include VIEWS_DIR . 'partials/menu.php'; ?>


<div class="container">
    <div class="row my-5">
        <h1 class="text-center">Erreur 404 : page introuvable</h1>
    </div>
    <div class="row">
        <p class="alert alert-warning fw-bold text-center">Désolé cette page n'existe pas !</p>
        <p class="text-center"><img src="<?= PUBLIC_PATH . 'images/404.png' ?>" alt="404"></p>
    </div>
</div>


<?php include VIEWS_DIR . 'partials/footer.php'; ?>
</body>
</html>