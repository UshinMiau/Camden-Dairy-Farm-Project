<?php

    session_start();

    if (isset($_SESSION['adm']) || isset($_SESSION['client'])) {
        $login = true;
    }
    else {
        $login = false;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Camden Dairy Farm Site</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" crossorigin="anonymous" />
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

        .container {
            display: flex;
            justify-content: space-between;
        }

        .item-card {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            width: 200px;
        }

        .cart-summary {
            border: 1px solid #ccc;
            padding: 10px;
            width: 300px;
        }

        .item-image {
            width: 100px;
            height: 100px;
        }

        .checkout-btn {
            display: block;
            margin-top: 10px;
        }

        .item-info {
            margin-bottom: 5px;
        }

        .item-info h5 {
            margin: 0;
        }

        .item-info span {
            display: inline-block;
            width: 49%;
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
                                if(!$login):
                            ?>
                                <a class="nav-link" href="login.php">
                                    <i class="bi bi-person"></i> Login
                                </a>
                            <?php
                                else:
                                    if(isset($_SESSION['adm'])):
                            ?>
                                    <a class="nav-link" href="adm.php">
                                        <i class="bi bi-person"></i> Adm Panel
                                    </a>
                                <?php
                                    else:
                                ?>
                                    <a class="nav-link" href="client.php">
                                        <i class="bi bi-person"></i> Client Panel
                                    </a>
                            <?php
                                endif;
                                endif;
                            ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">
                                <i class="bi bi-cart"></i> Cart
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <br>

    <main class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                    if(!isset($_SESSION['cart'])):
                ?>

                    <h2>Empty shopping cart!</h2>

                <?php
                    else:
                        foreach($_SESSION['cart'] as $item):
                            $name = $item['product']['name'];
                            $quantity = $item['quantity'];
                            $price = $item['product']['price_of_sale'];
                            $totalPrice = $price * $quantity;

                            if(!isset($totalPriceCart) && !isset($totalQuantityCart)) {
                                $totalPriceCart = $totalPrice;
                                $totalQuantityCart = $quantity;
                            }
                            else {
                                $totalPriceCart = $totalPriceCart + $totalPrice;
                                $totalQuantityCart = $totalQuantityCart + $quantity;
                            }
                ?>
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="imgs/img.png" alt="" class="card-img-top" style="max-height: 140px; object-fit: contain;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title"><?= $name ?></h3>
                                        <p class="card-text">Price: $<?= $price ?></p>
                                        <p class="card-text">Quantity: <?= $quantity ?></p>
                                        <p class="card-text">Total price: $<?= $totalPrice ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    endforeach;
                ?>
                    <a class="btn btn-block btn-danger" href="../Controller/clear_cart.php">
                        <i class="bi bi-trash"></i> Clear
                    </a>
                <?php
                    endif;
                ?>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <form method="POST" action="../Controller/Payment.php?operation=pay">
                            <h2 class="card-title">Cart Summary</h2>
                            <div class="item-info">
                            <?php
                                if(!isset($_SESSION['cart'])):
                            ?>
                                <h5>Empty shopping cart!</h5>
                            <?php
                                else:
                            ?>
                                <h5>Total Items: <?= $totalQuantityCart ?></h5>
                                <h5>Total Price: $<?= $totalPriceCart ?></h5>
                            </div>
                            <?php
                                endif;
                                if(!$login):
                            ?>
                                <div class='alert alert-warning'>
                                    Log in to make the payment.
                                </div>
                            <?php
                                else:
                            ?>
                                <input type="hidden" name="totalQuantityCart" value="<?= $totalQuantityCart ?>">
                                <input type="hidden" name="totalPriceCart" value="<?= $totalPriceCart ?>">
                                <?php
                                    if(isset($_SESSION['cart'])):
                                ?>
                                    <button type="submit" class="btn btn-primary checkout-btn">Checkout</button>
                            <?php
                                endif;
                                endif;
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(".navbar-toggler").click(function() {
                $(".navbar-collapse").toggleClass("show");
            });
        });
    </script>
</body>

</html>