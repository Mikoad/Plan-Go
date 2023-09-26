<?php
class messages
{
    public $id;
    public $hour;
    public $content;
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
        $query = 'INSERT INTO `u7dat_messages`(`hour`, `content`, `id_groups`, `id_users`) VALUES (NOW(), :content, :id_groups, :id_users)';
        $request = $this->db->prepare($query);
        $request->bindValue(":hour", $this->hour, PDO::PARAM_STR);
        $request->bindValue(":content", $this->content, PDO::PARAM_STR);
        $request->bindValue(":id_groups", $this->id_groups, PDO::PARAM_INT);
        $request->bindValue(":id_users", $this->id_users, PDO::PARAM_INT);
        return $request->execute();
    }

    public function getList()
    {
        $query = 'SELECT `hour`, `content`, `id_groups`, `id_users` 
        FROM `u7dat_messages` 
        INNER JOIN `u7dat_groups` ON `id_groups` = `u7dat_groups`.`id`
        INNER JOIN `u7dat_users` ON `id_users` = `u7dat_users`.`id`;';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
}
