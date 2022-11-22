<?php
require 'database.php';
if (!empty($_SESSION["id"])) {
    # code...
    header("location: index.php");
}
if (isset($_POST["submit"])) {
    # code...
    $name = $_POST["name"];
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $used = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");
    if (mysqli_num_rows($used) > 0) {
        # code...
        $_SESSION['message'] = "Email is Already Taken";
        header("location: signup.php");
        die();
    } else {
        if ($password == $confirm_password) {
            # code...
            $query = "INSERT INTO tb_user VALUES ('','$name','$email','$password')";
            mysqli_query($conn, $query);
            $_SESSION['message'] = "Registration Successful. You can sign in! ";
            header("location: login.php");
            die();
        } else {
            # code...
            echo "<script> alert('password does not match'); </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <nav class="container mx-auto bg-white border-gray-200 px-2 sm:px-0 py-2.5 rounded ">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="login.php" class="flex items-center">
                <img src="https://i.ibb.co/Q6Z8h05/Music-Me.png" class="mr-3 h-6 sm:h-16" alt="Logo">
                <span class="self-center text-xl font-semibold whitespace-nowrap ">Music Me</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white ">
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-white bg-orange-500 rounded md:bg-transparent md:text-orange-500 md:p-0 " aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:text-white hover:bg-orange-500 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:text-white hover:bg-orange-500 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:text-white hover:bg-orange-500 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:text-white hover:bg-orange-500 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="container mx-auto mt-10">
        <div class="px-6 h-full text-gray-800">
            <div class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6">
                <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">

                    <?php if (isset($_SESSION['message'])) : ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Holy smokes!</strong>
                            <span class="block sm:inline">
                                <!-- <p>messi</p> -->
                                <?php

                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                                ?>
                            </span>
                        </div>
                    <?php endif ?>
                    <form class="mt-2" id="signup-form" method="post" autocomplete="off">

                        <!-- Name input -->
                        <div class="mb-6">
                            <input type="text" name="name" class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-orange-500 focus:outline-none" id="name" placeholder="Name" />
                            <div id="valid-name"></div>
                        </div>
                        <!-- Email input -->
                        <div class="mb-6">
                            <input type="text" name="email" class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-orange-500 focus:outline-none" id="email" placeholder="Email address" />
                            <div id="valid-email"></div>
                        </div>

                        <!-- Password input -->
                        <div class="mb-6">
                            <input type="password" name="password" class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-orange-500 focus:outline-none" id="password" placeholder="Password" />
                            <div id="valid-password"></div>
                        </div>

                        <!-- confirm Password input -->
                        <div class="mb-6">
                            <input type="password" name="confirm_password" class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-orange-500 focus:outline-none" id="confirm-password" placeholder="Confirm Password" />
                            <div id="valid-confirm-password"></div>
                        </div>


                        <div class="text-center lg:text-left">
                            <button name="submit" type="submit" class="inline-block px-7 py-3 bg-orange-500 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-orange-600 hover:shadow-lg focus:bg-orange-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-orange-700 active:shadow-lg transition duration-150 ease-in-out">
                                Sign up
                            </button>
                            <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                                Already have an account?
                                <a href="login.php" class="text-orange-500 hover:text-orange-600 focus:text-orange-600 transition duration-200 ease-in-out">Login</a>
                            </p>
                        </div>
                    </form>
                </div>
                <div class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0">
                    <img src="https://wallpaperaccess.com/full/1162901.jpg" class="w-full" />
                </div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script>
        let name = document.getElementById('name');
        let email = document.getElementById('email');
        let password = document.getElementById('password');
        let confirm_password = document.getElementById('confirm-password');

        name.addEventListener('input', function(e) {
            let value = e.target.value;
            let newValue = value.replace(/[^a-z ]/gi, '');
            e.target.value = newValue;
        });
        document.getElementById("signup-form").onsubmit = function(e) {
            /////// Validation of Name Input/////
            let name_valid = false
            if (name.value !== "" && name.value.length > 2) {
                name_valid = true;
            }
            if (name_valid === false) {
                e.preventDefault();
                document.getElementById('valid-name').innerHTML = "Please type your name";
                document.getElementById('valid-name').style.color = "red"
            } else {
                document.getElementById('valid-name').innerHTML = "";
            }
            /////// Validation of Email Input/////
            let email_valid = false
            let reg_exp = /^[^ ]+@[a-z]+\.[a-z]{2,3}$/;
            if (email.value.match(reg_exp)) {
                email_valid = true
            }
            if (email_valid === false) {
                e.preventDefault();
                document.getElementById('valid-email').innerHTML = "Please type your email correctly";
                document.getElementById('valid-email').style.color = "red"
            } else {
                document.getElementById('valid-email').innerHTML = "";
            }
            /////// Validation of password Input/////
            let password_valid = false
            if (password.value !== "" && password.value.length > 3) {
                name_valid = true;
            }
            if (name_valid === false) {
                e.preventDefault();
                document.getElementById('valid-password').innerHTML = "Please type a password";
                document.getElementById('valid-password').style.color = "red"
            } else {
                document.getElementById('valid-password').innerHTML = "";
            }
            /////// Validation of matching passwords/////
            let confirm_password_valid = false
            if (password.value == confirm_password.value) {
                confirm_password_valid = true
            }
            if (confirm_password_valid === false) {
                e.preventDefault();
                document.getElementById('valid-confirm-password').innerHTML = "Please type the same password you chose before";
                document.getElementById('valid-confirm-password').style.color = "red"
            } else {
                document.getElementById('valid-confirm-password').innerHTML = "";
            }
        }
    </script>
</body>

</html>