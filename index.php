<?php
if (isset($_SESSION['user'])) {
 header('location:home.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WTMS</title>
    <link rel="stylesheet" href="https://cdns.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/css/bootstrap.min.css">
   <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
   

<div class="container">
    <!-- Login form  start -->
        <div class="row justify-content-center  wrapper" id="login-box">
            <div class="col-lg-10 my-auto">
                <div class="card-group myShadow">
                    <div class="card rounded-left p-4" style="flex-grow: 1.4;">
                       <h1 class= "text-center font-weight-bold text-primary "> Sign In To WTMS</h1>
                        <hr class="my-3">

                        <form action="" method="post" class="px-3" id="login-form">
                         <div id="loginAlert"></div>
                            <!-- email -->
                            <div class="input-group input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                      <i class="far fa-envelope fa-lg"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" id="email" class="form-control rounded-0"   placeholder="E-Mail" required value="<?php if (isset($_COOKIE['email'])){ echo $_COOKIE['email'];} ?>">
                            </div>
                            <br>
                            
                            <!-- passs -->
                            <div class="input-group input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                      <i class="fas fa-key fa-lg"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" id="password" placeholder="Password" class="form-control rounded-0"  required value="<?php if (isset($_COOKIE['password'])){ echo $_COOKIE['password'];} ?>">
                            </div>

                                 <div class="form-group">
                                    <div class="custom-control custom-checkbox float-left mt-3">
                                        <input type="checkbox" name="rem" class="custom-control-input" id="customCheck"  <?php if(isset($_COOKIE['email'])) {  ?>  checked <?php } ?>>
                                        <label for="customCheck" class="custom-control-label">Remember me! </label>
                                    </div>
                                    
                                    <div class="forgot float-right mt-3">
                                    <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                                      <a href="#" id="forgot-link"> Forgot Password?</a>
                                    </div>
                                    <div class="clearfix"></div>
                                 </div>
                                 <div class="form-group">
                                    <input type="submit" value="Sign In" id="login-btn" class="btn btn-primary btn-lg btn-block myBtn">
                                 </div>
                        </form> 

                    </div>
                    <div class="card justify-content-center rounded-right p-4 myColor">
                        <h1 class = " text-center font-weight-bold text-white">Hellow Friend </h1>
                        <hr class="my-3 bg-light myHr">
                        <p class="text-center font-weight-bolder text-light lead"> Enter your persoanl details and start your jurney with us!</p>
                        <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="register-link"> Sign Up</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Login form end -->

    <!-- register form start -->

    <div class="row justify-content-center  wrapper" id="register-box" style="display:none ;">
            <div class="col-lg-10 my-auto">
                <div class="card-group myShadow">

                <div class="card justify-content-center rounded-left p-4 myColor">
                        <h1 class = " text-center font-weight-bold text-white">Welcome Back </h1>
                        <hr class="my-3 bg-light myHr">
                        <p class="text-center font-weight-bolder text-light lead"> To keep connect with us please login With your personal info.</p>
                        <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="login-link"> Sign In</button>
                    </div>


                    <div class="card rounded-rigth p-4" style="flex-grow: 1.4;">
                       <h1 class= "text-center font-weight-bold text-primary ">Create Account</h1>
                        <hr class="my-3">
                        <form action="" method="post" class="px-3" id="register-form">
                            <div id="regAlert"></div>
                        <!-- full name -->
                        <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                      <i class="far fa-user fa-lg"></i>
                                    </span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control rounded-0"   placeholder="Full name" required>
                            </div>
                                <!-- teacher Id -->
                            <div class="input-group mt-2 input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                      <i class="fa-solid fa-id-card-clip fa-lg"></i>
                                    </span>
                                </div>
                                <input type="text" name="teacherid" id="teacherid" class="form-control rounded-0"   placeholder="Teacher ID" required>
                            </div>
                            <!-- email -->
                            <div class="input-group mt-2 input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                      <i class="far fa-envelope fa-lg"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" id="remail" class="form-control rounded-0"   placeholder="E-Mail" required>
                            </div>
                         
                            <!-- region -->

                            <div class="input-group mt-2 input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                      <i class="fa-solid fa-map-location-dot fa-lg"></i>
                                    </span>
                                </div>
                                <input type="text" name="region" id="region" class="form-control rounded-0"   placeholder="Region" required>
                            </div>
                            
                            
                            <!-- passs -->
                            <div class="input-group mt-2 input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                      <i class="fas fa-key fa-lg"></i>
                                    </span>
                                </div>
                                <input type="password" name="rpassword" id="rpassword" placeholder="Password" class="form-control rounded-0"  required minlength="5">
                            </div>
                                <!-- repeat password -->
                                <div class="input-group mt-2 input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                      <i class="fas fa-key fa-lg"></i>
                                    </span>
                                </div>
                                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm  Password" class="form-control rounded-0"  required minlength="5" >
                            </div>
                            <div class="form-group">
                               . <div id="passError" class="text-danger font-weight-bold ">

                               </div>
                            </div>
                            

                                 <div class="form-group form-group-lg mt-4">
                                    <input type="submit" value="Sign Up" id="register-btn" class="btn btn-primary btn-lg btn-block myBtn">
                                 </div>
                        </form> 

                    </div>
                    
                </div>
            </div>
        </div>
    

    <!-- register form end -->


    <!-- forgot password (reset password form) -->
    <div class="row justify-content-center  wrapper" id="forgot-box" style="display:none ;">
            <div class="col-lg-10 my-auto">
                <div class="card-group myShadow">

                <div class="card justify-content-center rounded-left p-4 myColor">
                        <h1 class = " text-center font-weight-bold text-white">Reset password </h1>
                        <hr class="my-3 bg-light myHr">

                        <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="back-link"> Back</button>
                    </div>

                    <div class="card rounded-right p-4" style="flex-grow: 1.4;">
                       <h1 class= "text-center font-weight-bold text-primary "> Forgot Your Password</h1>
                        <hr class="my-3">
                        <p class="lead text-center text-secondary"> To reset  your password, enter registered email address and we will send you the reset instructions on your e-mail</p>
                        <form action="" method="post" class="px-3" id="forgot-form">
                            <div id="forgotpAlert"></div>
                            <!-- email -->
                            <div class="input-group input-group form-group"> 
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                      <i class="far fa-envelope fa-lg"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" id="femail" class="form-control rounded-0"   placeholder="E-Mail" required>
                            </div>
                            
                            
                           
                                 <div class="form-group">
                                    <input type="submit" value="Reset Password" id="forgot-btn" class="btn btn-primary btn-lg btn-block mt-5 myBtn">
                                 </div>
                        </form> 

                    </div>
                    
                </div>
            </div>
        </div> 



    <!-- forgot password (reset password form)  end-->
</div>




<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
   $(document).ready(function() {  
    // alert('hi')
    $('#register-link').click(function() {
        $('#login-box').hide();
        $('#register-box').show();
// change to reeeeg
    });
// change to loooogin
 $('#login-link').click(function() {
    $('#login-box').show();
    $('register-box').hide();

 });

//  forgot password formmmm
   $('#forgot-link').click(function() {
    $('#login-box').hide();
    $('#forgot-box').show();


   });

   $('#back-link').click(function() {
    $('#login-box').show();
    $('#forgot-box').hide();

   });
//register Ajax Request
$('#register-btn').click(function(e) {
    if ($('#register-form')[0].checkValidity()) {
        e.preventDefault();
        $('#register-btn').val('please wait...');
        if ($('#rpassword').val() != $('#cpassword').val()) {
            //console.log("not matched");
             $('#passError').text('Password did not matched!');   
             $('#register-btn').val('Sign Up'); 
        }
        else {
            $('#passError').text('');   
            $.ajax({ 
                url:'assets/php/action.php',
                method: 'POST',
                data:$('#register-form').serialize()+'&action=register',
                success: function(response) {
                    $('#register-btn').val('Sign Up');
                    //console.log(response);
                    if(response === 'register'){
                        window.location ='index.php'; 
                        //inagoma whyyyy? ku re-direct
                    }
                    else{
                        $("#regAlert").html(response);
                    }

                }
                   

               });
        }
    }

});
//Login Ajax request 

$("#login-btn").click(function(e){
    if($("#login-form")[0].checkValidity()) {   
        e.preventDefault();
          $("#login-btn").val('Please Wait...');
          $.ajax({
            url:'assets/php/action.php',
            method:'post',
            data:$("#login-form").serialize()+ '&action=login',
            success:function(response){
               // console.log(response); cheki kama inafanya kazi
                if(response === 'login'){
                    window.location = 'home.php';
                    $("#login-btn").val('Sign In');
                }
                else{
                    $("#loginAlert").html(response);
                    $("#login-btn").val('Sign In');
                }
            }

            
          });
    }
});

//forgot password Ajax request
$("#forgot-btn").click(function(e){
if($("#forgot-form")[0].checkValidity()) {
 e.preventDefault();

$("#forgot-btn").val('please wait...');
$.ajax({
 url:'assets/php/action.php',
 method:'post', 
 data: $("#forgot-form").serialize()+'&action=forgot',
 succusess:function(response){  
   // console.log(response); 
    $("#forgot-btn").val('Reset Password'); 
    $("#forgot-form")[0].reset();
    $("#forgotpAlert").html(response); 
 }

});


 
}


});

   });
</script>
</body>
</html>