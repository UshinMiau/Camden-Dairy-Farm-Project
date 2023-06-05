<?php

    namespace APP\Model;

    class ProductModel {
        private $productId; // * UUID 36 varchar
        private $name;
        private $priceOfSale; // * decimal 5,2
        private $stock; // ? smallint
        private $expirationDate; // * date
        private $productionDate; // * date
        private $productionCost; // * decimal 6,2
        private $comments; // * max 45
    
        public function __construct(
            $name,
            $priceOfSale,
            $stock,
            $expirationDate,
            $productionDate,
            $productionCost,
            $comments,
            $productId = null
            ) {
            $this->name = $name;
            $this->priceOfSale = $priceOfSale;
            $this->stock = $stock;
            $this->expirationDate = $expirationDate;
            $this->productionDate = $productionDate;
            $this->productionCost = $productionCost;
            $this->comments = $comments;
            $this->productId = uniqid('product', true);
        }

        public function __get($attribute) {
            return $this->$attribute;
        }

    }

?>