<?php

    namespace APP\Model\DAO;

    use APP\Model\Connection;
    use APP\Model\UserModel;
    use PDO;

    class UserDAO {
        private static PDO $connection;

        public static function sign_up(UserModel $user) {
            self::$connection = Connection::getConnection();
            $sql = "INSERT INTO users(user_id, username, email, password, created_at, adm) VALUES ('" . $user->userId . "', '" . $user->username . "', '" . $user->email . "', '" . $user->password . "', '" . $user->createdAt . "', 0)";
            $statement = self::$connection->prepare($sql);
        
            return $statement->execute();
        }        

        public static function findAll(): array {
            self::$connection = Connection::getConnection();
            $sql = "SELECT * FROM users";
            $statement = self::$connection->prepare($sql);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function remove(string $userId): bool {
            self::$connection = Connection::getConnection();
            $sql = "DELETE FROM users WHERE user_id = '" . $userId . "'";
            $statement = self::$connection->prepare($sql);

            return $statement->execute();
        }

        public static function findUser(string $username) {
            self::$connection = Connection::getConnection();
            $sql = "SELECT * FROM users WHERE username = '" . $username . "'";
            $statement = self::$connection->prepare($sql);
            $statement->execute();

            return $statement->fetch(PDO::FETCH_ASSOC);
        }

        public static function findUserId(string $userId) {
            self::$connection = Connection::getConnection();
            $sql = "SELECT * FROM users WHERE user_id = '" . $userId . "'";
            $statement = self::$connection->prepare($sql);
            $statement->execute();

            return $statement->fetch(PDO::FETCH_ASSOC);
        }

        public static function update(UserModel $user) {
            self::$connection = Connection::getConnection();
            $sql = "UPDATE users SET username = '" . $user->username . "', email = '" . $user->email . "', password = '" . $user->password . "', created_at = '" . $user->createdAt . "' WHERE user_id = '" . $user->userId . "'";
            $statement = self::$connection->prepare($sql);

            return $statement->execute();
        }
    }

?>
