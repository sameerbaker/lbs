<?php 
include('required/server.php'); 

 ?>
 <!DOCTYPE html>
<html lang="ar">
<head>
    <title>  Registry  </title>

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
                <form class="login100-form validate-form flex-sb flex-w" method="POST" enctype="multipart/form-data">
                
                    <span class="login100-form-title p-b-51">
                         <div class="col-lg-12 m-2">
                            <img src="assets/images.png" class="img-fluid" alt="" style="width: 25vh;">
                        </div>
                             <h2> LSB Encoder  </h2>
                    </span>
 

 
                    <div class="col-lg-12 p-1"> <?php display_error()  ?></div>
 
                    <div class="wrap-input100 validate-input m-b-16"  data-validate ="First Name Required">        
                        <input class="input100" type="text" name="fname" placeholder="  First Name   ">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16"  data-validate = "Second Name Required">        
                        <input class="input100" type="text" name="lname" placeholder=" Second name   ">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16"  data-validate = "Email is required">        
                        <input class="input100" type="email" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                    </div>

          
 
                  <div class="wrap-input100 validate-input m-b-16"  data-validate = "Password Required">        
                        <input class="input100 " type="password" name="password1" placeholder="Password">
                        <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-16"  data-validate = "confirm password is required">        
                    <input class="input100 " type="password" name="password2" placeholder="confirm password">
                    <span class="focus-input100"></span>
                </div> 
                    
                    <div class="flex-sb-m w-full p-t-3 p-b-24">
                       

           
                    </div>

                    <div class="container-login100-form-btn m-t-17">
                          <button type="submit" name="register" class="login100-form-btn"> Sign Up  </button>
  
                    </div>

                </form>

                 <br>
                 <div  >
                  <div class="form-group d-flex">
                   <a href="login.php" class="link-primary txt1"> <h5> sign in</h5></a>
                </div>
                   <div class="form-group d-flex">
                   <a href="RecoveryAcount.php" class="link-primary txt1"> <h4>Forgot your password </h4></a>
                </div>
 
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
 
 