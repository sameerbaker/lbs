<?php 
include('required/server.php');
?>
 <!DOCTYPE html>
<html lang="en"  >
<head>
    <title>   Login   </title>

         <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <style>
        html, body {
            height: 100%;
            overflow: hidden;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #1b1b26;
        }

        .coder-logo-animation {
            position: relative;
            height: 190px;
            width: 250px;
            animation: coder-logo 2s infinite cubic-bezier(0.80, 0, 0.20, 1);
            transform-origin: center center;
        }

        .left, .right {
            position: absolute;
        }

        .left {
            top: 115px;
            left: 26px;
            transform: rotate(-45deg);
        }

        .left div {
            position: absolute;
            background: #00aeef;
            width: 35px;
            height: 100px;
        }

        .left div:nth-child(2) {
            height: 125px;
        }

        .left .part-1 {
            animation: l-part-1 2s infinite cubic-bezier(0.80, 0, 0.20, 1);
        }

        .left .part-2 {
            top: 1px;
            transform-origin: 0 0;
            transform: rotate(-90deg);
            animation: l-part-2 2s infinite cubic-bezier(0.80, 0, 0.20, 1);
        }

        .left .part-3 {
            left: 90px;
            animation: l-part-3 2s infinite cubic-bezier(0.80, 0, 0.20, 1);
        }

        .right {
            top: 94px;
            left: 68px;
            transform: rotate(-45deg);
        }

        .right div {
            position: absolute;
            background: #00aeef;
            width: 35px;
            height: 100px;
        }

        .right div:nth-child(2) {
            height: 125px;
        }

        .right .part-1 {
            animation: r-part-1 2s infinite cubic-bezier(0.80, 0, 0.20, 1);
        }

        .right .part-2 {
            top: 129px;
            transform-origin: 0 0;
            transform: rotate(-90deg);
            animation: r-part-2 2s infinite cubic-bezier(0.80, 0, 0.20, 1);
        }

        .right .part-3 {
            left: 90px;
            animation: r-part-3 2s infinite cubic-bezier(0.80, 0, 0.20, 1);
        }

        @keyframes coder-logo {
            0% { transform: scale(1) rotate(0); }
            20% { transform: scale(1) rotate(0); }
            80% { transform: scale(1) rotate(360deg);  }
            100% { transform: scale(1) rotate(360deg);  }
        }

        @keyframes l-part-1 {
            0% { left: 0; }
            20% { left: 0; }
            50% { left: -15px; }
            80% { left: 0; }
            100% { left: 0; }
        }

        @keyframes l-part-2 {
            0% { top: 5px; }
            20% { top: 5px; }
            50% { top: -14px; }
            80% { top: 5px; }
            100% { top: 5px; }
        }

        @keyframes l-part-3 {
            0% { left: 90px; }
            20% { left: 90px; }
            50% { left: 94px; }
            80% { left: 90px; }
            100% { left: 90px; }
        }

        @keyframes r-part-1 {
            0% { left: 0; }
            20% { left: 0; }
            50% { left: -4px; }
            80% { left: 0; }
            100% { left: 0; }
        }

        @keyframes r-part-2 {
            0% { top: 130px; }
            20% { top: 130px; }
            50% { top: 144px; }
            80% { top: 130px; }
            100% { top: 130px; }
        }

        @keyframes r-part-3 {
            0% { left: 90px; }
            20% { left: 90px; }
            50% { left: 105px; }
            80% { left: 90px; }
            100% { left: 90px; }
        }



    </style>
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
                             <div class="coder-logo-animation">
                                <div class="left">
                                 <div class="part-1"></div>
                                 <div class="part-2"></div>
                                 <div class="part-3"></div>
                                </div>
                                <div class="right">
                                 <div class="part-1"></div>
                                 <div class="part-2"></div>
                                <div class="part-3"></div>
                                </div>

                         </div>
<!--<img src="assets/images.png" class="img-fluid" alt="" style="width: 25vh;">-->
                        </div>
                             <h2> <br> LSB Encoder  </h2>
                    </span>
 
 

                    <div class="col-lg-12 p-1"> <?php display_error()  ?></div>
                    <div class="wrap-input100 validate-input m-b-16"  data-validate = "Email is required">        
                        <input class="input100" type="text" name="username" placeholder="Email">
                        <span class="focus-input100"></span>
                    </div>
                    
                    
                    <div class="wrap-input100 validate-input m-b-16" data-validate = " Password is required   ">
                        <input class="input100" type="password" name="password" placeholder=" Password ">
                        <span class="focus-input100"></span>
                    </div>
                    
                    <div class="flex-sb-m w-full p-t-3 p-b-24">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                remember me 
                            </label>
                        </div>
 
                    </div>

                    <div class="container-login100-form-btn m-t-17">
                          <button type="submit" name="login_btn" class="login100-form-btn">Lets Go </button>
  
                    </div>

                </form>

                 <br>
                 <div class="form-group d-flex">
                   <a href="Registry.php" class="link-primary txt1"> <h4>Register a new user </h4></a>
                </div>
                 <div class="form-group d-flex">
                   <a href="RecoveryAcount.php" class="link-primary txt1"> <h4>Forgot your password </h4></a>
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