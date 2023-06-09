<?php

    namespace APP\Model\DAO;

    use APP\Model\Connection;
    use APP\Model\PaymentModel;
    use PDO;

    class PaymentDAO {
        private static PDO $connection;

        public static function register(PaymentModel $payment) {
            self::$connection = Connection::getConnection();
            $sql = "INSERT INTO payment (payment_id, paymentDate, total_price, quotationDiscount, payment_method) VALUES ('" . $payment->paymentId . "', '" . $payment->paymentDate . "', '" . $payment->totalPriceWithDiscount . "', '" . $payment->quotationDiscountValue . "', '" . $payment->paymentMethod . "')";
            $statement = self::$connection->prepare($sql);

            return $statement->execute();
        }
    }
?>





