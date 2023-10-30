<?php

require "connection.php";

session_start();

    $verificationusername = $_POST["verificationusername"];
    $verificationpassword = $_POST["verificationpassword"];
    $verificationcode = $_POST["verificationcode"];

if(empty($verificationusername)){
    echo ("Please Enter Your Username");
}else if(empty($verificationpassword)) {
    echo ("Please Enter Your Password");
}else if(empty($verificationcode)) {
    echo ("Please Enter Your Verification Code");


}else{

    $teacher = Database::search("SELECT * FROM `teacher` WHERE `verification_code`='".$verificationcode."' AND `fname`='".$verificationusername."' AND `password`='".$verificationpassword."'");
    $num = $teacher->num_rows;

    if($num == 1){
        $data = $teacher->fetch_assoc();
        $_SESSION["teacher"] =$data;
        echo ("success");
    }else{
        echo ("Invalid Verification Code.");
    }
   
}

?>