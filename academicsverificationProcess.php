<?php

require "connection.php";

session_start();

    $academicsverificationusername = $_POST["academicsverificationusername"];
    $academicsverificationpassword = $_POST["academicsverificationpassword"];
    $academicsverificationcode = $_POST["academicsverificationcode"];

if(empty($academicsverificationusername)){
    echo ("Please Enter Your Username");
}else if(empty($academicsverificationpassword)) {
    echo ("Please Enter Your Password");
}else if(empty($academicsverificationcode)) {
    echo ("Please Enter Your Verification Code");


}else{

    $academics = Database::search("SELECT * FROM `academic_officer` WHERE `verification_code`='".$academicsverificationcode."' AND `fname`='".$academicsverificationusername."' AND `password`='".$academicsverificationpassword."'");
    $num = $academics->num_rows;

    if($num == 1){
        $data = $academics->fetch_assoc();
        $_SESSION["academic"] = $data;

        echo ("success");
    }else{
        echo ("Invalid Verification Code.");
    }
   
}

?>