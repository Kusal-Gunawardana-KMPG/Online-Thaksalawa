<?php

session_start();

require "connection.php";

if (isset($_SESSION["teacher"])) {

    $fname = $_POST["fn"];
    $lname = $_POST["ln"];
    $mobile = $_POST["m"];
    $password = $_POST["p"];



    Database::iud("UPDATE `teacher` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`mobile`='" . $mobile . "',`password`='".$password."'  
            WHERE `email`='" . $_SESSION["teacher"]["email"] . "'");

    
    echo ("success");
    
} else {
    echo ("Please login first");
}
