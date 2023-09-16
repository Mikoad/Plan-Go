<?php
class cities
{
    public $id;
    public $name;
    public $zipCode;
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=plango;charset=utf8', 'u7dat_admin', 'plan&go2587');
        } catch (PDOException $e) {
        }
    }

    public function getList()
    {
        $query = 'SELECT `id`, `name`, `zipCode` FROM `u7dat_cities`;';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
}
