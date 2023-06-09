<?php

    session_start();

    if (isset($_SESSION['adm']) || isset($_SESSION['client'])) {
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
                            <a class="nav-link" href="login.php">
                                <i class="bi bi-person"></i> Login
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
                <h1 class="text-center my-4">Camden Dairy Farm</h1>
                <form class="row" method="POST" action="../Controller/Login.php?operation=sign_in">
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="login"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                                aria-describedby="login" aria-required="true" required name="username" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="password"><i class="bi bi-key"></i></span>
                            <input type="password" class="form-control" placeholder="Password" aria-label="Password"
                                aria-describedby="password" aria-required="true" required name="password" />
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-block btn-primary" type="submit">
                            <i class="bi bi-door-open"></i> Authenticate
                        </button>
                    </div>
                    <div class="col-12 mt-3 text-center">
                        <p>Don't have an account? <a href="sign_up.php">Register!</a></p>
                    </div>
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