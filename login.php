<?php 
    require_once "core/base.php";
    require_once "core/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MOON</title>
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/data_table/datatables.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/data_table/DataTables-1.11.5/css/dataTables.bootstrap5.min.css">
</head>
<body style=" background-color: var(--primary-soft);">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-4">
                <div class="card" style="border-radius: 18px ;" id="login">
                    <div class="card-body">
                        <h4 class="text-center" style="color: #EEEEEE;">
                            <i class="feather-users" style="color: #FFAA4C ;" ></i>
                            Login
                        </h4>
                        <hr>
                        <?php
                        if(isset($_POST['login_Btn'])){
                           echo login();
                        }
                        ?>
                        <form action="" method="post">
                           <div class="form-group" id="register">
                            <label for="" style="color: #EEEEEE;"> 
                                <i class="feather-mail "></i>
                                Email</label>
                           <input type="email" class="form-control my-2" name="email" required>
                           </div>
                           <div class="form-group" id="register">
                            <label for="" style="color: #EEEEEE;"> 
                                <i class="feather-lock"></i>
                                Password</label>
                           <input type="password" class="form-control my-2" name="password" required>
                           </div>
                           <div class="form-group mt-3 mb-0">
                           <button class="btn" style="background-color: #F6F5F5 ;"  name="login_Btn">Login</button>
                           </div>
                            <div class="text-center" >
                                <a href="register.php" class="text-decoration-none" style="color: #EEEEEE;">Create an account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo $url; ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="<?php echo $url; ?>assets/vendor/jquery-3.3.1.min.js"></script>
<script src="<?php echo $url; ?>assets/js/app.js"></script>
<script src="<?php echo $url; ?>assets/vendor/counter_up/counter_up.js"></script>
<script src="<?php echo $url; ?>assets/vendor/way_point/jquery.waypoints.js"></script>
<script src="<?php echo $url; ?>assets/js/dashboard.js"></script>
<script src="<?php echo $url; ?>assets/vendor/chart/Chart.min.js"></script>
<script src="<?php echo $url; ?>assets/vendor/data_table/dataTables.min.js"></script>
<script src="<?php echo $url; ?>assets/vendor/data_table/DataTables-1.11.5/js/dataTables.bootstrap5.min.js"></script>
</html>