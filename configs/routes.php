<?php

//Inclusion des contrôleurs du site
use App\Controllers\MainController;

// Instanciation de la classe des contrôleurs
$mainController = new MainController();

// Liste des routes avec leurs contrôleurs
// Chaque URL corresopnd à une page du site
// Si aucun contrôleur ne correspond à la route demandée, c'est le contrôleur de la page 404 qui sera chargé
switch (ROUTE){
    case '/';
        $mainController->home();
        break;

    default:
        $mainController->page404();
        break;
}