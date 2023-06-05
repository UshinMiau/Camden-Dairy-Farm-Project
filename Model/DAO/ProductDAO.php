<?php

    namespace APP\Model\DAO;

    use APP\Model\Connection;
    use APP\Model\ProductModel;
    use PDO;

    class ProductDAO {
        private static PDO $connection;

        public static function register(ProductModel $product) {
            self::$connection = Connection::getConnection();
            $sql = "INSERT INTO product (product_id, name, price_of_sale, stock, expiration_date, production_date, production_cost, comments) VALUES ('" . $product->productId . "', '" . $product->name . "', " . $product->priceOfSale . ", " . $product->stock . ", '" . $product->expirationDate . "', '" . $product->productionDate . "', " . $product->productionCost . ", '" . $product->comments . "')";
            $statement = self::$connection->prepare($sql);

            return $statement->execute();
        }

        public static function findAll(): array {
            self::$connection = Connection::getConnection();
            $sql = "SELECT * FROM product";
            $statement = self::$connection->prepare($sql);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function remove(string $productId): bool {
            self::$connection = Connection::getConnection();
            $sql = "DELETE FROM product WHERE product_id = '" . $productId . "'";
            $statement = self::$connection->prepare($sql);

            return $statement->execute();
        }

        public static function findProduct(string $name) {
            self::$connection = Connection::getConnection();
            $sql = "SELECT * FROM product WHERE name = '" . $name . "'";
            $statement = self::$connection->prepare($sql);
            $statement->execute();

            return $statement->fetch(PDO::FETCH_ASSOC);
        }

        public static function findProductId(string $productId) {
            self::$connection = Connection::getConnection();
            $sql = "SELECT * FROM product WHERE product_id = '" . $productId . "'";
            $statement = self::$connection->prepare($sql);
            $statement->execute();

            return $statement->fetch(PDO::FETCH_ASSOC);
        }

        public static function update(ProductModel $product) {
            self::$connection = Connection::getConnection();
            $sql = "UPDATE product SET name = '" . $product->name . "', price_of_sale = " . $product->priceOfSale . ", stock = " . $product->stock . ", expiration_date = '" . $product->expirationDate . "', production_date = '" . $product->productionDate . "', production_cost = " . $product->productionCost . ", comments = '" . $product->comments . "' WHERE product_id = '" . $product->productId . "'";
            $statement = self::$connection->prepare($sql);

            return $statement->execute();
        }
    }

?>
