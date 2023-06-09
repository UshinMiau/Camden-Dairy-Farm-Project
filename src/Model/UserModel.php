<?php

    namespace APP\Model;

    class UserModel {
        private $userId;
        private $username;
        private $email;
        private $password;
        private $createdAt;
        private $adm;

        public function __construct(
            $username,
            $email,
            $password,
            $createdAt,
            $userId = 0,
            $adm = 0,
        ) {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->createdAt = $createdAt;
            $this->userId = $userId;
            $this->adm = $adm;
        }
        
        public function __get($attribute) {
            return $this->$attribute;
        }

    }


?>