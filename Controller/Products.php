<?php

    namespace APP\Controller;

    require_once '../../vendor/autoload.php';

    use APP\Model\Uteis;
    use APP\Model\Validation;
    use APP\Model\ProductModel;
use APP\model\Validation as ModelValidation;

    session_start();

    if(empty($_POST) && empty($_GET)) {
        Uteis::redirect(message: 'Invalid request!');
    }

    switch($_GET['operation']) {
        case 'register':
            registerProduct();
            break;

        default:
            Uteis::redirect(message: 'Operation not reported.');
    }

    function registerProduct() {
        $name = $_POST['name'];
        $priceOfSale = $_POST['priceOfSale'];
        $stock = $_POST['stock'];
        $expirationDate = $_POST['expirationDate'];
        $productionDate = $_POST['productionDate'];
        $productionCost = $_POST['productionCost'];
        $comments = $_POST['comments'];

        $error = array();

        if(!Validation::validateString($name))
            array_push($error, "Invalid name for the product.");

        if(!Validation::validateStock($stock))
            array_push($error, 'The stock value has to be greater than 0.');

        if(!Validation::validateExpirationDate($expirationDate))
            array_push($error, 'The expiration date is invalid as this product has expired.');

        if(!Validation::validateProductionDate($productionDate))
            array_push($error, 'The production date is invalid as it has not yet occurred.');

        if(!Validation::validateComments($comments))
            array_push($error, 'Invalid comment, the comment can only have up to 45 characters.');

        // todo: validar preços (priceOfSale && productionCost)

        if($error)
            Uteis::redirect(message: $error, session_name: 'msg_error_validation');

        $product = new ProductModel(
            name: $name,
            priceOfSale: $priceOfSale,
            stock: $stock,
            expirationDate: $expirationDate,
            productionDate: $productionDate,
            productionCost: $productionCost,
            comments: $comments
        );

        // TODO: cadastrar no banco

    }




?>