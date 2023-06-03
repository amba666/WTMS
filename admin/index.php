<?php 
session_start();
if (isset($_SESSION['username'])) {
   header('Location: admin-dashboard.php');
   exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN | ADMIN</title>
    <link rel="stylesheet" href="https://cdns.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/css/bootstrap.min.css">
   <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
    
   <link rel="stylesheet" href="assets/css/style.css">

  <style type="text/css">
    html, body {
        height: 100%;
    }
    </style>
</head>
<body class="bg-dark">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-lg-5">
                <div class="card border-danger shadow-lg">
                    <div class="card-header bg-danger">
                        <h3 class="m-0 text-white "><i class="fas fa-user-cog"> </i>&nbsp; Admin Panel Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" class="px-3" id="admin-login-form">
                            <div id="adminLoginAlert"></div>
                           <!-- username -->
                        <div class="form-group">
                                <input type="text" name="username" id="" class="form-control form-control-lg rounded-0" placeholder="Username" required autofocus>
                            </div>
                            <!-- pass -->
                            <div class="form-group">
                                <input type="password" name="password" id="" class="form-control form-control-lg rounded-0" placeholder="Password" required>
                            </div>
                            <!-- submit --> 
                            <div class="form-group">
                                <input type="submit" name="admin-login" id="adminLoginBtn" class="btn btn-danger btn-block btn-lg rounded-0" value="Login" >
                            </div>
                        </form>
                    </div>

                </div>
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
<script type="text/javascript">
    $(document).ready(function() {
       $("#adminLoginBtn").click(function(e){
        if($("#admin-login-form")[0].checkValidity()) {
                e.preventDefault();
                $(this).val('Please Wait...');
                    $.ajax({
                        url: 'assets/php/admin-action.php',
                        method:'post',
                        data: $("#admin-login-form").serialize()+'&action=adminLogin',
                        success: function(response){
                            // console.log(response);
                            if(response== 'admin_login'){
                                window.location ='admin-dashboard.php';
                            }else{
                                $("#adminLoginAlert").html(response);
                            }
                            $("#adminLoginBtn").val('Login');
                        }


                    });

        }



       });



    });

</script>
</body>
</html>