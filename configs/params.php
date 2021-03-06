<?php

//Récupération de la route actuelle dans l'URL
define('ROUTE', request_path());

// Emplacement du dossier qui contient les vues
define('VIEWS_DIR', __DIR__ .'/../views/');

//URl du dossier public ( qui contient les fichiers CSS/JS/Images/etc...) qui servira à construire les iens dans la partie front-end (inclusion des images, fichiers CSS, etc..)
define('PUBLIC_PATH', mb_substr($_SERVER['SCRIPT_NAME'], 0, -(mb_strlen(basename(__FILE__)))) . '/');


//Paramètres de connexion à la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'wikifruit_mvc_poo');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
