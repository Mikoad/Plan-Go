<?php

class reservationsSubTypes
{
    public $id;
    public $name;
    public $id_reservationsTypes;
    private $db;

    //connect to db
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=plango;charset=utf8', 'u7dat_admin', 'plan&go2587');
        } catch (PDOException $e) {
        }
    }
    // get reservations subtypes list method
    public function getList()
    {
        $query = 'SELECT `id`, `name` FROM `u7dat_reservationssubtypes`;';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function getListBySubType()
    {
        $query = 'SELECT `rst`.`id` AS `rstId`, `rst`.`name` AS `rstName`, `rt`.`id` AS `rtId`, `rt`.`name` AS `rtName` FROM `u7dat_reservationssubtypes` AS `rst`
        INNER JOIN `u7dat_reservationstypes` AS `rt` ON `id_reservationsTypes` = `rt`.`id`';
        $request = $this->db->query($query);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
    //voir ou la mettre dans le controller
    public function checkIfExists()
    {
        $query = 'SELECT COUNT(*) FROM `u7dat_reservationssubtypes` WHERE `id` = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(":id", $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }
}
