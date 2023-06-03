<?php
require_once 'admin-db.php';

$admin  = new Admin();
session_start();

//hendo admin login ajx request

if(isset($_POST['action']) && $_POST['action'] == 'adminLogin'){
  $username = $admin->test_input($_POST['username']);
  $password = $admin->test_input($_POST['password']);

  $hashpwd = sha1($password);
   
  $loggedInAdmin= $admin->admin_login($username,$hashpwd);
  if($loggedInAdmin != null){
    echo 'admin_login';
    $_SESSION['username'] = $username;
  }
  else{
     echo $admin->showMessage('danger', 'Username or password is incorrect');
  }
} 

//handle fetch all users ajx reqqq

if(isset($_POST['action']) && $_POST['action'] == 'fetchAllUsers'){
$output ='';
$data = $admin->fetchAllUsers(0);

if($data){
  $output .='<table class="table table-striped table-bordered text-center">
                
                <thead>
                <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Verified</th>
                <th>Action</th>

                </tr>
                </thead>

                <tbody>';

    foreach ($data as $row){

      $output .='
                <tr>
                <td>'.$row['id'].'</td>
                <td><img src="'.$row['photo'].'" class="rounded-circle" width= "40px"></td>
                <td>'.$row['name'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['phone'].'</td>
                <td>'.$row['gender'].'</td>
                <td>'.$row['verified'].'</td>

                <td>
                    <a href="#" id= "'.$row['id'].'" title="View Details " class="text-success userDetailsIcon"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;
                    <a href="#"  id= "'.$row['id'].'" title="Delete User " class="text-danger deleteUserIcon"><i class="fas fa-trash-alt fa-lg"></i></a>
                <td>
                    </tr>
               ';
         
    }
    $output .='
         
    </tbody>
    </table>';
          
echo $output;



    }else{
      echo'<h3 class="text-center text-secondary">:( No any user registered yet!</h3>';

}


}