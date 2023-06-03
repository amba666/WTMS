<?php
require_once 'session.php'; 

//phpMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


$mail = new PHPMailer(true); 
//hando add_Request ajax req

if(isset($_POST['action']) && $_POST['action'] == 'add_Request'){
    //print_r($_POST);

    $schoolname = $Cuser->test_input($_POST['school']);
    $xperience = $Cuser->test_input($_POST['xperience']);
    $combination = $Cuser->test_input($_POST['comb']);
    $schoolAddress = $Cuser->test_input($_POST['schoolAd']);
    $regionTo = $Cuser->test_input($_POST['region1']);
    $districtTo = $Cuser->test_input($_POST['district']);
    $schoolTo = $Cuser->test_input($_POST['school1']);
    $reason = $Cuser->test_input($_POST['reason']);

// echo  $cid, $schoolname, $xperience, $combination,  $schoolAddress,  $regionTo, $districtTo,  $schoolTo, $reason;

    $Cuser->add_New_Request($cid, $schoolname, $xperience, $combination,  $schoolAddress,  $regionTo, $districtTo,  $schoolTo, $reason);
    $Cuser->notification($cid,'admin','Request Added'); // tumeandika admin kwasabau hii notification itakuwa vizibo kwa admini tuuuu
}

//hendo display all not of a user
if(isset($_POST['action']) && $_POST['action']=='display_requests'){
    $output = '';
    
    

    $requests= $Cuser->get_requests($cid);
    if($requests){
        $output.='   
        <table class="table table-striped text-center mt-2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Shool Name</th>
                    <th>Reason For Transfer</th>
                    <th>Transfer To</th>
                    <th>Action</th>

                    
                </tr>
            </thead>
            <tbody>';

            foreach($requests as $row){
                $output .= ' <tr>
                <td>'.$row['id'].'</td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <td>'.$row['schoolname'].'</td>
                <td>'.substr($row['reason'],0, 75).'...</td>
                <td>'.$row['regionTo'].'</td>
                <td>
                    <a href="#" id= "'.$row['id'].'" title="View Details " class="text-success infoBtn"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;
                    <a href="#" id= "'.$row['id'].'" title="Edit Request " class="text-primary editBtn" data-toggle="modal" data-target="#editRequestModal"><i class="fas fa-edit fa-lg" ></i></a>&nbsp;
                    <a href="#"  id= "'.$row['id'].'" title="Delete Request " class="text-danger deleteBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
                </td>
                </tr>';
            }
            $output.=' </tbody></table>';
            echo $output;


    }
    else{
        echo '<h3 class="text-center text-secondary">:( You have not made any request yet!</h3>';
    }




}

//hendo edit request of an user ajax request

if(isset($_POST['edit_id'])){
    $id= $_POST['edit_id'];
    $row = $Cuser->edit_request($id);
    echo json_encode($row);
    $Cuser->notification($cid,'admin','Request Edited'); 
  
}

//update note of user
if(isset($_POST['action']) && $_POST['action'] == 'update_request'){
   $id = $Cuser->test_input($_POST['id']);
   $schoolname = $Cuser->test_input($_POST['school']);
    $xperience = $Cuser->test_input($_POST['xperience']);
    $combination = $Cuser->test_input($_POST['comb']);
    $schoolAddress = $Cuser->test_input($_POST['schoolAd']);
    $regionTo = $Cuser->test_input($_POST['region1']);
    $districtTo = $Cuser->test_input($_POST['district']);
    $schoolTo = $Cuser->test_input($_POST['school1']);
    $reason = $Cuser->test_input($_POST['reason']);

    $Cuser->update_request($id, $schoolname, $xperience, $combination,  $schoolAddress,  $regionTo, $districtTo,  $schoolTo, $reason);
    $Cuser->notification($cid,'admin','Request Updated'); 
//print_r($Cuser);

}

//hendo delete req ajax request
if(isset($_POST['del_id'])) {
    $id =$_POST['del_id'];

    $Cuser->delete_req($id);
    $Cuser->notification($cid,'admin','Request Deleted'); 
}

//hendo display more info
if(isset($_POST['info_id'])) {
    $id =$_POST['info_id'];

    $row = $Cuser->edit_request($id);

     echo json_encode($row);
}

