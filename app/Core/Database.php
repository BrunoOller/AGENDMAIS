<?php
    namespace App\Core; 

    use PDO;
    use PDOException;

    class Database {
        private static $host = 'localhost';
        private static $db = 'agendmais';
        private static $user = 'root';
        private static $pass = '';
        private static $charset = 'utf8mb4';
        private static $pdo = null;

        public static function getConnection() {
            if (self::$pdo === null) {
                $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=" . self::$charset;
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ];
                try {
                    self::$pdo = new PDO($dsn, self::$user, self::$pass, $options);
                } catch (\PDOException $e) {
                    die("Erro ao se conectar: ". $e->getMessage());
                }
            }
            return self::$pdo;
        }
    }
?>