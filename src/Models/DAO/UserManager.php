<?php

namespace App\Models\DAO;

use App\Models\DTO\User;
use \DateTime;
use \PDO;


/**
 * Classe DAO servant à gérer et faire l'interface entre les objets des utilisateurs du site et la base de données
 */
class UserManager{

    /**
     * Stockage dans cet attribut d'une instance active de connexion PDO à la base de donnée
     */
    private $db;

    /**
     * Getters/setters
     */
    public function getDb(){
        return $this->db;
    }

    public function setDb(PDO $db){
        $this->db = $db;
    }

    /**
     * Constructeur servant à hydrater $db avec une instance de PDO récupérée via la fonction connectDb()
     */
    public function __construct(){
        $this->setDb( connectDb() );
    }

    /**
     * Méthode servant à sauvegarder un objet d'utilisateur en base de donnée
     */
    public function save(User $userToSave){

        $insertUser = $this->db->prepare('INSERT INTO user(email, password, register_date, firstname, lastname) VALUES(?,?,?,?,?)');

        $status = $insertUser->execute([
            $userToSave->getEmail(),
            $userToSave->getPassword(),

            // On stocke la date en format string dans la BDD, pas l'objet lui même sinon erreur
            $userToSave->getRegisterDate()->format('Y-m-d H:i:s'),
            $userToSave->getFirstname(),
            $userToSave->getLastname(),
        ]);

        $userToSave->setId( $this->db->lastInsertId() );

        return $status;

    }

    /**
     * Méthode permettant de récupérer un utilisateur par un de ses champs et une valeur de champ
     * (Par exemple récupérer un utilisateur par son email)
     */
    public function findOneBy(string $field, $value){

        $getUser = $this->db->prepare('SELECT * FROM user WHERE ' . $field . ' = ?');
        $getUser->execute([
            $value
        ]);

        $userInArray = $getUser->fetch(PDO::FETCH_ASSOC);

        if(!empty($userInArray)){

            $userInObject = $this->buildDomainObject($userInArray);

        }

        return $userInObject ?? null;

    }

    private function buildDomainObject(array $userInArray){

        $userInObject = new User();

        $userInObject
            ->setId($userInArray['id'])
            ->setEmail( $userInArray['email'] )
            ->setPassword( $userInArray['password'] )
            ->setRegisterDate( new DateTime( $userInArray['register_date'] ) )
            ->setFirstname( $userInArray['firstname'] )
            ->setLastname( $userInArray['lastname'] )
        ;

        return $userInObject;

    }

}