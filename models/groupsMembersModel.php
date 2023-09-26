<?php
class groupsMembers
{
    public $id_groups;
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
        $query = 'INSERT INTO `u7dat_groupsmembers`(`id_groups`, `id_users`) VALUES (:id_groups, :id_users)';
        $request = $this->db->prepare($query);
        $request->bindValue(":id_groups", $this->id_groups, PDO::PARAM_INT);
        $request->bindValue(":id_users", $this->id_users, PDO::PARAM_INT);
        return $request->execute();
    }
}
