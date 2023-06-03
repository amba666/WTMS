<?php
require_once 'assets/php/navbar.php';

?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if($verified =='Not Verified!'): ?>
                    <div class="alert alert-danger alert-dismissible text-center mt-2 m-0" >
                        <button type="button" class="close" data-dismiss="alert"  aria-label="Close" >&times;</button>
                        <strong>Your E-mail is not verified </strong>Please check your E-mail and verify now!
                    </div>
                    <?php endif;?>
                    <h4 class="text-center text-primary mt-4">Apply Your Request Here!</h4>

            </div>

        </div>
        <div class="card border-primary">
            <h5 class="card-header bg-primary d-flex justify-content-between">
                <span class="text-light lead align-self-center">Your Requests</span>
                <a href="#" class="btn btn-light " data-toggle="modal" data-target="#AddRequestModal"><i class="fas fa-plus-circle fa-lg"></i>&nbsp; Add New Request</a>

            </h5>
            <div class="card-body">
            <div class="table-responsive" id="showRequest">
                           
                           

               </div> 
            </div>
        </div>


    </div>
<!-- Start ADD NEW REQUEST MODEL -->
<div class="modal fade" id="AddRequestModal">
<div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-success">
            <h4 class="modal-title text-light">Add Request</h4>
            <button  type="button" class="close text-light" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form action="" method="post" id="add-request-form" class="px-3">
            
                <h4>FROM:</h4>

                <div class="form-group">
                <input type="text" name="school" class="form-control form-control-lg" placeholder="Enter Your School Name" required>
               </div>
               <div class="form-group">
                <input type="number" class="form-control form-control-lg" name="xperience" placeholder="Enter How Many Year You  Been Working " required>
                </div>
                <div class="form-group">
                <select id="comb" name="comb" class="form-control form-control-lg"  required>
                <option selected>Select Subjects Combination...</option>
                <option>Science</option>
                <option>Arts</option>
                </select>
                </div> 
                <div class="form-group">
                <input type="text"  class="form-control form-control-lg" name="schoolAd" placeholder="Enter  Your School Address " required>
                </div>

                <h4>TO:</h4>

                <div class="form-group">
                <input type="text" name="region1" class="form-control form-control-lg" placeholder="Enter Region Name" required>
               </div>
               <div class="form-group">
                <input type="text" name="district" class="form-control form-control-lg" placeholder="Enter District Name" required>
               </div>
               <div class="form-group">
               <input type="text" name="school1" class="form-control form-control-lg" placeholder="Enter Name of the school" required>
               </div>
               <div class="form-group">
               <textarea class="form-control form-control-lg" name="reason" rows="3" placeholder="Reason For Requesting This Transfer" required></textarea>
               </div>
                <div class="form-group">
                    <input type="submit" name="addRequest" id="addRequestBtn" class="btn btn-success btn-block btn-lg" value="Add Request">
                </div>
            </form>

        </div>

    </div>
</div>

</div>


<!-- End ADD NEW REQUEST MODEL -->



<!-- strt editing REQUEST MODEL -->

<div class="modal fade" id="editRequestModal">
<div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-info">
            <h4 class="modal-title text-light">Edit Request</h4>
            <button  type="button" class="close text-light" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form action="" method="post" id="edit-request-form" class="px-3">
            
                <h4>FROM:</h4>

                <input type="hidden" name="id" id="id">

                <div class="form-group">
                <input type="text" name="school" id="school" class="form-control form-control-lg" placeholder="Enter Your School Name" required>
               </div>
               <div class="form-group">
                <input type="number" class="form-control form-control-lg" name="xperience" id="xperience" placeholder="Enter How Many Year You  Been Working " required>
                </div>
                <div class="form-group">
                <select id="comb" name="comb" class="form-control form-control-lg" id="comb"  required>
                <option selected>Select Subjects Combination...</option>
                <option>Science</option>
                <option>Arts</option>
                </select>
                </div> 
                <div class="form-group">
                <input type="text"  class="form-control form-control-lg" name="schoolAd" id="schoolAd" placeholder="Enter  Your School Address " required>
                </div>

                <h4>TO:</h4>

                <div class="form-group">
                <input type="text" name="Region1" id="Region1" class="form-control form-control-lg" placeholder="Enter Your Region" required>
               </div>
               <div class="form-group">
                <input type="text" name="district" id="district" class="form-control form-control-lg" placeholder="Enter Name Your District" required>
               </div>
               <div class="form-group">
               <input type="text" name="school1" id="school1" class="form-control form-control-lg" placeholder="Enter Name of the school" required>
               </div>
               <div class="form-group">
               <textarea class="form-control form-control-lg" name="reason" id="reason" rows="3" placeholder="Reason For Requesting This Transfer" required></textarea>
               </div>
                <div class="form-group">
                    <input type="submit" name="editRequest" id="editRequestBtn" class="btn btn-info btn-block btn-lg" value="Update Request">
                </div>
            </form>

        </div>

    </div>
