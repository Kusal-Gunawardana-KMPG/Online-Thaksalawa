<?php

require "connection.php";

if(isset($_GET["email"])){

    $student_email = $_GET["email"];

    $student_rs = Database::search("SELECT * FROM `student` WHERE `email`='".$student_email."'");
    $student_num = $student_rs->num_rows;

    if($student_num == 1){

        $student_data = $student_rs->fetch_assoc();

        if($student_data["status_id"] == 1){
            Database::iud("UPDATE `student` SET `status_id`= '2' WHERE `email`='".$student_email."'");
            echo ("blocked");
        }else if($student_data["status_id"] == 2){
            Database::iud("UPDATE `student` SET `status_id`= '1' WHERE `email`='".$student_email."'");
            echo ("unblocked");
        }

    }else{
        echo ("Cannot find the user. Please try again later.");
    }

}else{
    echo ("Something went wrong.");
}

?>