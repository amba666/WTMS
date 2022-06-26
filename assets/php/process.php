<?php
require_once 'session.php'; 

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
 
//print_r($Cuser);

}

//hendo delete req ajax request
if(isset($_POST['del_id'])) {
    $id =$_POST['del_id'];

    $Cuser->delete_req($id);
}

//hendo display more info
if(isset($_POST['info_id'])) {
    $id =$_POST['info_id'];

    $row = $Cuser->edit_request($id);

     echo json_encode($row);
}


 ?>
