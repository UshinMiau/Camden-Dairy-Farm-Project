<?php 

    namespace APP\Model;

    class PaymentModel {

        private $paymentId;
        private $paymentDate;
        private $totalPriceWithoutDiscount;
        private $paymentMethod;
        private $quotationDiscountValue;
        private $totalPriceWithDiscount;
        
        public function __construct(
            $paymentDate,
            $totalPriceWithoutDiscount,
            $totalPriceWithDiscount,
            $quotationDiscountValue,
            $paymentMethod,
            $paymentId = null,
        ) {
            $this->paymentDate = $paymentDate;
            $this->totalPriceWithoutDiscount = $totalPriceWithoutDiscount;
            $this->totalPriceWithDiscount = $totalPriceWithDiscount;
            $this->quotationDiscountValue = $quotationDiscountValue;
            $this->paymentMethod = $paymentMethod;
            $this->paymentId = uniqid('payment', true);
        }

        public function __get($attribute) {
            return $this->$attribute;
        }
    }
?>