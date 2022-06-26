<?php
session_start();
require_once 'auth.php';
$Cuser = new Auth();

if(!isset($_SESSION['user'])){
    header('Location:index.php');
    die;
    
}


$Cemail = $_SESSION['user'];

$data = $Cuser->currentUser($Cemail);

$cid = $data['id'];
$cname = $data['name'];
$teacherid = $data['teacher_id'];

$cregion = $data['region'];
$phone = $data['phone'];
$cgenders = $data['gender'];
$cdob = $data['dob'];
$cphot = $data['photo'];
$cschoolname = $data['shool_name'];
$cpass = $data['password'];
$created = $data['created_at'];
$verified = $data['verified'];

$fname = strtok($cname, ""); //extraction fistname from the full name

if($verified == 0 ){
    $verified ='Not Verified!';
}else{
    $verified = 'Verified!';
}








