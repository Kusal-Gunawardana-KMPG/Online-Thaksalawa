<?php

require "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$password = $_POST["p"];
$mobile = $_POST["m"];
$gender = $_POST["g"];
$grade = $_POST["grd"];
$studentVcode = $_POST["verification"];


if (empty($studentVcode)) {
    echo ("Please Enter Your Verification Code");

}else{


    $student = Database::search("SELECT * FROM `student` WHERE `verification_code`='".$studentVcode."' AND `email`='".$email."'  ");
    $num = $student->num_rows;

    if($num == 1){
       
        echo ("Successfully Verified");

    }else{
        echo ("Invalid Verification Code.");
    }
    
}


?>

