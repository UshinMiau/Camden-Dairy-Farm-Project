<?php

    session_start();

    if ((!isset($_SESSION['adm']) || !isset($_SESSION['client'])) && !isset($_SESSION['data_pay'])) {
        header('location: ../../index.php');
        die;
    }
    else {
        require_once '../Model/PaymentModel.php';

        $data_pay = unserialize($_SESSION['data_pay']);
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Camden Dairy Farm Site</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <style>
        .logo {
            color: #fff;
            font-weight: bold;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #fff;
        }

        .navbar-collapse {
            justify-content: flex-end;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand logo" href="../../index.php">Camden Dairy Farm</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <?php
                                if(isset($_SESSION['adm'])):
                            ?>
                                <a class="nav-link" href="adm.php">
                                    <i class="bi bi-person"></i> Adm Panel
                                </a>
                            <?php
                                else:
                            ?>
                                <a class="nav-link" href="src/View/client.php">
                                    <i class="bi bi-person"></i> Client Panel
                                </a>
                            <?php
                                endif;
                            ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="src/View/cart.php">
                                <i class="bi bi-cart"></i> Cart
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <br>

    <main class="d-flex justify-content-center align-items-center">
        <div class="card shadow container w-50">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <form method="POST" action="../Controller/Payment.php?operation=register_pay&&summary=<?= base64_encode(serialize($data_pay)) ?>">
                    <h2 class="card-title">Payment Summary</h2>
                    <div class="item-info">
                        <h5>Payment id: <?= $data_pay->paymentId ?></h5>
                        <h5>Total items: <?= $data_pay->totalQuantityCart ?></h5>
                        <h5>Payment date: <?= $data_pay->paymentDate ?></h5>
                        <h5>Price without discount: <?= $data_pay->totalPriceWithoutDiscount ?></h5>
                        <h5>Discount percentage: <?= $data_pay->quotationDiscountValue . '%' ?></h5>
                        <h5>Price with discount: <?= $data_pay->totalPriceWithDiscount ?></h5>
                        <h5>Payment method: <?= $data_pay->paymentMethod ?></h5>
                    </div>

                    <br>
                    
                    <button type="submit" class="btn btn-primary checkout-btn mx-auto d-block">Register Pay</button>
                </form>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $(".navbar-toggler").click(function () {
                $(".navbar-collapse").toggleClass("show");
            });
        });
    </script>
</body>

</html>