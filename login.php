<?php
require 'database.php';
if (!empty($_SESSION["id"])) {
    # code...
    header("location: index.php");
}
    if (isset($_POST["submit"])) {
        # code...
        $login_email = $_POST["login_email"];
        $login_password = $_POST["login_password"];
        $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$login_email'");
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result)>0) {
            # code...
            if ($row['password'] == $login_password ) {
                # code...
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                header("location: index.php");
            }else {
                echo "<script> alert('incorrect password'); </script>";
            }
        }else {
            # code...
            echo "<script> alert('email doesnt exist'); </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
    <nav class="container mx-auto bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="login.php" class="flex items-center">
            <img src="https://i.ibb.co/Q6Z8h05/Music-Me.png" class="mr-3 h-6 sm:h-16" alt="Logo">
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Music Me</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
                <a href="#" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-orange-500 md:p-0 dark:text-white" aria-current="page">Home</a>
            </li>
            <li>
                <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
            </li>
            <li>
                <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
            </li>
            <li>
                <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
            </li>
            <li>
                <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
  
    <section class="container mx-auto mt-10">
        <div class="px-6 h-full text-gray-800">
            <div
            class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6"
            >
            <div
                class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0"
            >
                <img
                src="https://wallpaperaccess.com/full/1162901.jpg"
                class="w-full"
                
                />
            </div>
            <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">
                <form method="post" autocomplete="off">

                    <!-- Email input -->
                    <div class="mb-6">
                        <input
                        type="text"
                        name="login_email"
                        class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-orange-500 focus:outline-none"
                        id="exampleFormControlInput2"
                        placeholder="Email address"
                        />
                    </div>

                    <!-- Password input -->
                    <div class="mb-6">
                        <input
                        type="password"
                        name="login_password"
                        class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-orange-500 focus:outline-none"
                        id="exampleFormControlInput2"
                        placeholder="Password"
                        />
                    </div>

                    <div class="flex justify-between items-center mb-6">
                        <div class="form-group form-check">
                        <input
                            type="checkbox"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-orange-500 checked:border-orange-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            id="exampleCheck2"
                        />
                        <label class="form-check-label inline-block text-gray-800" for="exampleCheck2"
                            >Remember me</label
                        >
                        </div>
                        <a href="#!" class="text-gray-800">Forgot password?</a>
                    </div>

                    <div class="text-center lg:text-left">
                        <button
                        type="submit"
                        name="submit"
                        class="inline-block px-7 py-3 bg-orange-500 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-orange-600 hover:shadow-lg focus:bg-orange-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-orange-700 active:shadow-lg transition duration-150 ease-in-out"
                        >
                        Login
                        </button>
                        <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                        Don't have an account?
                        <a
                            href="signup.php"
                            class="text-orange-500 hover:text-orange-600 focus:text-orange-600 transition duration-200 ease-in-out"
                            >Register</a
                        >
                        </p>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
</body>
</html>