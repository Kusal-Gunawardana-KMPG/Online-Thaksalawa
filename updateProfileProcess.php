<?php

session_start();

require "connection.php";

if (isset($_SESSION["student"])) {

    $fname = $_POST["fn"];
    $lname = $_POST["ln"];
    $mobile = $_POST["m"];


    Database::iud("UPDATE `student` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`mobile`='" . $mobile . "' 
            WHERE `email`='" . $_SESSION["student"]["email"] . "'");

    
    echo ("success");
    
} else {
    echo ("Please login first");
}
