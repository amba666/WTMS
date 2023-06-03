<?php
require_once 'assets/php/navbar.php';

?>

<div class="container">
    <div class="row justify-content-center my-2">
        <div class="col-lg-6 mt-4" id="showAllNotificantion">
           
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


//fetch notifications of an user
fetchNotification();
function fetchNotification(){
    $.ajax({
            url: 'assets/php/process.php',
            method: 'post',
            data:{action: 'fetchNotification'},
            success: function(response) {
                //console.log(response);
                $("#showAllNotificantion").html(response);

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

 //remove the notifications
 $("body").on('click', ".close", function(e){
e.preventDefault();
notification_id = $(this).attr('id');

$.ajax({
    url: 'assets/php/process.php',
    method: 'post',
    data:{notification_id:notification_id},
    success: function(response){
        checkNotification(); 
        fetchNotification();    

    }

});

 })












});





</script>






 </body>
</html>

