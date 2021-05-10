<?php

// le namespace doit être l'emplacement précis du fichier en remplacant src par App
// l'emplacement actuel de ce fichier dans Windows est : src/Controllers/MainController.php
// le namespace doit être : App\Controllers;
// le nom de ce fichier doit être le même que le nom de la classe : MainController
// 'App' correspond à 'src' du fichier 'composer.json'
namespace App\Controllers;

class MainController{
    /**
     * Controleur de la page d'acceuil du site
     */
    public function home(){
        echo '<h1>Acceuil</h1>';
    }
    /**
     * Controleur de la page d'erreur 404 du site
     */
    public function page404(){

        //Modifie le HTTP code pour qu'il soit bien 404 et non 200
        header('HTTP/1.0 404 Not Found');

        echo '<h1>Erreur page 404</h1>';
    }
}


