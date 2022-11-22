<?php
// require 'database.php';
include 'crud.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user where id = '$id'");
    $row = mysqli_fetch_assoc($result);
} else {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Side</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
        * {
            box-sizing: border-box;
        }
    </style>
</head>

<body>

    <nav class="bg-white  border-gray-200 px-2 sm:px-4  rounded dark:bg-gray-900">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="login.php" class="flex items-center">
                <img src="https://i.ibb.co/Q6Z8h05/Music-Me.png" class="mr-3 " style="height: 30px;" alt="Logo">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Music Me</span>
            </a>
            <div class="flex items-center md:order-2">
                <button type="button" class="flex mr-3 text-sm  rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>

                </button>
                <!-- Dropdown menu -->
                <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 265px);">
                    <div class="py-3 px-4">
                        <span class="block text-sm text-gray-900 dark:text-white"><?php echo $row["name"]; ?></span>
                        <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400"><?php echo $row["email"]; ?></span>
                    </div>
                    <ul class="py-1" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                        </li>
                        <li>
                            <a href="logout.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                        </li>
                    </ul>
                </div>
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                    <!-- <span class="sr-only">Open main menu</span> -->
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
                <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-white bg-orange-500 rounded md:bg-transparent md:text-orange-500 md:p-0 dark:text-white" aria-current="page">Home</a>
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
    <!-- SECTION -->
    <section class="container mx-auto">
        <div class="bg-orange-500 p-4 flex align-center justify-between">
            <div>
                <div class=" relative ">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Search icon</span>
                    </div>
                    <input type="text" id="search-navbar" onkeyup="search()" class="block p-2 pl-10 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
                </div>
            </div>

            <button onclick="addProduct()" class="block  sm:mx-0 text-white  sm:mt-0 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
                <i class="bi bi-plus-lg"></i> Add Product
            </button>
        </div>
    </section>
    <div class="container p-2   flex mx-auto">
        <div style="box-shadow: -1px 10px 15px -3px rgba(0,0,0,0.27);" class=" p-2 flex mr-2 items-center">
            <div class="p-2">
                <h3 class="italic ">Total users</h3>
                <p class="text-2xl">
                    <?php
                    $query = "SELECT * from tb_user";
                    $data = mysqli_query($conn, $query);
                    $user_num = mysqli_num_rows($data);
                    echo $user_num;
                    ?>
                </p>
            </div>

            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-20  h-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
            </span>
        </div>
        <div style="box-shadow: -1px 10px 15px -3px rgba(0,0,0,0.27);" class="drop-shadow-2xl p-2  flex items-center">
            <div class="p-2">
                <h3 class="italic ">Total products</h3>
                <p class="text-2xl">
                    <?php
                    $query = "SELECT * from products";
                    $data = mysqli_query($conn, $query);
                    $user_num = mysqli_num_rows($data);
                    echo $user_num;
                    ?>
                </p>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-20  h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
        </div>
    </div>
    <?php if (isset($_SESSION['product'])) : ?>
        <div class="container mx-auto bg-green-100 border mt-3 border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Nice!</strong>
            <span class="block sm:inline">

                <?php

                echo $_SESSION['product'];
                unset($_SESSION['product']);
                ?>
            </span>
        </div>
    <?php endif ?>
    <main class=" container w-full mx-auto flex flex-wrap mt-2 ">

        <?php
        $data = reloadProduct();
        while ($row = mysqli_fetch_assoc($data)) {
            echo "
            <div id='{$row['id']}' data-name='{$row['name']}' data-price='{$row['price']}' data-category='{$row['category_id']}' data-quantity='{$row['quantity']}' data-details='{$row['details']}' data-image='{$row['image']}' >
            </div>
            <div class='xs:w-full mx-auto md:mx-0 sm:w-1/2 lg:w-1/4 for-search-use  bg-white mb-2 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700'>
                <div class=''>
                    <img class=' h-28 rounded-t-lg mx-auto' src='img/{$row['image']}' alt=''>
                </div>
                <div class='p-5'>
                    <a href='product.php?view_id={$row['id']}'>
                        <h5 class='mb-2 truncate text-2xl font-bold tracking-tight text-gray-900 dark:text-white'>{$row['name']}</h5>
                    </a>
                    <p title ='{$row['details']}' class='mb-3 max-w-sm font-normal text-gray-700 dark:text-gray-400'>" . substr($row['details'], 0, 40) . "</p>
                    <div class='inline-flex rounded-md shadow-sm' role='group'>
                        <button type='button' class='py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-yellow-300 hover:text-black focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white'>
                            <a href='product.php?view_id={$row['id']}'>View</a>
                        </button>
                        <button onclick='update({$row['id']})' data-modal-toggle='defaultModal' type='button' class='py-2 px-4 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-red-500 hover:text-black focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white'>
                            Edit
                        </button>
                        <button onclick='confirmId({$row['id']})' data-modal-toggle='popup-modal' onclick='' type='button' class='py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-green-500 hover:text-black focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white'>
                            Delete
                        </button>
                    </div>
                </div>
            </div>
            ";
        }
        ?>


        <!-- MODAL -->
        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <form id="product-form" action="crud.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                            <h3 id="modal-title" class="text-xl font-semibold text-gray-900 dark:text-white">
                                Add product
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-3 space-y-6">
                            <div class=" block md:flex justify-between">
                                <div class="mb-2 w-full md:w-1/2">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">
                                        Name
                                    </label>
                                    <input id="product-name" name="name" class=" shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" required>
                                </div>
                                <div class="mb-2 w-full md:w-1/2 md:ml-2 ">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">
                                        Price
                                    </label>
                                    <input id="product-price" name="price" class=" shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" type="text" required>
                                </div>
                            </div>
                            <div class="block md:flex justify-between">
                                <div class="md:w-1/2">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                                    <select id="product-category" name="category" id="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                        <option selected disabled>Please select an option</option>
                                        <option value="1">Guitars</option>
                                        <option value="2">Drums</option>
                                        <option value="3">Piano</option>
                                        <option value="4">Orchestral</option>
                                        <option value="5">Other Category</option>
                                    </select>
                                </div>
                                <div class="mb-2 w-full md:w-1/2 md:ml-2 ">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">
                                        Quantity
                                    </label>
                                    <input id="product-quantity" name="quantity" class=" shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="quantity" type="text" required>
                                </div>
                            </div>
                            <div style="margin: 0;">
                                <img id="product-img" class="w-32 mx-auto" src="" alt="">
                            </div>
                            <div class="m-0">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Upload file</label>
                                <input name="image" type="file" id="file_input" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" accept=".jpg, .png, .svg">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Details</label>
                                <textarea id="product-details" name="details" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="The details are..." required></textarea>
                            </div>
                            <input type="hidden" name="editId" id="edit-id" value="">
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <button id="task-save-btn" name="addproduct" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add product</button>
                            <button id="update-btn" name="updateproduct" type="submit" class="text-white bg-orange-400 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-400 dark:hover:bg-orange-400 dark:focus:ring-orange-400">Update product</button>
                            <button data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- delete confirmation -->

        <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 md:inset-0 h-modal md:h-full">
            <div class="relative w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <form action="crud.php" method="POST">
                            <input name="id" id="input-hidden" type="hidden" value="">
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                            <button name="delete" data-modal-toggle="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </button>
                            <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <script>
        function search() {
            var filter = document.getElementById('search-navbar').value.toUpperCase();
            var item = document.querySelectorAll('.for-search-use');
            let l = document.getElementsByTagName('h5');
            console.log(l)

            for (let i = 0; i < l.length; i++) {
                let a = l[i];
                let value = a.innerHTML || a.innerText || a.innerContent;
                console.log(value)
                if (value.toUpperCase().indexOf(filter) > -1) {
                    item[i].style.display = "";
                } else {
                    item[i].style.display = "none";

                }
            }
        }
    </script>
    <script src="main.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
</body>

</html>