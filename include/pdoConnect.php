<?php
class PdoConnect {
    private static $instance = null;
    private $PDO;

    private function __construct() {
        $host = 'localhost';
        $dbname = 'happynewyear';
        $username = 'root';
        $password = 'root';

        try {
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
            $this->PDO = new \PDO($dsn, $username, $password);
            $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            die('Database error: ' . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query($sql) {
        return $this->PDO->query($sql);
    }

    public function prepare($sql) {
        return $this->PDO->prepare($sql);
    }

    // Приватный метод для предотвращения клонирования объекта
    //private function __clone() {
    //}

    // Приватный метод для предотвращения десериализации объекта
    //private function __wakeup() {
    //}
}
