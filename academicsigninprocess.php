<?php

require "connection.php";

session_start();

    $academicsigninemail = $_POST["academicsigninemail"];
    $academicsigninpassword = $_POST["academicsigninpassword"];
    
if(empty($academicsigninemail)){
    echo ("Please Enter Your Email Address");
}else if(!filter_var($academicsigninemail,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email address!");
}else if(empty($academicsigninpassword)) {
    echo ("Please Enter Your Password");
}else if(strlen($academicsigninpassword)<5 || strlen($academicsigninpassword)>20){
    echo ("Password length must be between 5 and 20!");
}else{

    $academics = Database::search("SELECT * FROM `academic_officer` WHERE `email`='".$academicsigninemail."' AND  `password`='".$academicsigninpassword."' AND `status_id`='1' ");
    $num = $academics->num_rows;

    if($num == 1){
        $data = $academics->fetch_assoc();
        $_SESSION["academic"] =$data;
        echo ("success");
    }else{
        echo ("Invalid Email Address or Password");
    }
   
}

?>