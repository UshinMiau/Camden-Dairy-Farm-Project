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

    $streetName = $_POST['streetName'];
    $numberOfStreet = $_POST['numberOfStreet'];
    $neighborhood = $_POST['neighborhood'];
    $city = $_POST['city'];

    if(!Validation::validateString($streetName))
        array_push($error, "Invalid street name.");
    
    if(!Validation::validateNumber($numberOfStreet))
        array_push($error, "Invalid number of street.");

    if(!Validation::validateString($neighborhood))
        array_push($error, "Invalid neighborhood name.");
        
    if($error)
        Uteis::redirect(message: $error, session_name: 'msg_error_validation');

    $address = new AddressModel(
        streetName: $streetName,
        numberOfStreet: $numberOfStreet,
        neighborhood: $neighborhood,
        city: $city
    );
    $fullName = $_POST['fullName'];
    $phoneNumber = $_POST['phoneNumber'];
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $createdAt = date('m/d/y');

    if(!Validation::validateFullName($fullName))
        array_push($error, "Invalid full name.");

    if(!Validation::validatePhone($phoneNumber))
        array_push($error, "Invalid phone number.");

    if(!Validation::validateEmail($email))
        array_push($error, 'Invalid email.');

    if($error)
        Uteis::redirect(message: $error, session_name: 'msg_error_validation');

    $client = new ClientModel(
        fullName: $fullName,
        phoneNumber: $phoneNumber,
        addressOfShipping: $address->addressId,
        email: $email
    );

    if(!Validation::validateUsernameAndPassword($username))
        array_push($error, 'Invalid username.');

    if(!Validation::validateUsernameAndPassword($password))
        array_push($error, 'Invalid password.');

    if($error)
        Uteis::redirect(message: $error, session_name: 'msg_error_validation');

    $user = new UserModel(
        username: $username,
        email: $email,
        password: password_hash($password, PASSWORD_DEFAULT),
        createdAt: $createdAt,
    );

    $resultAddress = AddressDAO::sign_up($address);
    
    if($resultAddress) {
        $resultClient = ClientDAO::sign_up($client);
        
        if($resultClient) {
            $resultUser = UserDAO::sign_up($user);

            if($resultUser) {
                Uteis::redirect(message: 'Account successfully registered!!', session_name: 'msg_confirm');
            }
            else {
                AddressDAO::remove($address->addressId);
                ClientDAO::remove($client->clientId);
                Uteis::redirect(message: 'Sorry, it was not possible to register the account!!');
            }
        }
        else {
            AddressDAO::remove($adrressId);
            Uteis::redirect(message: 'Sorry, it was not possible to register the account!!');
        }
    }
    else {
        Uteis::redirect(message: 'Sorry, it was not possible to register the account!!');
    }

?>