<?php

    namespace APP\Model;

    use PDO;
    use PDOException;

    class Connection {
        private static PDO $connection;
        
        public static function getConnection() {
            if(empty(self::$connection)) {
                try {
                    self::$connection = new PDO(DNS, USER, PASSWORD);
                }
                catch(PDOException) {
                    Uteis::redirect(message: "Error establishing database connection.", session_name: "msg_error");
                    die;
                }
            }

            return self::$connection;
        }
    }

?>