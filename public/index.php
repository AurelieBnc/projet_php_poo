<?php

//Inclusion des dépendances installées avec composer
require __DIR__.'/../vendor/autoload.php';

// Inclusion du fichier contenant les fonctions et configurations générales du site
require __DIR__.'/../configs/functions.php';

// Inclusion du fichier contenant les paramètres personnalisables du site (accès à la BDD par exemple)
require __DIR__.'/../configs/params.php';

try{

    //Inclusion du fichier routes.php qui contient toutes les urls du site (routes) et qui chargera le bon contrôleur de page pour chaque URL
    require __DIR__. '/../configs/routes.php';

} catch(Throwable $e){ ?>

    <div style="background-color: #FFa2a2;padding: 15px;">
        <h1><b>Erreur PHP !</b></h1>
        <hr>
        <p><b>Fichier</b> : <?= $e->getFile(); ?></p>
        <p><b>Ligne</b> : <?= $e->getLine(); ?></p>
        <p><b>Message</b> : <span style="font-size: 20px;"><?= $e->getMessage(); ?></span></p>
        <hr>
        <?php dump($e->getTrace()); ?>
    </div>

    <?php
}