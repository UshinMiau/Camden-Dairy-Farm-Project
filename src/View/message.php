<?php

    session_start();

    if (!isset($_SESSION)) {
        header('Location: ../../index.php');
        exit();
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

    <main>
        <div class="container w-50 vh-100 d-flex flex-column justify-content-center align-content-center">
            <div class="d-flex flex-column justify-content-center align-items-center card p-5 shadow">
                <h1 class="text-center my-4"><i class="bi bi-cone"></i> Attention</h1>
                <?php
                function displayAlert($type, $message)
                {
                    if (is_array($message)) {
                        $message = implode("<br>", $message);
                    }
                    
                    echo "<div class='alert alert-{$type}'>{$message}</div>";
                }
                
                if (isset($_SESSION['danger'])) {
                    displayAlert('danger', $_SESSION['danger']);
                    unset($_SESSION['danger']);
                }
                
                if (isset($_SESSION['info'])) {
                    displayAlert('info', $_SESSION['info']);
                    unset($_SESSION['info']);
                }
                
                if (isset($_SESSION['warning'])) {
                    displayAlert('warning', $_SESSION['warning']);
                    unset($_SESSION['warning']);
                }
                
                if (isset($_SESSION['success'])) {
                    displayAlert('success', $_SESSION['success']);
                    unset($_SESSION['success']);
                }
                ?>
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