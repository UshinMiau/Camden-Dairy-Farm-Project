<?php

    namespace APP\Model;

    class AddressModel {
        private $addressId;
        private $streetName;
        private $numberOfStreet;
        private $neighborhood;
        private $city;

        public function __construct(
            $streetName,
            $numberOfStreet,
            $neighborhood,
            $city,
            $addressId = null
        ) {
            $this->streetName = $streetName;
            $this->numberOfStreet = $numberOfStreet;
            $this->neighborhood = $neighborhood;
            $this->city = $city;
            $this->addressId = uniqid('address', true);
        }

        public function __get($attribute) {
            return $this->$attribute;
        }
    }

?>