<?php
session_start();
include("connect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require 'src/Exception.php';
// require 'src/PHPMailer.php';
// require 'src/SMTP.php';

require 'vendor/autoload.php';

function send_password_reset($get_name,$get_email,$token)
{

   $mail = new PHPMailer(true);
   $mail -> isSMTP();
   $mail -> SMTPAuth = true;

   $mail->Host = "localhost";
   $mail->Username = "root";
   $mail->Password = "";

   $mail->SMTPSecure = "tls";
   $mail->Port = 587;

   $mail->setFrom("root",$get_name);
   $mail->addAddress($get_email);
 $mail->addReplyTo($get_email);
   

   $mail->isHTML(true);
   $mail->Subject = "reset password Notification";

   $email_template = "
   <h2> Hello </h2>
   <h3> this is email for reseting your password </h3>
   <br/> <br/>

   <a href='http://localhost/php/team/forget_password_mail.php?token=$token&email=$get_email'>click Me</a>
   ";

   $mail->Body = $email_template;
   $mail->send();

}

if(isset($_POST['send_email']))
{
   $email = mysqli_real_escape_string($con , $_POST['email']);
   $token = md5(rand());

   $check_email = "SELECT * FROM admin WHERE email = '$email' LIMIT 1";
   $check_email_run = mysqli_query($con , $check_email);

   if(mysqli_num_rows($check_email_run) > 0)
   {


      $row = mysqli_fetch_assoc($check_email_run);
      $get_name = $row['user_name'];
      $get_email = $row['email'];

      $update_token = "UPDATE admin SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
      $update_token_run = mysqli_query($con , $update_token);

      if($update_token_run)
      {

         send_password_reset($get_name,$get_email,$token);
         $_SESSION['agree'] = '<span style="color:green">check on email </span>';
         header("Location : forget_password.php");
         exit(0);
      }
      else
      {
      $_SESSION['agree'] = "something went wrong. #1";
      header("Location : forget_password.php");
      exit(0);

      }

   }
   else
   {
      $_SESSION['agree'] = '<span style="color:red">no such email found!'."<br/>"."<br/>";
      header("Location : forget_password.php");
      exit(0);
   }
}


?>