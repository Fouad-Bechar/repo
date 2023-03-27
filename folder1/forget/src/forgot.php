<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'mailer/autoload.php';
   require_once __DIR__.'/../config/config.php';
    if(isset($_POST['email']) && !empty($_POST['email'])) {
        $email = htmlspecialchars($_POST['email']);
        $check = $bdd->prepare('SELECT token FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        if($row){
            $token = bin2hex(openssl_random_pseudo_bytes(24));
            $token_user = $data['token'];
            $insert = $bdd->prepare('INSERT INTO password_recover (token_user, token) VALUES(?,?)' );
            $insert->execute(array($token_user, $token));
            $link = 'recover.php?u='.base64_encode($token_user).'&token='.base64_encode($token);
            $link1 = "<a href='$link'>Click on the link to reset your password</a>";
            echo "<center>"."<h1 style='color:darkgreen; margin-top: 100px'>"."We have sent a password reset link to your email"."</h1>"."</center>"; }
         else{
            echo "<center>"."<h1 style='color:red; margin-top: 100px'>"."Account not existing"."</h1>"."</center>"; 
             header("Refresh: 3;"."URL=". $_SERVER['HTTP_REFERER']);
             exit; }
          
if($row) {
$mesg = $link1;
$subj = '';
$mail = new PHPMailer();                 
$mail->isSMTP();                                           
$mail->Host = 'smtp.gmail.com';                    
$mail->SMTPAuth = true;                                   
$mail->Username = '';                   
$mail->Password = '';                              
$mail->SMTPSecure = 'ssl'; 
$mail->Port = 465;                                    
$mail->isHTML(true); 
$mail->CharSet = "UTF-8";
$mail->setFrom('', '');
$mail->addAddress($email);
$mail->Subject = $subj;
$mail->Body = $mesg;
$mail->send();    
 } }
