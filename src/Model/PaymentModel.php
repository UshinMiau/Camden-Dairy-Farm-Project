<?php 

    namespace APP\Model;

    class PaymentModel {

        private $paymentId;
        private $totalQuantityCart;
        private $paymentDate;
        private $totalPriceWithoutDiscount;
        private $paymentMethod;
        private $quotationDiscountValue;
        private $totalPriceWithDiscount;
        
        public function __construct(
            $paymentDate,
            $totalQuantityCart,
            $totalPriceWithoutDiscount,
            $paymentMethod = null,
            $quotationDiscountValue = null,
            $totalPriceWithDiscount = null,
            $paymentId = null,
        ) {
            $this->paymentDate = $paymentDate;
            $this->totalQuantityCart = $totalQuantityCart;
            $this->totalPriceWithoutDiscount = $totalPriceWithoutDiscount;
            $this->paymentMethod = 'payid';
            $this->quotationDiscountValue = $this->calculateDiscount($this->totalQuantityCart);
            $this->totalPriceWithDiscount = $this->totalPriceWithoutDiscount - ($this->totalPriceWithoutDiscount * $this->quotationDiscountValue / 100);
            $this->paymentId = uniqid('payment', true);
        }

        public function __get($attribute) {
            return $this->$attribute;
        }

        private function calculateDiscount($quantity) {
            if ($quantity < 10) {
                $discount = 0;
            }
            else if ($quantity >= 10 && $quantity < 50) {
                $discount = 1;
            }
            else if ($quantity >= 50 && $quantity < 100) {
                $discount = 5;
            }
            else if ($quantity >= 100 && $quantity < 500) {
                $discount = 10;
            }
            else if ($quantity >= 500 && $quantity < 1000) {
                $discount = 20;
            }
            else {
                $discount = 30;
            }
        
            return $discount;
        }
        
    }
?>