<?php

require "connection.php";

session_start();

    $teachersigninemail = $_POST["teachersigninemail"];
    $teachersigninpassword = $_POST["teachersigninpassword"];

if(empty($teachersigninemail)){
    echo ("Please Enter Your Email Address");
}else if(!filter_var($teachersigninemail,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email address!");
}else if(empty($teachersigninpassword)) {
    echo ("Please Enter Your Password");
}else if(strlen($teachersigninpassword)<5 || strlen($teachersigninpassword)>20){
    echo ("Password length must be between 5 and 20!");
}else{

    $teacher = Database::search("SELECT * FROM `teacher` WHERE `email`='".$teachersigninemail."' AND  `password`='".$teachersigninpassword."' AND `status_id`='1' ");
    $num = $teacher->num_rows;

    if($num == 1){
        $data = $teacher->fetch_assoc();
        $_SESSION["teacher"] =$data;
        echo ("success");
    }else{
        echo ("Invalid Email Address or Password");
    }
   
}

?>