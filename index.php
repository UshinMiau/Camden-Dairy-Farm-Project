<?php

    session_start();

    if(empty($_SESSION['list_of_products'])) {
        header('location: src/Controller/Products.php?operation=list_of_products');
    }
    else if (isset($_SESSION['adm']) || isset($_SESSION['client'])) {
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

        .product-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .product-image {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .product-price {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .product-stock {
            margin-bottom: 10px;
        }

        .product-btn {
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand logo" href="index.php">Camden Dairy Farm</a>
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
                                <a class="nav-link" href="src/View/login.php">
                                    <i class="bi bi-person"></i> Login
                                </a>
                            <?php
                                else:
                                    if(isset($_SESSION['adm'])):
                            ?>
                                    <a class="nav-link" href="src/View/adm.php">
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

    <main class="container">
        <div class="row">
        <?php
            foreach ($_SESSION['list_of_products'] as $product):
        ?>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="src/View/imgs/img.png" alt="Product Image" class="product-image">
                    <h5 class="product-title"><?= $product['name'] ?></h5>
                    <p class="product-price">$<?= $product['price_of_sale'] ?></p>
                    <p class="product-stock">In Stock: <?= $product['stock'] ?></p>
                    <a href="src/Controller/Products.php?operation=find_product&&id=<?= $product['product_id'] ?>" class="btn btn-primary product-btn">Ver mais</a>
                </div>
            </div>
        <?php
            endforeach;
            unset($_SESSION['list_of_products']);
        ?>
        </div>
    </main>

    <!-- Restante do conteúdo da página -->

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
