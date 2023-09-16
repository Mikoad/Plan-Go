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
        $query = 'SELECT `u7dat_reservations`.`name`, `price`, SUBSTR(`description`, 1, 50) AS `description`,`image` 
        FROM `u7dat_reservations` 
        INNER JOIN `u7dat_reservationsSubTypes` AS `rst`
        ON `id_reservationsSubTypes` = `rst`.`id`
        INNER JOIN `u7dat_cities` AS `city` 
        ON `id_cities` = `city`.`id`;';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
}
