<?php
/**
 *
 */

namespace App\Providers;

class Database
{
    private $db_host = "localhost";
    private $db_name = "footman_2";
    private $db_user = "root";
    private $db_pass = "";
    private $charset = "utf8mb4";
    private $dbport = "port=3306";
    private $dsn;

    public function __construct()
    {
        $this->dsn = "mysql:host=$this->db_host;dbname=$this->db_name;charset=$this->charset;port=$this->dbport";
        try {
            return new \PDO($this->dsn, $this->db_user, $this->db_pass);
        } catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }
}
