<!DOCTYPE html>
<base href="<?php echo base_url();?>">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!-- All the files that are required -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link href="css/login/login.css" rel="stylesheet">
<link rel="icon" type="image/png" sizes="42x42" href="img/logo2.png">
<title>Torreon Market</title>

<!-- Where all the magic happens -->
<!-- LOGIN FORM -->
<div class="text-center" style="padding:50px 0">
    <center>
        <img src="img/logo_l.png"  width="200" height="200 alt="">
    </center>
 
    <?php $resp= $this->session->flashdata('resp'); ?>
    <?php if ($resp !="") { ?>
        <div class="alert alert-danger" role="alert"><?php echo $resp ?></div>
    <?php } ?>
    <div class="logo">Iniciar sesión</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="login-form" class="text-left" action="<?php echo site_url('eltorreon/login') ?>" method="post">

            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">

                    <div class="form-group">
                        <label for="Usuario" class="sr-only">Usuario</label>
                        <input type="text" class="form-control" id="Usuario" name="Usuario" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="Password" class="sr-only">Password</label>
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
                    </div>
                    <div class="form-group login-group-checkbox">
                        <input type="checkbox" id="lg_remember" name="lg_remember">
                        <label for="lg_remember">remember</label>
                    </div>
                </div>
                <button name="Enviar" id="Enviar" type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
            </div>
            <div class="etc-login-form">
                <p style="color:#000000";>Olvidaste tu contraseña? <a href="#">click here</a></p>   
            </div>
        </form>
    </div>
    <!-- end:Main Form -->
</div>



<!-- FORGOT PASSWORD FORM -->
<!-- <div class="text-center" style="padding:50px 0">
    <div class="logo">forgot password</div>
     Main Form -->
  <!--   <div class="login-form-1">
        <form id="forgot-password-form" class="text-left">
            <div class="etc-login-form">
                <p>When you fill in your registered email address, you will be sent instructions on how to reset your password.</p>
            </div>
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="fp_email" class="sr-only">Email address</label>
                        <input type="text" class="form-control" id="fp_email" name="fp_email" placeholder="email address">
                    </div>
                </div>
                <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
            </div>
            <div class="etc-login-form">
                <p>already have an account? <a href="#">login here</a></p>
                <p>new user? <a href="#">create new account</a></p>
            </div>
        </form>
    </div> -->
    <!-- end:Main Form 
</div> -->

<script src="js/login/login.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>