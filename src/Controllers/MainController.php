<?php

// le namespace doit être l'emplacement précis du fichier en remplacant src par App
// l'emplacement actuel de ce fichier dans Windows est : src/Controllers/MainController.php
// le namespace doit être : App\Controllers;
// le nom de ce fichier doit être le même que le nom de la classe : MainController
// 'App' correspond à 'src' du fichier 'composer.json'
namespace App\Controllers;

//Importation du DTO User

use App\Models\DTO\User;
use App\Models\DAO\UserManager;
use \DateTime;

class MainController{
    /**
     * Controleur de la page d'accueil du site
     */
    public function home(){
        // charge la vue home.php dans le dossier des vues "views"
        require VIEWS_DIR. 'home.php';
    }

    /**
     * Controleur de la page d'inscription du site
     */
    public function register(){

        //Appel des variables
        if(  isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm-password']) && isset($_POST['firstname']) && isset($_POST['lastname'])  ){

            //bloc des verifs
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $error['email'] = 'Email invalide!';
            }

            if(!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#\$%&\'()*+,\-.\/:;<=>?@[\\\\\]\^_`{\|}~]).{8,4096}$/', $_POST['password'])){
                $errors['password'] = 'Le mot de passe doit contenir au moins 8 caractères dont 1 minuscule, 1 majuscule, 1 chiffre et une lettre !';
            }

            if($_POST['password'] != $_POST['confirm-password']){
                $errors['confirm-password'] = 'La confirmation du mot de passe ne correspond pas au mot de passe';

            }

            if(mb_strlen($_POST['firstname']) < 1 || mb_strlen($_POST['firstname'] > 50)){
                $errors['firstname'] = 'Le prénom doit faire entre 1 et 50 caractères!';
            }

            if(mb_strlen($_POST['lastname']) < 1 || mb_strlen($_POST['lastname'] > 50)){
                $errors['lastname'] = 'Le nom doit faire entre 1 et 50 caractères!';
            }

            // Si pas d'erreur
            if(!isset($errors)){

                $userManager = new UserManager();

                $checkIfUserExists = $userManager->findOneBy('email', $_POST['email']);

                if(!empty($checkIfUserExists)){
                    $errors['email'] = 'Cette adresse email est déjà prise !';
                } else {

                    $user = new User();

                    $user
                        ->setEmail( $_POST['email'] )
                        ->setPassword( password_hash($_POST['password'], PASSWORD_BCRYPT) )
                        ->setRegisterDate( new DateTime() )
                        ->setFirstname( $_POST['firstname'] )
                        ->setLastname( $_POST['lastname'] )
                    ;


                    $status = $userManager->save($user);

                    if($status){
                        $success = 'Votre compte a bien été créé !';
                    } else {
                        $errors['server'] = 'Problème avec la base de données, veuillez ré-essayer plus tard !';
                    }
                }

            }
        }

        // charge la vue register.php dans le dossier des vues "views"
        require VIEWS_DIR. 'register.php';
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


