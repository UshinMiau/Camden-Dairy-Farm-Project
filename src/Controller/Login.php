<?php

    namespace APP\Controller;

    require_once '../../vendor/autoload.php';

    use APP\Model\DAO\UserDAO;
    use APP\Model\DAO\ClientDAO;
    use APP\Model\Uteis;

    session_start();

    if(empty($_POST) && empty($_GET)) {
        Uteis::redirect(message: 'Invalid request!', session_name: 'danger');
    }

    if(empty($_GET['operation'])) {
        Uteis::redirect(message: 'Operation does not master. Please let her know!', session_name: 'danger');
    }
    
    switch ($_GET['operation']) {
        case 'sign_in':
            signIn();
            break;
        
        case 'sign_out':
            signOut();
            break;
        
        default:
            Uteis::redirect(message: 'The operation entered is not correct.', session_name: 'danger');
    }

    function signIn() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = UserDAO::findUser($username);
        
        if($result) {
            if(matchPassword($password, $result['password'])) {
                if($result['adm'] == 0) {
                    if($client = ClientDAO::findClient($result['email'])){                        
                        $_SESSION['client'] = $client;
                        header('location: ../../index.php');
                        die;
                    }
                    else {
                        Uteis::redirect('Error finding customer data.', session_name: 'danger');
                    }
                }
                else {
                    $_SESSION['adm'] = $result;
                    header('location: ../../index.php');
                    die;
                }
            }
        }
        else {
            Uteis::redirect(message: 'Non-existent record!', session_name: 'danger');
        }
    }
    function signOut() {
        session_destroy();
        header('location: ../../index.php');
    }

    function matchPassword($password, $result) {
        return password_verify($password, $result);
    }

?>