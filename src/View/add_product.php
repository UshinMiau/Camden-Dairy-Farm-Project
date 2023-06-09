<?php

    session_start();

    if(!isset($_SESSION['adm'])) {
        header('location: ../../index.php');
        die;
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
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand logo" href="../../index.php">Camden Dairy Farm</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="adm.php">
                                <i class="bi bi-person"></i> Adm Panel
                            </a>
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

    <main>
        <div class="container w-50 vh-100 d-flex flex-column justify-content-center align-content-center">
            <div class="d-flex flex-column justify-content-center align-items-center card p-5 shadow">
                <h1 class="text-center my-4">Add Product</h1>
                <form class="row" action="../Controller/Products.php?operation=register" method="POST" onsubmit="return validateForm()">
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="name"><i class="bi bi-tag"></i></span>
                            <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name" aria-required="true" required name="name" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="priceOfSale"><i class="bi bi-cash"></i></span>
                            <input type="text" class="form-control" placeholder="Price of Sale" aria-label="Price of Sale" aria-describedby="priceOfSale" aria-required="true" required pattern="^\d+(\.\d+)?$" name="priceOfSale" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="stock"><i class="bi bi-archive-fill"></i></span>
                            <input type="number" class="form-control" placeholder="Stock" aria-label="Stock" aria-describedby="stock" aria-required="true" required name="stock" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="expirationDate"><i class="bi bi-calendar-x"></i></span>
                            <input type="date" class="form-control" placeholder="Expiration Date" aria-label="Expiration Date" aria-describedby="expirationDate" aria-required="true" required name="expirationDate" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="productionDate"><i class="bi bi-calendar-check"></i></span>
                            <input type="date" class="form-control" placeholder="Production Date" aria-label="Production Date" aria-describedby="productionDate" aria-required="true" required name="productionDate" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="productionCost"><i class="bi bi-cash-coin"></i></span>
                            <input type="text" class="form-control" placeholder="Production Cost" aria-label="Production Cost" aria-describedby="productionCost" aria-required="true" required pattern="^\d+(\.\d+)?$" name="productionCost" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="comments"><i class="bi bi-chat-dots"></i></span>
                            <textarea class="form-control" placeholder="Comments" aria-label="Comments" aria-describedby="comments" required name="comments"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-block btn-primary" type="submit">
                            <i class="bi bi-plus"></i> Add Product
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </main>
</body>

</html>