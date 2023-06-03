<?php
require_once 'assets/php/navbar.php';
require_once 'assets/php/session.php';

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lf-10">
            <div class="card rounded-0 mt-3 border-primary">
                <div class="card-header border-primary">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active font-weight-bold"  data-toggle="tab">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="#editProfile" class="nav-link  font-weight-bold"  data-toggle="tab">Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="#changePass" class="nav-link  font-weight-bold"  data-toggle="tab">Change Password</a> 
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">

                    <!-- profile Tab Content -->
                        <div class="tab-pane container active" id="profile">
                            <div id="verifyEmailAlert"></div>
                            <div class="card-deck">
                                <div class="card border-primary"> 
                                  <div class="card-header bg-primary text-light text-center lead">
                                        User ID: <?= $cid;  ?>
                                  </div>  
                                  <div class="card-body">
                                    <p class="card-txt p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Name :</b> <?= $cname; ?></p>
                                    <p class="card-txt p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Teacher ID :</b> <?= $teacherid; ?></p>
                                    <p class="card-txt p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Email :</b> <?= $Cemail; ?></p>

                                    <p class="card-txt p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Region:  :</b> <?= $cregion; ?></p>
                                    <p class="card-txt p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Phone Number :</b> <?= $phone; ?></p>
                                    <p class="card-txt p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Gender :</b> <?= $cgenders; ?></p>
                                    <p class="card-txt p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Date Of Birth :</b> <?= $cdob; ?></p>
                                    <p class="card-txt p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Registered On :</b> <?= $reg_on; ?></p>
                                    <p class="card-txt p-2 m-1 rounded" style="border:1px solid #0275d8"><b>E-Mail Verified:  </b> <?= $verified; ?>
                                            <?php if ($verified =='Not Verified!'):?> 
                                                <a href="#" id="Verify-email" class="float-right">Verify Now!</a>
                                            <?php endif;?>
                                    </p>
 
                                    <div class="clearfix"></div>


                                  </div>
                            
                            </div>
                                <div class="card border-primary align-self-center"> 
                                <?php if (!$cphoto):?>  
                                    <img src="assets/img/avatar_wtms.jpg" alt="" class="thumbnail img-fluid" width="408px">
                                <?php else: ?>
                                    <img src="<?='assets/php/'.$cphoto; ?>" class="thumbnail img-fluid" width="408px">
                                    <?php endif;?>
                            
                            </div>

                              
                            </div>
                        </div>
                    <!-- prof   Tab End -->

                    <!-- Edit profile tab -->
                        
                    <div class="tab-pane container fade" id="editProfile">
                        <div class="card-deck">
                            <div class="card border-danger align-self-center">
                            <?php if (!$cphoto):?>  
                                    <img src="assets/img/avatar_wtms.jpg" alt="" class="thumbnail img-fluid" width="4px">
                                <?php else: ?>
                                    <img src="<?='assets/php/'.$cphoto; ?>" class="thumbnail img-fluid" width="408px">
                                    <?php endif;?>
                            
                            </div>
                            <div class="card border-danger">
                                <form action="" class="px-3 mt-2" method="post" enctype="multipart/form" id="peofile-update-form">
                                    <input type="hidden" name="oldimage" value="<?php echo $cphoto; ?>">
                                    <div class="form-group m-0">
                                        <label for="profilePhoto" class="m-1">Upload Profile photo</label>
                                        <input type="file" name="image" id="profilePhoto">
                                    </div>
                                    <!-- name -->
                                    <div class="form-group m-0">
                                        <label for="name" class="m-1">Name</label>
                                        <input type="text" name="name" id="name" value="<?= $cname; ?>" class= "form-control">
                                    </div>
                                    <!-- gender -->
                                    <div class="form-group m-0">
                                        <label for="gender" class="m-1">Gender</label>
                                       <select  name="gender" id="gender"  class= "form-control">
                                        <option value="" disabled <?php if($cgenders== null){echo'selected';} ?>>Select</option>
                                        <option value="Male" <?php if($cgenders== 'Male'){echo'selected';} ?> >Male</option>
                                        <option value="Female" <?php if($cgenders== 'Female'){echo'selected';} ?> >Female</option>
                                       </select>
                                    </div>
                                    <!-- dob -->
                                    <div class="form-group m-0">
                                        <label for="dob" class="m-1">Date of Birth</label>
                                        <input type="date" name="dob" id="dob" value="<?= $cdob; ?>" class= "form-control">
                                    </div>
                                    <!-- phone -->
                                    <div class="form-group m-0">
                                        <label for="phone" class="m-1">Phone Number</label>
                                        <input type="tel" name="phone" id="phone" value="<?= $phone; ?>" class= "form-control" placeholder="Phone">
                                    </div>
                                    <div class="form-group mt-2">
                                        <input type="submit" value="Update Profile" name="profile_update" class="btn btn-danger btn-block" id="profileUpdateBtn">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- edit tab end -->
                    <!-- Change password Tab -->
                     <div class="tab-pane container fade" id="changePass">
                        <div id="changepassAlert" ></div>
                     <div class="card-deck">
                          <div class="card card-border-succusess">
                            <div class="card-header bg-success text-white text-center lead">
                                Change Password
                            </div>
                            <form action="" method="post" class="px-3 mt-2" id="change-pass-form">
                                <!-- current password-->
                                    <div class="form-group ">
                                        <label for="curpass">Enter Your Current Password</label>
                                        <input type="password" name="curpass" id="curpass" placeholder="Current Password" class="form-control form-control-lg" required minlength="5">
                                    </div>
                                    <!-- new password -->
                                    <div class="form-group ">
                                        <label for="newpass">Enter Your New Password</label>
                                        <input type="password" name="newpass" id="newpass" placeholder="New Password" class="form-control form-control-lg" required minlength="5">
                                    </div>
                                   
                                    <!-- repeat password -->
                                    <div class="form-group ">
                                        <label for="cnewpass"> Confirm Your New Password</label>
                                        <input type="password" name="cnewpass" id="cnewpass" placeholder="Confirm Password" class="form-control form-control-lg" required minlength="5">
                                    </div>

                                    <!-- error message -->
                                    <div class="form-group">
                                        <p id="changePassError" class="text-danger"></p>
                                    </div>
                                    <!-- btn -->
                                    <div class="form-group mt-2">
                                        <input type="submit" value="Change Password" name="changepass" class="btn btn-success btn-block btn-lg" id="changePassBtn">
                                    </div>
                            </form>

                          </div>  
                          <!-- change password side img-->
                          <div class="card border-success align-self-center">
                            <img src="assets/img/change.png"  class="img-thumbnail img-fluid" width="408px">
                          </div>
                        </div>

                     </div>   

                      <!-- Change password Tab  end-->

                    </div>

               

                </div>
            </div>
        </div>

    </div>
