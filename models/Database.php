<?php

class Database
{
    public function getConnection()
    {
        try {
            $pdo = new PDO("mysql:dbname=agenda;host=127.0.0.1", "root", "");
            return $pdo;

        } catch (PDOException $err) {
            print_r($err->getMessage());
        }

    }
}