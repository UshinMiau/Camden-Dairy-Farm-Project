<?php 

    namespace APP\Model;

    class OrderModel {

        private $orderId;
        private $valueOfDeposit;
        private $client;
        private $products;
        private $deliveryDate;
        private $requestDate;
        private $payment;
        private $validity;

        public function __construct(
            $valueOfDeposit,
            $client,
            $products,
            $deliveryDate,
            $requestDate,
            $payment,
            $validity,
            $orderId = null
        ) {
            $this->valueOfDeposit = $valueOfDeposit;
            $this->client = $client;
            $this->products = $products;
            $this->deliveryDate = $deliveryDate;
            $this->requestDate = $requestDate;
            $this->payment = $payment;
            $this->validity = $validity;
            $this->orderId = uniqid("order", true);
        }

        public function __get($attribute) {
            return $this->$attribute;
        }
    }


?>