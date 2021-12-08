<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

    if(isset($_POST['Register'])){
        include('../db.php');

        $username = $_POST['user'];
        $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $name = $_POST['name'];
        $phoneNumber = $_POST['phoneNumber'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $userType = $_POST['userType'];

        $query = mysqli_query($con,
            "INSERT INTO customer(username,password,nama,noTelp,alamat,email,userType)
            VALUES ('$username', '$password', '$name', '$phoneNumber', '$address', '$email', '$userType')")
            or die(mysqli_error($con));
        
            if($query){
                $mail = new PHPMailer();
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host ='smtp.gmail.com'; 
                $mail->SMTPAuth= true;
                $mail->Username ='wijayakevin147@gmail.com';
                $mail->Password   = 'ongkeingkevin12345';
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587; 
                $mail->setFrom('wijayakevin147@gmail.com', 'SUUPAMAKETO');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject='Subject';
                $mail->SMTPDebug = 0;
                $query=mysqli_query($con,"SELECT id FROM customer WHERE email='$email'");
                $data = mysqli_fetch_assoc($query);
                $mail->Body='Thank you for joining us at SUUPAMAKETO, to activate your account please click
                    http://localhost:8080/UTS_PAW_Project/Process/activationProcess.php?id='.$data['id'].'';
                $mail->send();
                echo '<script> window.location = "../index.php"; alert("Register Success") </script>';
            }else{
                echo '<script> window.location = "../Page/registerPage.php"; alert("Register Failed") </script>';
            }
    }else{
        echo
            ' <script> window.history.back() </script> ';
    }

?>