<?php
require_once 'assets/php/admin-headers.php';
?>

   <div class="row">
      <div class="col-lg-12">
         <div class="card my-2 border-success">
            <div class="card-header bg-success text-white">
               <h4 class="m-0">Total Registered Users</h4>
            </div>
            <div class="card-body">
               <div class="table-responsive" id="showAllUsers">
                     <p class="text-center align-self-center">Please Wait...</p>
               </div>
            </div>

         </div>
      </div>
   </div>






<!-- futa area -->
           </div>
        </div>
    </div>
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
   //fetch all users ajx request


$(document).ready(function(){
   fetchAllUsers();
function fetchAllUsers() {
  $.ajax({
         url: 'assets/php/admin-action.php',
         method: 'post',
         data:{action : 'fetchAllUsers' },
         success: function(response){
            $("#showAllUsers").html(response);
         }

  });

}







});


</script>
</body>
</html>