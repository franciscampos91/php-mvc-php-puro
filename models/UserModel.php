<?php

class UserModel extends Database
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }

    public function fetch()
    {
        $stm = $this->pdo->query("SELECT * FROM contatos");
        if ($stm->rowCount() > 0 ){
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }


    public function fecthById($id)
    {
        $stm = $this->pdo->prepare("SELECT * FROM contatos WHERE id = ?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
}