</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/js/bootstrap.bundle.min.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"></script> -->
<script type="text/javascript">
    $(document).ready(function(){
//profile update ajax request
$("#peofile-update-form").submit(function(e){
    e.preventDefault();

    $.ajax({
            url:'assets/php/process.php',
            method:'post',
             processData:false,
             contentType:false,
             catch:false,
             data:new FormData(this),
             success:function(response){
               // console.log(response);
               location.reload();
             }



    });

});

//change password ajax request
$("#changePassBtn").click(function(e){
if($("#change-pass-form")[0].checkValidity()){
    e.preventDefault();
    $("#changePassBtn").val('please wait...');

    if($("#newpass").val() != $("#cnewpass").val()){
        $("#changePassError").text('*Password  did not match');  
        $("#changePassBtn").val('Change Password'); 
    }
    else{
        $.ajax({
            url:'assets/php/process.php',
            method:'post',
            data:$("#change-pass-form").serialize()+'&action=change_pass',
            success:function(response){
                   $("changepassAlert").html(response);
                   $("#changePassBtn").val('Change Password');
                   $("#changePassError").text(''); 
                   $("#change-pass-form")[0].reset();
            }

        });
    }
        
}
    
});
//email verification ajax request
$("#Verify-email").click(function(e){
e.preventDefault();
$(this).text('Please Wait...');

$.ajax({
        url:'assets/php/process.php',
        method:'post',
        data:{ation: 'verify_email'},
        success: function(response){
            $("#verifyEmailAlert").html(response);
            $("#Verify-email").text('Verified Now!');



        }



});


});


checkNotification();
//check notification (red dot)
 function checkNotification(){
    $.ajax({
            url: 'assets/php/process.php',
            method: 'post',
            data: {action:'checkNotification'},
            success:function(response){
                //console.log(response);
                $("#checkNotification").html(response);
            }

    });
 }

    });
</script>
</body>
</html>

