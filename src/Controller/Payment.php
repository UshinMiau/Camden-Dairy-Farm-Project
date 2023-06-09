<?php

    namespace APP\Controller;
    
    require_once '../../vendor/autoload.php';

    use APP\Model\Uteis;
    use APP\Model\PaymentModel;
    use APP\Model\DAO\PaymentDAO;

    session_start();

    if(empty($_POST) && empty($_GET)) {
        Uteis::redirect(message: 'Invalid request!', session_name: 'danger');
    }

    switch($_GET['operation']) {
        case 'pay':
            pay();
            break;
        
        case 'register_pay':
            registerPay();
            break;

        default:
            Uteis::redirect(message: 'Operation not reported.', session_name: 'danger');
    }


    function pay() {
        $totalQuantityCart = intval($_POST['totalQuantityCart']);
        $totalPriceWithoutDiscount = floatval($_POST['totalPriceCart']);
        $paymentDate = date('m/d/y');

        $pay = new PaymentModel(
            paymentDate: $paymentDate,
            totalQuantityCart: $totalQuantityCart,
            totalPriceWithoutDiscount: $totalPriceWithoutDiscount
        );

        Uteis::redirect(message: serialize($pay), session_name: 'data_pay', url: '../View/payment.php');
        
    }

    function registerPay() {
        $summary = unserialize(base64_decode($_GET['summary']));

        $result = PaymentDAO::register($summary);

        if($result) {
            Uteis::redirect(message: 'Successful payment!', session_name: 'success');
        }
        else {
            Uteis::redirect(message: 'Error when making payment!', session_name: 'danger');
        }
    }
?>