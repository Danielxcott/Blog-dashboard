<?php require_once "core/auth.php"; ?>
<?php require_once "core/isAdmin.php"; ?>
<?php include "template/header.php"; ?>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo $url?>dashboard.php"><i class="feather-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">User-Manager</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="feather-users"></i>Users-List</h4>
                    <div>
                        <button class="btn btn-outline-secondary fullscreen-btn"><i class="feather-maximize-2"></i></button>
                        <a href="<?php echo $url?>add-item.php" class="btn btn-outline-secondary"><i class="feather-list"></i></a>
                    </div>
                </div>
                <?php 
                $userId = $_GET['id'];
                $current = user($userId);
                if(isset($_POST['userUpBtn'])){
                    return userUpdate();
                }
                
                ?>
                <hr>
                <form action="" method="post">
                    <div class="form-group col-12">
                        <div class="row g-3">
                            <div class="col-3">
                                <input type="text" name="id" value="<?php echo $userId ?>" hidden>
                                <label for="">Name</label>
                                <input class="form-control " type="text" name="name" value="<?php echo $current['name']; ?>" autofocus >
                            </div>
                            <div class="col-3">
                            <label for="">Role</label>
                                <input class="form-control " type="number" min="0" max="2" name="role" value="<?php echo $current['role']; ?>" autofocus >
                            </div>
                            <div class="col-3">
                            <label for="">Money</label>
                                <input class="form-control " type="text" name="money" value="<?php echo $current['money']; ?>" autofocus >
                            </div>
                            <div class="col-3">
                            <button class="btn btn-primary mt-4 " name="userUpBtn">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <?php include "template/footer.php"; ?> -->
<script src="<?php echo $url; ?>assets/vendor/jquery-3.3.1.min.js"></script>
<script src="<?php echo $url; ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script>
    let currentPage = location.href
    console.log(currentPage)
    $(".nav-item-link").each(function (){
        let links = $(this).attr("href");
        if(links == currentPage){
            $(this).addClass("active");
        }
    })
    $(".fullscreen-btn").on("click",function(){
    let current = $(this).closest(".card")
    current.toggleClass("maximize");
    if(current.hasClass("maximize") ){
        $(this).html("<i class=feather-minimize-2></i>")
    }else{
        $(this).html("<i class=feather-maximize-2></i>")
    }
})
</script>