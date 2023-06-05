<?php

    namespace APP\Model;

    class AddressModel {
        private $addressId;
        private $streetName;
        private $numberOfStreet;
        private $neighbouhood;
        private $city;

        public function __construct(
            $streetName,
            $numberOfStreet,
            $neighbouhood,
            $city,
            $addressId = null
        ) {
            $this->streetName = $streetName;
            $this->numberOfStreet = $numberOfStreet;
            $this->neighbouhood = $neighbouhood;
            $this->city = $city;
            $this->addressId = uniqid('address', true);
        }

        public function __get($attribute) {
            return $this->$attribute;
        }
    }

?>