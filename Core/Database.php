<?php
    class Database {
        private static $host = 'localhost';
        private static $db = 'agendmais';
        private static $user = 'root';
        private static $pass = '';
        private static $charset = 'utf8mb4';
        private static $pdo = null;

        // Retorna a instância da conexão PDO

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
                    // Caso dar erro na conexão, interrompe a execução e exibe a mensagem de erro
                    die("Erro ao se conectar: ". $e->getMessage());
                }
            }
            return self::$pdo;
        }
    }
?>