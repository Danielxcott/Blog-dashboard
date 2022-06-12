<?php 
require_once "core/auth.php";
require_once "core/base.php"; 
require_once "core/functions.php";
?>

<!doctype html>
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

</head>
<body>
<section class="main container-fluid">
    <div class="row">
<?php include "sideBar.php"?>
        <div class="col-12 col-lg-9 col-xl-10 vh-100 py-3 content">
            <div class="row header mb-4">
                <div class="col-12 ">
                    <div class="p-2 rounded d-flex justify-content-between align-item-center" id="navBarH">
                        <button class="show-btn btn btn-primary btn-link d-block d-lg-none">
                            <i class="feather-menu text-light"></i>
                        </button>
                        <form action="" method="post" class="d-none d-lg-inline" style="margin-block: auto;">
                            <div class="form d-flex">
                                <input type="text" class="form-control"  id="">
                                <button class="btn btn-light btn-search">
                                    <i class="feather-search"></i>
                                </button>
                            </div>
                        </form>
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle text-capitalize" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo $url?>assets/img/profile/<?php echo $_SESSION['user']['photo']?>" alt="" class="user-img" >
                                <?php echo $_SESSION['user']['name']?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item " href="<?php echo $url?>index.php">Blogs</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>