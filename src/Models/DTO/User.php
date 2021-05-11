<?php

namespace App\Models\DTO;

use \DateTime;

/**
 * Classe DTO (attributs + getters/setters) matérialisant les utilisateurs du site
 */
class User{

    /**
     * Attributs
     */
    private $id;
    private $email;
    private $password;
    private $registerDate;
    private $firstname;
    private $lastname;

    /**
     * Getters
     */
    public function getId(){
        return $this->id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getRegisterDate(){
        return $this->registerDate;
    }

    public function getFirstname(){
        return $this->firstname;
    }

    public function getLastname(){
        return $this->lastname;
    }

    /**
     * Setters
     */
    public function setId(int $id){
        $this->id = $id;
        return $this;
    }

    public function setEmail(string $email){
        $this->email = $email;
        return $this;
    }

    public function setPassword(string $password){
        $this->password = $password;
        return $this;
    }

    public function setRegisterDate(DateTime $registerDate){
        $this->registerDate = $registerDate;
        return $this;
    }

    public function setFirstname(string $firstname){
        $this->firstname = $firstname;
        return $this;
    }

    public function setLastname(string $lastname){
        $this->lastname = $lastname;
        return $this;
    }

}