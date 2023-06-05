<?php

    namespace APP\Controller;

    require_once '../../vendor/autoload.php';
    
    use APP\Model\Uteis;
    use APP\Model\Validation;
    use APP\Model\ClientModel;
    use APP\Model\AddressModel;
    
    session_start();

    if(empty($_POST) && empty($_GET)) {
        Uteis::redirect(message: 'Invalid request!');
    }

    if($_GET['operation'] !== 'sign_up') {
        Uteis::redirect(message: 'The operation entered is not correct.');
    }
    
    $error = array();

    $_POST['streetName'] = $streetName;
    $_POST['numberOfStreet'] = $numberOfStreet;
    $_POST['neighbourhood'] = $neighbourhood;
    $_POST['city'] = $city;

    if(!Validation::validateString($streetName))
        array_push($error, "Invalid street name.");
    
    if(!Validation::validateNumber($numberOfStreet))
        array_push($error, "Invalid number of street.");

    if(!Validation::validateString($streetName))
        array_push($error, "Invalid neighbourhood name.");
        
    if($error)
        Uteis::redirect(message: $error, session_name: 'msg_error_validation');

    

    // * esperando dados adicionais para a validação

    // APOS SER APROVADO O ENDEREÇO SEGUE O CADASTRO DO CLIENTE
    $address = new AddressModel(
        streetName: $streetName,
        numberOfStreet: $numberOfStreet,
        neighbouhood: $neighbouhood,
        city: $city
    );
    $_POST['fullName'] = $fullName;
    $_POST['phoneNumber'] = $phoneNumber;
    

    if(!Validation::validateFullName($fullName))
        array_push($error, "Invalid full name.");

    if(!Validation::validatePhone($phoneNumber))
        array_push($error, "Invalid phone number.");

    if($error)
        Uteis::redirect(message: $error, session_name: 'msg_error_validation');

    $client = new ClientModel(
        fullName: $fullName,
        phoneNumber: $phoneNumber,
        addressOfShipping: $address,
    );

?>