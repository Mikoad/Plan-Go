<?php

class reservations
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $image;
    public $id_reservationsSubTypes;
    public $id_cities;
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=plango;charset=utf8', 'u7dat_admin', 'plan&go2587');
        } catch (PDOException $e) {
        }
    }

    //reservations add method
    public function add()
    {
        $query = 'INSERT INTO `u7dat_reservations` (`name`, `price`, `description`, `image`, `id_reservationsSubTypes`, `id_cities`)
        VALUES (:name, :price, :description, :image, :id_reservationsSubTypes, :id_cities);';

        $request = $this->db->prepare($query);
        $request->bindValue(':name', $this->name, PDO::PARAM_STR);
        $request->bindValue(':price', $this->price, PDO::PARAM_STR);
        $request->bindValue(':description', $this->description, PDO::PARAM_STR);
        $request->bindValue(':image', $this->image, PDO::PARAM_STR);
        $request->bindValue(':id_reservationsSubTypes', $this->id_reservationsSubTypes, PDO::PARAM_INT);
        $request->bindValue(':id_cities', $this->id_cities, PDO::PARAM_INT);

        return $request->execute();
    }
    //get reservations list method
    public function getList()
    {
        $query = 'SELECT `u7dat_reservations`.`id`, `u7dat_reservations`.`name`, `price`, SUBSTR(`description`, 1, 50) AS `description`,`image` 
        FROM `u7dat_reservations` 
        INNER JOIN `u7dat_reservationsSubTypes` AS `rst`
        ON `id_reservationsSubTypes` = `rst`.`id`
        INNER JOIN `u7dat_cities` AS `city` 
        ON `id_cities` = `city`.`id`;';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function search($search)
    {
        $query = 'SELECT `r`.`id`, `r`.`name`, `price`, SUBSTR(`description`, 1, 40) AS `description`, `image`, `id_reservationsSubTypes`, `id_cities` 
        FROM `u7dat_reservations` AS `r` 
        INNER JOIN `u7dat_reservationsSubTypes` AS `rst` ON `id_reservationsSubTypes` = `rst`.`id` 
        INNER JOIN `u7dat_cities` AS `city` ON `id_cities` = `city`.`id` 
        WHERE `r`.`name` LIKE :search OR `r`.`description` LIKE :search;';
        $request = $this->db->prepare($query);
        $request->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
    //get one reservation by id
    //changer le * par ce que je veux récuperer et restreindre la description à 50 caractères maximum
    public function getOneById()
    {
        $query = 'SELECT * FROM `u7dat_reservations` WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(":id", $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_OBJ);
    }
    //get reservations list by id_reservationsSubTypes
    public function getListBySubType($order = 'ASC')
    {
        $query = 'SELECT `id`, `name`, `price`, SUBSTR(`description`, 1, 50) AS `description`, `image`, `id_reservationsSubTypes`, `id_cities`
        FROM `u7dat_reservations`
        WHERE `id_reservationsSubTypes` = :id_reservationsSubTypes';
        if ($order == 'ASC') {
            $query .= ' ORDER BY price ASC';
        } else if ($order == 'DESC') {
            $query .= ' ORDER BY price DESC';
        }
        $request = $this->db->prepare($query);
        $request->bindValue("id_reservationsSubTypes", $this->id_reservationsSubTypes, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }


    //update reservation form
    public function update()
    {
        $query = 'UPDATE `u7dat_reservations` SET `name`= :name,`price`= :price,`description`= :description,`id_reservationsSubTypes`= :id_reservationsSubTypes,`id_cities`= :id_cities WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':name', $this->name, PDO::PARAM_STR);
        $request->bindValue(':price', $this->price, PDO::PARAM_STR);
        $request->bindValue(':description', $this->description, PDO::PARAM_STR);

        $request->bindValue(':id_reservationsSubTypes', $this->id_reservationsSubTypes, PDO::PARAM_INT);
        $request->bindValue(':id_cities', $this->id_cities, PDO::PARAM_INT);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }
    // faire une méthode pour modifier l'image 
    //update image reservation method 
    public function updateImage()
    {
        $query = '';
    }
    public function delete()
    {
        $query = 'DELETE FROM `u7dat_reservations` WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }
    public function getListByType()
    {
        $query = 'SELECT * FROM `u7dat_reservations` AS r
        INNER JOIN `u7dat_reservationssubtypes` AS rst
        ON r.id_reservationsSubTypes = rst.id
        WHERE rst.id_reservationsTypes = :id_reservationsTypes';
    }
}
