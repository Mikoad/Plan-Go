<?php
class groups
{
    public $id;
    public $name;
    public $description;
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
        $query = 'INSERT INTO `u7dat_groups` (`name`, `description`)
        VALUES (:name, :description);';
        $request = $this->db->prepare($query);
        $request->bindValue(":name", $this->name, PDO::PARAM_STR);
        $request->bindValue(":description", $this->description, PDO::PARAM_STR);
        return $request->execute();
    }
}
