<?php

    namespace APP\Model\DAO;

    use APP\Model\Connection;
    use APP\Model\AddressModel;
    use PDO;

    class AddressDAO {
        private static PDO $connection;

        public static function sign_up(AddressModel $address) {
            self::$connection = Connection::getConnection();
            $sql = "INSERT INTO address (address_id, street_name, street_number, neighbourhood, city) VALUES ('" . $address->addressId . "', '" . $address->streetName . "', '" . $address->numberOfStreet . "', '" . $address->neighbourhood . "', '" . $address->city . "')";
            $statement = self::$connection->prepare($sql);

            return $statement->execute();
        }

        public static function findAll(): array {
            self::$connection = Connection::getConnection();
            $sql = "SELECT * FROM address";
            $statement = self::$connection->prepare($sql);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function remove(string $addressId): bool {
            self::$connection = Connection::getConnection();
            $sql = "DELETE FROM address WHERE address_id = '" . $addressId . "'";
            $statement = self::$connection->prepare($sql);

            return $statement->execute();
        }

        public static function findAddressId(string $addressId) {
            self::$connection = Connection::getConnection();
            $sql = "SELECT * FROM address WHERE address_id = '" . $addressId . "'";
            $statement = self::$connection->prepare($sql);
            $statement->execute();

            return $statement->fetch(PDO::FETCH_ASSOC);
        }

        public static function update(AddressModel $address) {
            self::$connection = Connection::getConnection();
            $sql = "UPDATE address SET street_name = '" . $address->streetName . "', street_number = '" . $address->numberOfStreet . "', neighbourhood = '" . $address->neighbourhood . "', city = '" . $address->city . "' WHERE address_id = '" . $address->addressId . "'";
            $statement = self::$connection->prepare($sql);

            return $statement->execute();
        }
    }

?>
