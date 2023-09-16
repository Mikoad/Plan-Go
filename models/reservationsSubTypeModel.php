<?php

class reservationsSubTypes
{
    public $id;
    public $name;
    public $id_reservationsType;
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
}