</div>

</div>



<!-- end editing REQUEST MODEL -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    // this scrpt is for table pagination tumeichukua datatables.net
$(document).ready(function() {
 // $("table").DataTable();

//add new  request ajax requesttt

$("#addRequestBtn").click(function(e){
    if($("#add-request-form ")[0].checkValidity()){
        e.preventDefault();


     $("#addRequestBtn").val('Please wait...');
        $.ajax({   
            url: 'assets/php/process.php', 
            method: 'post', 
            data:$("#add-request-form").serialize()+'&action=add_Request',
            success: function(response) {
               // console.log(response);
                $("#addRequestBtn").val('Add Request');
                $("#add-request-form")[0].reset();
                $("AddRequestModal").modal('hide');
                //sweetalert2
                Swal.fire({
                    title: 'Request Sent Successfully',
                    type: 'success'



                });
                display_all_tran_request();
                


            }




         });

    }


});
//edit request ajax request
$("body").on("click",".editBtn",function(e){
e.preventDefault();
edit_id =$(this).attr('id'); 
//console.log(edit_id);

$.ajax({
    url: 'assets/php/process.php', 
    method: 'post', 
    data: {edit_id: edit_id}, 
    success: function(response) {
        //console.log(response); 
        data= JSON.parse(response); 
         $("#id").val(data.id);
         $("#school").val(data.schoolname);
         $("#xperience").val(data.experience);
         $("#comb").val(data.branch);
         $("#schoolAd").val(data.schoolAddress);
         $("#Region1").val(data.regionTo);
         $("#district").val(data.district);
         $("#school1").val(data.schoolTo);
         $("#reason").val(data.reason);
    }


});
  


});

//update the edited data

$("#editRequestBtn").click(function(e){
    if($("#edit-request-form")[0].checkValidity()){
        e.preventDefault();

        $.ajax({
    url:'assets/php/process.php', 
    method:'post',
    data:$("#edit-request-form").serialize()+"&action=update_request",
    success: function(response){
        //console.log(response);  
        Swal.fire({
            title:'Request updated successfully!',
            type:'success',

        });
        $("#edit-request-form")[0].reset();
        $("#editRequestModal").modal('hide');
        display_all_tran_request();

    }

        });

    }




});
 
//delete request 
$("body").on("click", ".deleteBtn", function(e){
e.preventDefault();

del_id = $(this).attr('id');

        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            $.ajax({
                url: 'assets/php/process.php',
                method:'post',
                data:{del_id: del_id},
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        'Request deleted successfully!',
                        'success'
                        )
                        
               display_all_tran_request();

                }

            });
           
        }
        })



});

// display more info about request ajx
$("body").on("click", ".infoBtn", function(e){
e.preventDefault();
info_id = $(this).attr('id');
$.ajax({
                url: 'assets/php/process.php',
                method:'post',
                data:{info_id: info_id},
                success: function(response) {
                   //console.log(response); 

                   data = JSON.parse(response);//convet json kwenda javascript
                   Swal.fire({
                    title: '<strong>Request: ID('+data.id +')</strong>',
                    type: 'info',
                    html:'<b>Shool Name: </b>'+data.schoolname+'<br> <br> <b>Experience : </b>'+data.experience+'years <br> <br> <b>Subjects Combination: </b>'+data.branch+'<br> <br><b>School Address: </b>'+data.schoolAddress+'<br> <br> <b>Region Requested: </b>'+data.regionTo+'<br><br> <b>District Requested: </b>'+data.district+'<br><br> <b>School Requested: </b>'+data.schoolTo+'<br> <br> <b>Reason For Requesting This Transsfer: </b>'+data.reason+'<br> <br> <b>Sent On: </b>'+data.created_at+'<br> <br> <b>Updated On: </b>'+data.updated_at+'<br> <br>',
                    showCloseButton: true,

                   });
                }

    });
    });





display_all_tran_request();
//Display all tran request of a user
function display_all_tran_request(){
    $.ajax({
        url: 'assets/php/process.php',
        method: 'post',
        data:{action: 'display_requests'},
        success:function(response){
           // console.log(response);
            $("#showRequest").html(response);
            $("table").DataTable({
                order:[0,'desc']
            });



        }



    });
}

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
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"></script> -->
</body>
</html>