//handle profile update ajax request
if(isset($_FILES['image'])){
   $name = $Cuser->test_input($_POST['name']);
   $gender = $Cuser->test_input($_POST['gender']);
   $dob = $Cuser->test_input($_POST['dob']);
   $phone = $Cuser->test_input($_POST['phone']);


   $oldImage =$_POST['oldimage'];
    $folder ='uploads/';

    if(isset($_FILES['image']['name'])&&($_FILES['image']['name'] !="")){
        $newImage = $folder.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],$newImage);

        if($oldImage != null){
            unlink($oldImage);//delete an old image

        }

    }
    else{
        $newImage= $oldImage;
    }
    
    $Cuser->update_profile($name,$gender,$dob,$phone,$newImage,$cid);
    $Cuser->notification($cid,'admin','Profile Updated'); 




}

//hendo change password ajax request
if(isset($_POST['action']) && $_POST['action'] == 'change_pass'){
    $currentPass =$_POST['curpass'];
    $newPass =$_POST['newpass'];
    $cnewPass =$_POST['cnewpass'];

    $hashnewPass = password_hash($newPass, PASSWORD_DEFAULT);
    if($newPass!= $cnewPass) {
        echo $Cuser->showMessage('danger', 'Passwords did not matched');
    }
    else{
        if(password_verify($currentPass, $cpass)){
            $Cuser->change_password($hashnewPass, $cid);
            echo $Cuser->showMessage('success', 'Passwords changed successfully!'); 
            $Cuser->notification($cid,'admin','Password Changed'); 
        }
        else{
            echo $Cuser->showMessage('danger', 'Current password is incorrect');
        }
    }
}
//hendo email verification ajax request
if(isset($_POST['action']) && $_POST['action']=='verify_email'){
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
          $mail->addAddress($Cemail);
    
          $mail->isHTML(true);
          $mail->Subject = 'E-mail Verification';
          $mail->Body = '<h3>Click the link below  to verify your email.<br><a href="http://http://localhost/big%20time/verify.php?email='.$Cemail.'">http://http://localhost/big%20time/verify.php?email='.$Cemail.'</a><br>Reguards<br>Work Place Transfer Management System</h3>';
    
          $mail->send();
          //echo 'forgot';
          echo $Cuser->showMessage('success', 'We Sent you a verification link, Please check your email!');
     
          
      }
       catch (\Exception $e) {
    
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    
      }

}

//hendo send  feedback to admin ajx request
if (isset($_POST['action']) && $_POST['action']== 'feedback') {
    $subject = $Cuser->test_input($_POST['subject']);
    $feedback = $Cuser->test_input($_POST['feedback']);

    $Cuser->send_Feedback($subject, $feedback,$cid);
    $Cuser->notification($cid,'admin','Feedback Written'); 
}


//hendo fetch notification
if(isset($_POST['action']) && $_POST['action'] == 'fetchNotification') {
$notification= $Cuser->fetchNotification($cid);
$output = '';
if($notification){
    foreach($notification as $row){
        $output .= ' <div class="alert alert-danger" role="alert">
        <button type="button" id="'.$row['id'].'" class="close" data-dismiss="alert"  aria-label="close"><span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading">New Notification</h4>
        <p class="mb-0 lead">'.$row['message'].'</p>
        <hr class="my-2"></hr>
        <p class="mb-0 float-left"> Reply of feedback from Administator </p>
        <p class="mb-0 float-right">'.$Cuser->timeInAgo($row['created_at']).'</p>
        <div class="clearfix"></div> 
        </div>';
    }
    echo $output;
}
else{
    echo '<h3 class="text-center text-secondary mt-5">No any new notification!</h3>';
}


}

//check  notification (dott)

if(isset($_POST['action']) && $_POST['action'] == 'checkNotification'){
    if($Cuser->fetchNotification($cid)){
       echo '<i class="fas fa-circle fa-sm text-danger"></i>'; 
    }
    else{
        echo  '';
    }
}

//remove notification
if(isset($_POST['notification_id'])){
  $id=$_POST['notification_id']; 
  $Cuser->removeNotification($id);
}


 ?>
