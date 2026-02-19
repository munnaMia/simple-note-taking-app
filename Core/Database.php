<?php

namespace Core;

use PDO; // if you don't want to use \PDO you can use it

class Database
{
    public $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = "mysql:" . http_build_query($config['database'], '', ';');
        $this->connection = new PDO($dsn, $username, $password, [
            // use a \ slash to ref as PDO from global root not from this name space
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($query, $param = [])
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($param);

        return $this; // return the instance to Database class
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function findOrAbort()
    {
        $result = $this->find();

        if (!$result) {
            abort();
        }
        return $result;
    }
}
