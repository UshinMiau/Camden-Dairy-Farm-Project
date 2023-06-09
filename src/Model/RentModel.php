<?php

    namespace APP\Model;

    class Rent {

        private $rateId;
        private $IotNumber;
        private $rentalFee;
        private $address;

        public function __construct(
            $IotNumber,
            $rentalFee,
            $address,
            $rateId
        ) {
            $this->IotNumber = $IotNumber;
            $this->rentalFee = $rentalFee;
            $this->address = $address;
            $this->rateId = uniqid('rate', true);
        }

        public function __get($attribute) {
            return $this->$attribute;
        }
    }


?>