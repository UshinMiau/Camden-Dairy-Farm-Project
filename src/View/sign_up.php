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
        <div class="container w-50 min-vh-100 d-flex flex-column justify-content-center align-content-center">
            <div class="d-flex flex-column justify-content-center align-items-center card p-5 shadow">
                <h1 class="text-center my-4">Camden Dairy Farm</h1>
                <form class="row g-3" onsubmit="return validateForm()" method="POST" action="../Controller/SignUp.php?operation=sign_up">
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
                        <div class="input-group">
                            <span class="input-group-text" id="email"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Email" aria-label="Email"
                                aria-describedby="email" aria-required="true" required name="email" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="fullName"><i class="bi bi-person-circle"></i></span>
                            <input type="text" class="form-control" placeholder="Full Name" aria-label="Full Name"
                                aria-describedby="fullName" aria-required="true" required pattern="^[A-Za-zÀ-ÖØ-öø-ÿ\s]+ [A-Za-zÀ-ÖØ-öø-ÿ\s]+$"
                                title="Full Name must contain at least two words separated by a space." name="fullName" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="phoneNumber"><i class="bi bi-telephone"></i></span>
                            <input type="text" class="form-control" placeholder="Phone Number" aria-label="Phone Number"
                                aria-describedby="phoneNumber" aria-required="true" required pattern="^\d{8,11}$"
                                title="Phone Number must be a number with 8 to 11 digits." name="phoneNumber" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="streetName"><i class="bi bi-house"></i></span>
                            <input type="text" class="form-control" placeholder="Street Name" aria-label="Street Name"
                                aria-describedby="streetName" aria-required="true" required pattern="^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$"
                                title="Street Name must contain only letters and spaces." name="streetName" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="numberOfStreet"><i class="bi bi-house-door"></i></span>
                            <input type="text" class="form-control" placeholder="Number of Street"
                                aria-label="Number of Street" aria-describedby="numberOfStreet" aria-required="true"
                                required pattern="^\d+$" title="Number of Street must contain only numbers."
                                name="numberOfStreet" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="neighborhood"><i class="bi bi-geo-alt"></i></span>
                            <input type="text" class="form-control" placeholder="neighborhood" aria-label="neighborhood"
                                aria-describedby="neighborhood" aria-required="true" required pattern="^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$"
                                title="neighborhood must contain only letters and spaces." name="neighborhood" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="city"><i class="bi bi-geo-alt"></i></span>
                            <select class="form-select" aria-label="City" aria-describedby="city" aria-required="true" required
                                name="city">
                                <option value="" selected disabled>Select City</option>
                                <option value="Albury">Albury</option>
                                <option value="Armidale">Armidale</option>
                                <option value="Bathurst">Bathurst</option>
                                <option value="Blue Mountains">Blue Mountains</option>
                                <option value="Broken Hill">Broken Hill</option>
                                <option value="Cessnock">Cessnock</option>
                                <option value="Coffs Harbour">Coffs Harbour</option>
                                <option value="Dubbo">Dubbo</option>
                                <option value="Goulburn">Goulburn</option>
                                <option value="Grafton">Grafton</option>
                                <option value="Griffith">Griffith</option>
                                <option value="Lake Macquarie">Lake Macquarie</option>
                                <option value="Lismore">Lismore</option>
                                <option value="Maitland">Maitland</option>
                                <option value="Newcastle">Newcastle</option>
                                <option value="Nowra">Nowra</option>
                                <option value="Orange">Orange</option>
                                <option value="Port Macquarie">Port Macquarie</option>
                                <option value="Queanbeyan">Queanbeyan</option>
                                <option value="Sydney">Sydney</option>
                                <option value="Tamworth">Tamworth</option>
                                <option value="Tweed Heads">Tweed Heads</option>
                                <option value="Wagga Wagga">Wagga Wagga</option>
                                <option value="Wollongong">Wollongong</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-block btn-primary" type="submit">
                            <i class="bi bi-door-open"></i> Authenticate
                        </button>
                    </div>
                </form>

                <div class="col-12 mt-3 text-center">
                    <p>Already have an account? <a href="login.php">Login!</a></p>
                </div>
            </div>
        </div>
    </main>
    
    <script>
        function validateForm() {
            var username = document.querySelector('input[name="username"]');
            var password = document.querySelector('input[name="password"]');
            var fullName = document.querySelector('input[name="fullName"]');
            var phoneNumber = document.querySelector('input[name="phoneNumber"]');
            var streetName = document.querySelector('input[name="streetName"]');
            var neighborhood = document.querySelector('input[name="neighborhood"]');
            var isValid = true;
    
            var usernamePattern = /^(?=.*\d)(?=.*[#$@!%&*?\.\/])[A-Za-z\d#$@!%&*?\.\/]{8,}$/;
            var phoneNumberPattern = /^\d{8,11}$/;
            var fullNamePattern = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;
    
            if (!usernamePattern.test(username.value)) {
                username.setCustomValidity(
                    'Username must contain at least one digit, one special character, and be at least 8 characters long.'
                );
                isValid = false;
            } else {
                username.setCustomValidity('');
            }
    
            if (!usernamePattern.test(password.value)) {
                password.setCustomValidity(
                    'Password must contain at least one digit, one special character, and be at least 8 characters long.'
                );
                isValid = false;
            } else {
                password.setCustomValidity('');
            }
    
            if (!phoneNumberPattern.test(phoneNumber.value)) {
                phoneNumber.setCustomValidity('Phone Number must be a number with 8 to 11 digits.');
                isValid = false;
            } else {
                phoneNumber.setCustomValidity('');
            }
    
            if (!fullNamePattern.test(fullName.value)) {
                fullName.setCustomValidity('Full Name must contain only letters and spaces.');
                isValid = false;
            } else {
                fullName.setCustomValidity('');
            }
    
            if (!fullNamePattern.test(streetName.value)) {
                streetName.setCustomValidity('Street Name must contain only letters and spaces.');
                isValid = false;
            } else {
                streetName.setCustomValidity('');
            }
    
            if (!fullNamePattern.test(neighborhood.value)) {
                neighborhood.setCustomValidity('neighborhood must contain only letters and spaces.');
                isValid = false;
            } else {
                neighborhood.setCustomValidity('');
            }
    
            return isValid;
        }
    </script>
    
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
