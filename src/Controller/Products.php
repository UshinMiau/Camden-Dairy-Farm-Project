<?php

    namespace APP\Controller;

    require_once '../../vendor/autoload.php';

    use APP\Model\Uteis;
    use APP\Model\Validation;
    use APP\Model\ProductModel;
    use APP\Model\DAO\ProductDAO;

    session_start();

    if(empty($_POST) && empty($_GET)) {
        Uteis::redirect(message: 'Invalid request!');
    }

    switch($_GET['operation']) {
        case 'register':
            registerProduct();
            break;

        case 'list_of_products':
            listAllProducts();
            break;

        case 'find_product':
            findProduct();
            break;

        case 'add_cart':
            addCart();
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

        if(!Validation::validatePrice($priceOfSale))
            array_push($error, "Invalid price of sale.");

        if(!Validation::validatePrice($productionCost))
            array_push($error, "Invalid price of production cost.");

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

        $result = ProductDAO::register($product);
        
        if($result) {
            Uteis::redirect(message: 'Product successfully registered!!', session_name: 'msg_confirm');
        }
        else {
            Uteis::redirect(message: 'Sorry, it was not possible to register the product!!');
        }
    }

    function listAllProducts() {
        $products = ProductDAO::findAll();
        
        if($products) {
            Uteis::redirect(message: $products, session_name: "list_of_products", url: "../../index.php");
        }
        else {
            Uteis::redirect(message: "No products registered at the moment!!");
        }
    }

    function findProduct() {
        if(empty($_GET['id'])) {
            Uteis::redirect("Product code not informed!!");
        }

        $product = ProductDAO::findProductId($_GET['id']);

        if($product) {
            Uteis::redirect(message: $product, session_name: "data_product", url: '../View/product.php');
        }
        else {
            Uteis::redirect("Product not found!!");
        }
    }

    function addCart() {
        if (empty($_GET['product'])) {
            Uteis::redirect("Product not informed!!");
        }
        else {
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }
    
            $product = unserialize(base64_decode($_GET['product']));
            $quantity = $_POST['quantity'];

            $item = array(
                'product' => $product,
                'quantity' => $quantity
            );
    
            array_push($_SESSION['cart'], $item);
        }

        header('location: ../View/cart.php');
        die;
    }
    

?>