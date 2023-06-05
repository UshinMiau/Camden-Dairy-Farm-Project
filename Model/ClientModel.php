<?php

    namespace APP\Model;

    class ClientModel {

        private $clientId;
        private $fullName;
        private $phoneNumber;
        private $addressOfShipping;

        public function __construct(
            $fullName,
            $phoneNumber,
            $addressOfShipping,
            $clientId = null,
        ) {
            $this->fullName = $fullName;
            $this->phoneNumber = $phoneNumber;
            $this->addressOfShipping = $addressOfShipping;
            $this->clientId = uniqid('client', true);
        }

        public function __get($attribute) {
            return $this->$attribute;
        }
    }



?>