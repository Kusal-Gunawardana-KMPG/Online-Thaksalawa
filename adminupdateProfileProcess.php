<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

    $fname = $_POST["fn"];
    $lname = $_POST["ln"];
    $mobile = $_POST["m"];
    $password = $_POST["p"];



    Database::iud("UPDATE `admin` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`mobile`='" . $mobile . "',`password`='".$password."'  
            WHERE `email`='" . $_SESSION["au"]["email"] . "'");

    
    echo ("success");
    
} else {
    echo ("Please login first");
}
