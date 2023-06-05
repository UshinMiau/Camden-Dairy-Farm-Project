<?php

    namespace APP\Controller;

    require_once '../../vendor/autoload.php';
    
    use APP\Model\Uteis;
    use APP\Model\Validation;
    use APP\Model\ClientModel;
    use APP\Model\UserModel;
    use APP\Model\AddressModel;
    use APP\Model\DAO\ClientDAO;
    use APP\Model\DAO\UserDAO;
    use APP\Model\DAO\AddressDAO;
    
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

    if(!Validation::validateString($neighbouhood))
        array_push($error, "Invalid neighbourhood name.");
        
    if($error)
        Uteis::redirect(message: $error, session_name: 'msg_error_validation');

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
        addressOfShipping: $address->addressId,
    );

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $createdAt = time();

    if(!Validation::validateUsernameAndPassword($username))
        array_push($error, 'Invalid username.');

    if(!Validation::validateEmail($email))
        array_push($error, 'Invalid email.');

    if(!Validation::validateUsernameAndPassword($password))
        array_push($error, 'Invalid password.');

    if($error)
        Uteis::redirect(message: $error, session_name: 'msg_error_validation');

    $user = new UserModel(
        username: $username,
        email: $email,
        password: $password,
        createdAt: $createdAt,
    );

    // CADASTRAR USUARIO DPS DE CLIENT

    $resultClient = ClientDAO::sign_up($client);

    if($resultClient) {
        $resultAddress = AddressDAO::sign_up($address);
        
        if($resultAddress) {
            $resultUser = UserDAO::sign_up($user);

            if($resultUser) {
                Uteis::redirect(message: 'Account successfully registered!!', session_name: 'msg_confirm');
            }
            else {
                ClientDAO::remove($clientId);
                AddressDAO::remove($adrressId);
                Uteis::redirect(message: 'Sorry, it was not possible to register the account!!');
            }
        }
        else {
            ClientDAO::remove($clientId);
            Uteis::redirect(message: 'Sorry, it was not possible to register the account!!');
        }
    }
    else {
        Uteis::redirect(message: 'Sorry, it was not possible to register the account!!');
    }

?>