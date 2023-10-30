<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

    $email = $_POST["academicssignupemail"];
    $academicsusername = $_POST["academicsusername"];
    $academicspassword = $_POST["academicspassword"];

    $academicsrs = Database::search("SELECT * FROM `academic_officer` WHERE `email`='".$email."' OR 
`fname`='".$academicsusername."' OR `password`='".$academicspassword."'");
$n = $academicsrs->num_rows;

if(empty($email)){

    echo ("Email Field Should Not Be Empty.");

}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email address!");

}else if($n > 0){
    echo ("You Have Already Registered with Us ? ? ? Please SignIn.....!!!");

}else{

    
    $academicscode = uniqid();
    

        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kgunawardana942@gmail.com';
            $mail->Password = 'jdaovyhomyfgegsp';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('kgunawardana942@gmail.com', 'Academic Officer Verification');
            $mail->addReplyTo('kgunawardana942@gmail.com', 'Academic Officer Verification');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Online Thaksalawa Academic Officer Verification Process';
            $bodyContent = '<div style="text-align:center;"><h1 style="color:brown; text-align:center;">Academic Officer Verification Process</h1>
            <br>
            <h2>Your Username is <b style="color:orange;"> '.$academicsusername.'</b></h2>
            <h2>Your Password is <b style="color:maroon;"> '.$academicspassword.'</b></h2>
            <h2>Your Verification Code is <b style="color:blue;"> '.$academicscode.'</b></h2></div>';
            $mail->Body    = $bodyContent;


            $d = new DateTime();
                $tz = new DateTimeZone("Asia/Colombo");
                $d->setTimezone($tz);
                $date = $d->format("Y-m-d H:i:s");

                    Database::iud("INSERT INTO `academic_officer` (`fname`,`password`,`joined_date`,`verification_code`,`gender_id`,`email`,`status_id`)
                    VALUES ('".$academicsusername."','".$academicspassword."','".$date."','".$academicscode."','1','".$email."','1')");

            if (!$mail->send()) {
                echo 'Verification Code Sending Failed';
            } else {
                echo ("success");

            }

}


?>