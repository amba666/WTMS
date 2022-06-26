<?php
require_once 'assets/php/auth.php';

$user = new Auth();

$msg = '';

if(isset($_GET['email']) && $_GET['token']){
    $email = $user->test_input($_GET['email']);
    $token = $user->test_input($_GET['token']);

    $aut_user = $user->reset_pass_auth($email, $token);
    if ($aut_user != null) {

        if (isset($_POST['subimit'])) {
            $newpass = $_POST['pass'];
            $cnewpass = $_POST['cpass'];

            $hashnewpass = password_hash($newpass, PASSWORD_DEFAULT);

            if($newpass == $cnewpass) {
                $user->update_new_password($hashnewpass, $email);
                $msg = 'Password changed successfully! <br> <a href="index.php> Login Here</a>';

                
            }
            else{
                $msg = 'password did not match!';
            }


        }else{
            header('Location: index.php');
            exit(); 
        }

    }


}else{
    header('Location: index.php');
    exit(); 
}



?>



<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WTMS|RESET PASSWORD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/css/bootstrap.min.css">
   <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
   

<div class="container">
    <!-- Login form  start -->
        <div class="row justify-content-center  wrapper" >
            <div class="col-lg-10 my-auto">
                <div class="card-group myShadow">

                <div class="card justify-content-center rounded-left p-4 myColor">
                        <h1 class = " text-center font-weight-bold text-white">Reset Your Password Here! </h1>
                        
                    </div>
                


                    <div class="card rounded-right p-4" style="flex-grow: 2;">
                       <h1 class= "text-center font-weight-bold text-primary "> Enter New Password!</h1>
                        <hr class="my-3">

                        <form action="" method="post" class="px-3" >
                            <div class="text-center lead my-2"><?php $msg; ?></div>
                         
                       
                           
                            <!-- passs -->
                            <div class="input-group input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                      <i class="fas fa-key fa-lg"></i>
                                    </span>
                                </div>
                                <input type="password" name="pass"  placeholder="New Password" class="form-control rounded-0"  required minlength="5">
                            </div>

                                <br> 


                                 <!-- passs -->
                            <div class="input-group input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                      <i class="fas fa-key fa-lg"></i>
                                    </span>
                                </div>
                                <input type="password" name="cpass"  placeholder="Confirm  New Password" class="form-control rounded-0"  required minlength="5">
                            </div>

                                
                                 <div class="form-group mt-3">
                                    <input type="submit" value="Reset Password" name="submit" class="btn btn-primary  btn-lg btn-block myBtn">
                                 </div>
                        </form> 

                    </div>
                    
                </div>
            </div>
        </div>
</div>
</div>
</body>
</html>