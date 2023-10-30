<?php

require "connection.php";

session_start();


$email = $_POST["e"];
$password = $_POST["p"];

if(empty($email)){
    echo ("Please enter your Email");
}else if(strlen($email) > 100){
    echo ("Email must have less than 100 characters");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email");
}else if(empty($password)){
    echo ("Please enter your Password");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo ("Invalid Password");
}else{

    $rs = Database::search("SELECT * FROM `student` WHERE `email`= '".$email."' AND `password`= '".$password."' AND `status_id`= '1' ");
    $n = $rs->num_rows;

    if($n == 1){

       
        $d = $rs->fetch_assoc();
        $_SESSION["student"] = $d;

        echo ("success");


    }else{

        echo ("Invalid Username or Password");

    }

     
}

?>