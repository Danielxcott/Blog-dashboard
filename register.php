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
                <div class="card rounded-3">
                    <div class="card-body">
                        <h4 class="text-center text-secondary">
                            <i class="feather-users text-primary"></i>
                            User Register
                        </h4>
                        <hr>
                        <?php
                        if(isset($_POST['regBtn'])){
                           echo register();
                        }
                        ?>
                        <form action="" method="post">
                           <div class="form-group" id="register">
                            <label for="">
                            <i class="feather-user"></i>
                                Username
                            </label>
                           <input type="text" class="form-control" name="name" required>
                           </div>
                           <div class="form-group" id="register">
                            <label for=""> 
                                <i class="feather-mail"></i>
                                Email</label>
                           <input type="email" class="form-control" name="email" required>
                           </div>
                           <div class="form-group" id="register">
                            <label for=""> 
                                <i class="feather-lock"></i>
                                Password</label>
                           <input type="password" class="form-control" name="password" required>
                           </div>
                           <div class="form-group" id="register">
                           <label for=""> 
                                <i class="feather-lock"></i>
                               Confirm Password</label>
                           <input type="password" class="form-control" name="cpassword" required>
                           </div>
                           <div class="form-group mt-3 mb-0">
                               <button class="btn btn-primary" name="regBtn">Register</button>
                               <a href="login.php" class="btn btn-link text-decoration-none">Login</a>
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