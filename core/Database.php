<?php 

namespace core;
use PDO;
    /* =======================================================
        CONNECTING TO THE DATABASE, AND EXECUTING A QUERY.
       =======================================================
    */
    class Database
    {
        public $connection;
        public $statement;

        public function __construct($config,$username = 'root', $password = 'root')
        {

            $dsn = 'mysql:' . http_build_query($config,'',';');  ####Same as the one Below
            // $dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4"; ####TheOneBelow lol
            $this->connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
            ]);

        }
        public function query($query, $param = [])
        {
            

            $this->statement = $this->connection->prepare($query);
            $this->statement->execute($param);

            return $this;
        }

        public function find()
        {
            return $this->statement->fetch();
        }

        public function findAll()
        {
            return $this->statement->fetchAll();
        }

        public function findOrDeny()
        {
            $result = $this->statement->fetch();
            if(! $result)
            abort(Response::NOT_FOUND);
            
            return $result;
        }
    }
?>


