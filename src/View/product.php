<?php

    session_start();

    if(!isset($_SESSION['data_product'])) {
        header('location: ../Controller/Products.php?operation=list_of_products');
    }
    else {
        $product = $_SESSION['data_product'];
    }

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
                                if(!$login):
                            ?>
                                <a class="nav-link" href="login.php">
                                    <i class="bi bi-person"></i> Login
                                </a>
                            <?php
                                endif;
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
            <div class="col-md-6">
                <img src="imgs/img.png" alt="Imagem do Produto" class="img-fluid">
                <h2><?= $product['name'] ?></h2>
                <p><b>Price:</b> $<?= $product['price_of_sale'] ?></p>
                <p><b>Stock:</b> <?= $product['stock'] ?></p>
                <p><b>Expiration date:</b> <?= $product['expiration_date'] ?></p>
                <p><b>Production date:</b> <?= $product['production_date'] ?></p>
                <p><b>Production cost:</b> $<?= $product['production_cost'] ?></p>
                <p><b>Comments: </b><?= $product['comments'] ?></p>
            </div>

            <div class="col-md-6">
                <h4>Add to Cart</h4>
                <form method="POST" action="../Controller/Products.php?operation=add_cart&&product=<?= base64_encode(serialize($product)) ?>">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Amount:</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" min="1" max="10" value="1">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
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
