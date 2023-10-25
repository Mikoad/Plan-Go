<?php

class usersReservations
{
    public $id_reservations;
    public $id_users;

    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=plango;charset=utf8', 'u7dat_admin', 'plan&go2587');
        } catch (PDOException $e) {
        }
    }

    public function add()
    {
        $query = 'INSERT INTO `u7dat_usersreservations`(`id_reservations`, `id_users`) VALUES (:id_reservations, :id_users)';
        $request = $this->db->prepare($query);
        $request->bindValue(":id_reservations", $this->id_reservations, PDO::PARAM_INT);
        $request->bindValue(":id_users", $this->id_users, PDO::PARAM_INT);
        return $request->execute();
    }

    public function getList()
    {
        $query = 'SELECT `ur`.`id_reservations`, `ur`.`id_users`, `r`.`price`, SUBSTR(`r`.`description`, 1, 100) AS `description`, `r`.`name` FROM `u7dat_usersreservations` AS `ur`
        INNER JOIN `u7dat_reservations` AS `r` ON `id_reservations` = `r`.`id`
        WHERE `id_users` = :id_users';
        $request = $this->db->prepare($query);
        $request->bindValue(":id_users", $this->id_users, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteReservation()
    {
        $query = 'DELETE FROM `u7dat_usersreservations` WHERE `id_reservations` = :id_reservations';
        $request = $this->db->prepare($query);
        $request->bindValue(":id_reservations", $this->id_reservations, PDO::PARAM_INT);
        return $request->execute();
    }

    // public function deleteOneById()
    // {
    //     $query = 'DELETE `id_reservations` FROM `u7dat_usersreservations` WHERE `id_users` = :id_users';
    //     $request = $this->db->prepare($query);
    //     $request->bindValue(":id_users", $this->id_users, PDO::PARAM_INT);
    //     return $request->execute();
    // }
}
