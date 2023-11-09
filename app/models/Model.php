<?php
require_once 'libs/config.php';
class Model
{
    protected $db;


    function __construct()
    {



        $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
        $this->deploy();
    }

    function deploy()
    {
        // Chequear si hay tablas
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll(); // Nos devuelve todas las tablas de la db
    }
}
