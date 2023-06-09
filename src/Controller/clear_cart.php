<?php
    session_start();
    unset($_SESSION['cart']);
    header("Location: ../View/cart.php");
    die();
?>
