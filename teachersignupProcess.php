<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

    $email = $_POST["teachersignupemail"];
    $teacherusername = $_POST["teacherusername"];
    $teacherpassword = $_POST["teacherpassword"];

    $teacherrs = Database::search("SELECT * FROM `teacher` WHERE `email`='".$email."' OR 
`fname`='".$teacherusername."' OR `password`='".$teacherpassword."'");
$n = $teacherrs->num_rows;

if(empty($email)){

    echo ("Email field should not be empty.");

}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email address!");

}else if($n > 0){
    echo ("You Have Already Registered with Us ? ? ? Please SignIn.....!!!");

}else{

    
    $teachercode = uniqid();
    

        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kgunawardana942@gmail.com';
            $mail->Password = 'jdaovyhomyfgegsp';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('kgunawardana942@gmail.com', 'Teacher Verification');
            $mail->addReplyTo('kgunawardana942@gmail.com', 'Teacher Verification');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Online Thaksalawa Teacher Verification Process';
            $bodyContent = '<div style="text-align:center;"><h1 style="color:gray; text-align:center;">Teacher Verification Process</h1>
            <br>
            <h2>Your Username is <b style="color:blue;"> '.$teacherusername.'</b></h2>
            <h2>Your Password is <b style="color:maroon;"> '.$teacherpassword.'</b></h2>
            <h2>Your Verification Code is <b style="color:maroon;"> '.$teachercode.'</b></h2></div>';
            $mail->Body    = $bodyContent;


            $d = new DateTime();
                $tz = new DateTimeZone("Asia/Colombo");
                $d->setTimezone($tz);
                $date = $d->format("Y-m-d H:i:s");

                    Database::iud("INSERT INTO `teacher` (`fname`,`password`,`joined_date`,`verification_code`,`gender_id`,`email`,`status_id`,grade_grade_id)
                    VALUES ('".$teacherusername."','".$teacherpassword."','".$date."','".$teachercode."','1','".$email."','1','13')");

            if (!$mail->send()) {
                echo ("Verification code sending failed");
            } else {
                echo ("success");
            }

}

?>