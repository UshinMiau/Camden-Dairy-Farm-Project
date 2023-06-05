<?php

    namespace APP\Model;

    class UserModel {
        private $userId;
        private $username;
        private $email;
        private $password;
        private $createdAt;

        public function __construct(
            $username,
            $email,
            $password,
            $createdAt,
            $userId = null,
        ) {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->createdAt = $createdAt;
            $this->userId = $userId;
        }
        
        public function __get($attribute) {
            return $this->$attribute;
        }

    }


?>