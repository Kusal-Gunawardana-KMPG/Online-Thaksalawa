<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";


$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$password = $_POST["p"];
$mobile = $_POST["m"];
$gender = $_POST["g"];
$grade = $_POST["grd"];


use PHPMailer\PHPMailer\PHPMailer;





if (empty($fname)) {
    echo ("Please enter your First Name!");
} else if (strlen($fname) > 50) {
    echo ("First Name must have LESS THAN 50 characters!");
}else if (empty($lname)) {
    echo ("Please enter your Last Name!");
} else if (strlen($lname) > 50) {
    echo ("Last Name must have LESS THAN 50 characters!");
}else if (empty($email)){
    echo ("Please enter your Email !!!");
}else if(strlen($email) >= 100){
    echo ("Email must have less than 100 characters");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email !!!");
}else if (empty($password)){
    echo ("Please enter your Password !!!");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo ("Password must be between 5 - 20 charcters");
}else if(empty($mobile)){
    echo ("Please enter your Mobile Number!");
}else if(strlen($mobile) != 10){
    echo ("Mobile Number must contain 10 characters");
}else if(!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$mobile)){
    echo ("Invalid Mobile Number!");
}else{

$rs = Database::search("SELECT * FROM `student` WHERE `email`='".$email."' OR 
`mobile`='".$mobile."'");
$n = $rs->num_rows;

if($n > 0){
    
    echo ("User with the same Email or Mobile already exists.");


}else{    

    echo ("You Will Receive a Verification Code From Academic Officer. Checkout Your Email Now");

    if($email = $_POST["e"]){
    

    

        $code = uniqid();

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kgunawardana942@gmail.com';
            $mail->Password = 'jdaovyhomyfgegsp';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('kgunawardana942@gmail.com', 'Student Verification');
            $mail->addReplyTo('kgunawardana942@gmail.com', 'Student Verification');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Online Thaksalawa Student Verification Process';
            $bodyContent = '<h1 style="color:Maroon; text-align:center;">Congratulations....!!!<br>You Have Successfully Completed the Registration Process</h1><br><h2>Your Verification Code is <b style="color:blue;"> '.$code.'</b></h2>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending failed';
            } 


}else{
    echo ("Email Field Should Not Be Empty.");
}
    
$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

Database::iud("INSERT INTO `student` 
(`fname`,`lname`,`email`,`password`,`mobile`,`joined_date`,`status_id`,`gender_id`,`grade_grade_id`,`verification_code`)
VALUES ('".$fname."','".$lname."','".$email."','".$password."','".$mobile."',
'".$date."','1','".$gender."','".$grade."','".$code."')");



}
    
}

?>
