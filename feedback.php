<?php
require_once 'assets/php/navbar.php';
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 mt-3">
            <!-- <?php //if($verified =='Verified!'): ?> -->
                <div class="card border-primary">
                    <div class="card-header lead text-center bg-primary text-white">
                        Send Feedback to Admin
                    </div>
                    <div class="card-body">
                        <form action="" method="post" class="px-4" id="feedback-form">
                            <div class="form-group">
                                <input type="text" name="subject" id="" placeholder="Write Your Subject" class="form-control-lg form-control rounderd-0" required>
                            </div>
                            <div class="form-group">
                                <textarea name="feedback" id="feedback" class="form-control-lg form-control rounderd-0" placeholder="Write Your Feedback Here..." required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Send Feedback" name="feedbackBtn" id="feedbackBtn" class="btn btn-primary btn-block btn-lg rounded-0" >
                            </div>
                        </form>
                    </div>
                </div>
    <?php //else:?>
             
       
     <!-- <h1 class="text-center text-secondary mt-5"> Verify To Direct Send Feedback to the Admin</h1> -->
     <?php //endif;?> 
    </div>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
 <script type="text/javascript" >
    $(document).ready(function() {
//send feeback to admin ajax request
$("#feedbackBtn").click(function(e) {
if($("#feedback-form")[0].checkValidity()) {
  e.preventDefault();
  $(this).val('Please Wait...');
  $.ajax({
        url:'assets/php/process.php',
        method:'post',
        data:$("#feedback-form").serialize()+'&action=feedback',
        success:function(response){
            //console.log(response);
        $("#feedback-form")[0].reset();
        $("#feedbackBtn").val('Send Feedback');
      Swal.fire({
             title:'Feedback Successfully Sent To The Admin',
             type:'success'


      });



        } 

  }) ;
}


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

