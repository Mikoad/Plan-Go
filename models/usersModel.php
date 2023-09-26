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
    //add user method
    public function add()
    {
        $query = 'INSERT INTO `u7dat_users` (`username`, `email`,`password`, `id_usersRoles`) 
        VALUES (:username, :email, :password, 1)';

        $request = $this->db->prepare($query);
        $request->bindValue(':username', $this->username, PDO::PARAM_STR);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $request->execute();
    }
    //check email avaibility
    public function checkAvaibility()
    {
        $query = 'SELECT COUNT(*) FROM `u7dat_users` WHERE email = :email';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }
    //get password hash
    public function getHash()
    {
        $query = 'SELECT `password` FROM `u7dat_users` WHERE `email` = :email;';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }

    //get user infos
    // voir pour avoir l'email et le mdp dans les infos
    public function getInfos()
    {
        $query = 'SELECT `id`, `username`, `id_usersRoles` FROM `u7dat_users` WHERE `email` = :email';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_ASSOC);
    }
    //get user infos by id
    public function getOneById()
    {
        $query = 'SELECT `username`, `email`,`id_usersRoles` FROM `u7dat_users` INNER JOIN `u7dat_usersroles` ON `id_usersRoles` = `u7dat_usersroles`.`id` WHERE `u7dat_users`.`id` = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(":id", $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_OBJ);
    }
    //udpate user informations : username + email
    public function updateInfos()
    {
        $query = 'UPDATE `u7dat_users` SET `username` = :username, `email` = :email WHERE `id` = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(":username", $this->username, PDO::PARAM_STR);
        $request->bindValue(":email", $this->email, PDO::PARAM_STR);
        $request->bindValue(":id", $this->id, PDO::PARAM_INT);
        return $request->execute();
    }
    //update user password
    public function updatePassword()
    {
        $query = 'UPDATE `u7dat_users` SET `password` = :password WHERE `id` = :id ';
        $request = $this->db->prepare($query);
        $request->bindValue(":password", $this->password, PDO::PARAM_STR);
        $request->bindValue(":id", $this->id, PDO::PARAM_INT);
        return $request->execute();
    }
    //delete user account
    public function deleteAccount()
    {
        $query = '';
    }
}
