<?php

class users
{
    public $id;
    public $username;
    public $email;
    public $password;
    public $birthdate;
    public $registerDate;
    public $id_usersRoles;
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=plango;charset=utf8', 'u7dat_admin', 'plan&go2587');
        } catch (PDOException $e) {
            //Renvoyer vers une page d'erreur
        }
    }

    public function add()
    {
        $query = 'INSERT INTO `u7dat_users` (`username`, `email`,`password`, `birthdate`, `registerDate`, `id_usersRoles`) 
        VALUES (:username, :email, :password, :birthdate, NOW(), 1)';

        $request = $this->db->prepare($query);
        $request->bindValue(':username', $this->username, PDO::PARAM_STR);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        $request->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        return $request->execute();
    }

    public function checkAvaibility()
    {
        $query = 'SELECT COUNT(*) FROM `u7dat_users` WHERE email = :email';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }

    public function getHash()
    {
        $query = 'SELECT `password` FROM `u7dat_users` WHERE `email` = :email;';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }

    public function getInfos()
    {
        $query = 'SELECT `id`, `username`, `id_usersRoles` FROM `u7dat_users` WHERE `email` = :email';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_ASSOC);
    }
}
