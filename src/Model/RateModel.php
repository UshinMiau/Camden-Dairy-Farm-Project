<?php

    namespace APP\Model;

    class RateModel {

        private $rateCode;
        private $dimension;
        private $percentageOfDescount;

        public function __construct(
            $dimension,
            $percentageOfDescount,
            $rateCode = null
        ) {
            $this->dimension = $dimension;
            $this->percentageOfDescount = $percentageOfDescount;
            $this->rateCode = uniqid('rate_code', true);
        }

        public function __get($attribute) {
            return $this->$attribute;
        }
    }


?>