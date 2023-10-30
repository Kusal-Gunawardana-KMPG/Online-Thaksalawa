<?php

require "connection.php";

if(isset($_GET["email"])){

    $academics_email = $_GET["email"];

    $academics_rs = Database::search("SELECT * FROM `academic_officer` WHERE `email`='".$academics_email."'");
    $academics_num = $academics_rs->num_rows;

    if($academics_num == 1){

        $academics_data = $academics_rs->fetch_assoc();

        if($academics_data["status_id"] == 1){
            Database::iud("UPDATE `academic_officer` SET `status_id`= '2' WHERE `email`='".$academics_email."'");
            echo ("blocked");
        }else if($academics_data["status_id"] == 2){
            Database::iud("UPDATE `academic_officer` SET `status_id`= '1' WHERE `email`='".$academics_email."'");
            echo ("unblocked");
        }

    }else{
        echo ("Cannot find the user. Please try again later.");
    }

}else{
    echo ("Something went wrong.");
}

?>