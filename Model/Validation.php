<?php

    namespace APP\Model;
    
    class Validation {
        public static function validateFullName($fullName) {
            $fullName = trim($fullName);

            if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/u", $fullName)) {
                return false;
            }
            else if(count(explode(' ', $fullName)) < 2){
                return false;
            }
            else {
                return true;
            }
        }
        
        public static function validatePrice($price) {
            return preg_match("/^\d{1,3}(?:\.\d{3})*(?:,\d{2})?$/", $price);
        }

        public static function validateUsernameAndPassword($usernameOrPassword) {
            return preg_match("/^(?=.*\d)(?=.*[#$@!%&*?\.\/])[A-Za-z\d#$@!%&*?\.\/]{8,}$/", $usernameOrPassword);
        }

        public static function validateString($string) {
            return preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/u", $string);
        }

        public static function validatePhone($phoneNumber) {
            $length = strlen($phoneNumber);
            return $length == 11 || $length == 8 || $length == 9 ? true : false;
        }

        public static function validateDate($date) {
            return date("m/d/Y", strtotime($date));
        }

        public static function validateEmail($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        public static function validateComments($comments) {
            return strlen($comments) < 46;
        }

        public static function validateNumber($number) {
            return ctype_digit($number);
        }

        public static function validateStock($stock) {
            return $stock > 0;
        }

        public static function validatePrices($price) {
            // TODO: pesquisar validação de preço australiana(ver no excel)
        }

        public static function validateProductionDate($productionDate) {
            $productionDate = Validation::ValidateDate($productionDate);

            $currentDateTimestamp = strtotime(date("m/d/Y"));
            $productionDateTimestamp = strtotime($productionDate);

            return $currentDateTimestamp >= $productionDateTimestamp;
        }

        public static function validateExpirationDate($expirationDate) {
            $expirationDate = Validation::ValidateDate($expirationDate);

            $currentDateTimestamp = strtotime(date("m/d/Y"));
            $expirationDateTimestamp = strtotime($expirationDate);

            return $currentDateTimestamp < $expirationDateTimestamp;
        }
    }
?>