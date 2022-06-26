<?php
session_start();

//phpMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

require_once 'auth.php';

//Create an instance; passing `true` enables exceptions

$mail = new PHPMailer(true);

$user = new Auth();
//regista ajax req
if (isset($_POST['action'])&& $_POST['action']=='register'){
    $name = $user->test_input($_POST['name']);
    $teacherid = $user->test_input($_POST['teacherid']);
    $email = $user->test_input($_POST['email']);
    $region = $user->test_input($_POST['region']);
    $pass = $user->test_input($_POST['rpassword']);

    $hashpass = password_hash($pass, PASSWORD_DEFAULT);

   //check user

   if($user->user_exist($email)){
    echo $user->showMessage('danger', 'This E-Mail is already registered! ');
   }
   else{
    if ($user->register($name, $teacherid,$email, $region,$hashpass)){
        echo 'register';
        $_SESSION['user'] = $email;
        //  header('Location:home.php');
    }
    else{
        echo $user->showMessage('danger', 'Something went wrong try again later! ');
    }
   }

}

//login ajax reqst
if(isset($_POST['action']) && $_POST['action'] == 'login'){
   $email = $user ->test_input($_POST['email']);
   $pass = $user ->test_input($_POST['password']);

    $loggedInUser = $user ->login($email);

    if($loggedInUser!= null){
        if(password_verify($pass, $loggedInUser['password'])){
            if(!empty($_POST['rem'])){ //kama user akiwa amebonyeza remember me
                setcookie("email", $email, time()+(30*24*60*60), '/'); //store kuki a month
                setcookie("password", $pass, time()+(30*24*60*60), '/');
            }else{
                setcookie("email","",1, '/');
                setcookie("password","",1, '/');
            }
         echo 'login';
         $_SESSION['user']=$email;

        }else{
            echo $user->showMessage('danger', 'Password  is incorrect');
        }
        
    }
    else{
        echo $user->showMessage('danger', 'User Does Not Exist');
    }

}

// forgot password handler

if(isset($_POST['action'])&& $_POST['action']=='forgot'){  
    //print_r($_POST);
 $email = $user->test_input($_POST['email']);

 $user_found = $user->currentUser($email);
 if ($user_found != null){
    $token = uniqid();
    $token = str_shuffle($token); //kila page ikirefresh it shuffles th //uniqid  f
    $user->forgot_password($token, $email);

    try {

        //from(seva settings)
           
          $mail->isSMTP();
          $mail-> Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->username = Database::USERNAME;
          $mail->password =Database::PASSWORD;
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  //Enable implicit TLS encryption
          $mail->Port = 587;     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
          
          //to
          $mail->setFrom(Database::USERNAME, 'Work Place Transfer Management System');
          $mail->addAddress($email);
    
          $mail->isHTML(true);
          $mail->Subject = 'Reset Password';
          $mail->Body = '<h3>Click the link below  to reset your password.<br><a href="http://http://localhost/big%20time/reset-pass.php?email='.$email.'&token='.$token.'">http://http://localhost/big%20time/reset-pass.php?email='.$email.'&token='.$token.'</a><br>Reguards<br>Work Place Transfer Management System</h3>';
    
          $mail->send();
          //echo 'forgot';
          echo $user->showMessage('success', 'We Sent you a reset link, Please check your email!');
     
          
      }
       catch (\Exception $e) {
    
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    
      }

 }
 else{
    echo $user->showMessage('info','This e-mail is not registered!');
}



}
 
//echo 'hi';



?>