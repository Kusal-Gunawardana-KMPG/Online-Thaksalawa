<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST["adminemail"])){
    $email = $_POST["adminemail"];

    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='".$email."'");
    $admin_num = $admin_rs->num_rows;

    if($admin_num > 0){

        $code = uniqid();

        Database::iud("UPDATE `admin` SET `verification_code`='".$code."' WHERE `email`='".$email."'");

        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kgunawardana942@gmail.com';
            $mail->Password = 'jdaovyhomyfgegsp';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('kgunawardana942@gmail.com', 'Admin Verification');
            $mail->addReplyTo('kgunawardana942@gmail.com', 'Admin Verification');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Online Thaksalawa Admin Login Verification Code';
            $bodyContent = '<h1 style="color:maroon;">Your Verification Code is '.$code.'</h1>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending failed';
            } else {
                echo 'success';
            }

    }else{
        echo ("You are not a valid user");
    }

}else{
    echo ("Email field should not be empty.");
}

?>