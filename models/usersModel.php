<?php
//création de l'objet users et déclaration de ses propriétés
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

    //méthode __construct() pour se connecter à la base de données. Elle se déclenche au moment de l'instanciation de l'objet (new users).
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
        //requête INSERT INTO pour insérer des données dans la base de données
        $query = 'INSERT INTO `u7dat_users` (`username`, `email`,`password`, `id_usersRoles`) 
        VALUES (:username, :email, :password, 1)';
        //préparation de la requête avec prepare() 
        $request = $this->db->prepare($query);
        //bindValue() pour associer les valeurs saisies par le user avec les marqueurs nominatifs
        //PDO::PARAM_STR pour préciser le type de valeur qu'on attend
        $request->bindValue(':username', $this->username, PDO::PARAM_STR);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        //execution de la requête avec execute()
        return $request->execute();
    }
    //check email avaibility 
    public function checkAvaibility()
    {
        //requête avec un SELECT pour récupérer des données de la bdd
        //fonction COUNT() qui retourne un chiffre pour compter le nombre total de lignes ou l'email est présent 
        $query = 'SELECT COUNT(*) FROM `u7dat_users` WHERE email = :email';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        //fetch pour récupérer une ligne de résultat et fetch_column pour récupérer une seule valeur d'une colonne
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
    public function getInfos()
    {
        //récupérer les infos (id, nom d'utilisateur, id du rôle) de l'utilisateur
        $query = 'SELECT `id`, `username`, `id_usersRoles` FROM `u7dat_users` WHERE `email` = :email';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        //sous forme de tableau associatif (clés-valeurs) avec fetch_assoc
        return $request->fetch(PDO::FETCH_ASSOC);
    }
    //get user infos by id
    public function getOneById()
    {
        //récupère des informations selon l'id
        $query = 'SELECT `username`, `email`,`id_usersRoles` FROM `u7dat_users` INNER JOIN `u7dat_usersroles` ON `id_usersRoles` = `u7dat_usersroles`.`id` WHERE `u7dat_users`.`id` = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(":id", $this->id, PDO::PARAM_INT);
        $request->execute();
        //récupérer un résultat sous forme d'objet
        return $request->fetch(PDO::FETCH_OBJ);
    }
    //udpate user informations : username + email
    public function updateInfos()
    {
        //requête UPDATE pour modifier la bdd et SET pour remplacer des données par d'autres
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
        //requête DELETE pour supprimer des données de la bdd en fonction de l'id de l'utilisateur
        $query = 'DELETE FROM `u7dat_users` WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }
}
