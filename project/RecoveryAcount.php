<?php 
include('required/server.php');
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['recover'])) {


        global $db, $errors;
 
        $email =  e($_POST['email']);
 
        if (empty($email)) { 
            array_push($errors, "Email is required"); 
        }else{

            $sql = "SELECT email FROM users WHERE email='$email' ";
            $result = mysqli_query($db, $sql);
     
            if ($result->num_rows == 0) {
                    array_push($errors, "There are no accounts associated with this Email.");
            }   
        }
   
        if (count($errors) == 0) {
        $length = 6;    
        $passwordGenrated =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
        $password = md5($passwordGenrated);
        ////////////////////////////////////////////
        $query = "UPDATE users set password = '".$password."' WHERE email='".$email."'";
         if (mysqli_query($db, $query)) {
            

                    $msg = '<div>
                    <p><strong><span dir="LTR"> 
                    Your password has been reset
                    You can use the following code
                    to encrypt the password
                    </span></strong></p>

                        <p>New Password   :</p>

                        <p>'.$passwordGenrated.'</p>

 
 
                        <p>  Date   :</p>
                        <p>'.date("Y-m-d").'</p>
             
                        </div>';
                 
                  $mail = new PHPMailer(true);

                    try {
                        $mail->isSMTP();                                           
                        $mail->Host       = 'smtp.gmail.com';                     
                        $mail->SMTPAuth   = true;                                  
                        $mail->Username   = 'electricitygaza23@gmail.com';                   
                        $mail->Password   = 'fnfvbbulryiowtvt';                            
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         
                        $mail->Port       = 465;                                   
                        $mail->CharSet = 'UTF-8';
                        $mail->SMTPDebug = 0;
                        $mail->setFrom('electricitygaza23@gmail.com', 'LSB System');
                        $mail->addAddress($email, 'LSB System');    
                        $mail->isHTML(true);                                 
                        $mail->Subject = 'New Password';
                        $mail->Body = $msg;
                        $mail->send();
                        array_push($errors, " The account password reseted successful chick your Email");

                      } catch (Exception $e) {
                          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                      }
                 
         }
        }

 } 

 ?>
 <!DOCTYPE html>
<html lang="en"  >
<head>
    <title>   Login   </title>

         <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link href="assets/img/favicon.png" rel="icon">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/css/util.css">
    <link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-50 p-b-90">
                <form class="login100-form validate-form flex-sb flex-w" method="POST">
                    
                    <span class="login100-form-title p-b-51">
                         <div class="col-lg-12 m-2">
                            <img src="assets/images.png" class="img-fluid" alt="" style="width: 25vh;">
                        </div>
                             <h2> LSB Encoder  </h2>
                    </span>
  
                    <div class="col-lg-12 p-1"> <?php display_error()  ?></div>
                    <div class="wrap-input100 validate-input m-b-16">        
                        <input class="input100" type="text" name="email" placeholder="Your Email">
                        <span class="focus-input100"></span>
                    </div>
     
 
                    <div class="container-login100-form-btn m-t-17">
                          <button type="submit" name="recover" class="login100-form-btn">Recover</button>
  
                    </div>

                </form>

                 <br>
                 <div class="form-group d-flex">
                   <a href="login.php" class="link-primary txt1"> <h4>I have Acount (Login) </h4></a>
                </div>
 
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    <script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="login/vendor/bootstrap/js/popper.js"></script>
    <script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="login/vendor/daterangepicker/moment.min.js"></script>
    <script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="login/js/main.js"></script>

</body>
</html>