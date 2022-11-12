<?php
session_start();
$conn = mysqli_connect("localhost","root","","brief");
if (!$conn) {
    echo"shit";
}