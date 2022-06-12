<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>
<?php 
 $id = $_GET['id'];
 $current = post($id);
?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo $url?>dashboard.php"><i class="feather-home"></i></a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo $url?>post_list.php">Post-List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php echo short($current['title']); ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="feather-feather"></i>Post Details</h4>
                    <div>
                        <button class="btn btn-outline-secondary fullscreen-btn"><i class="feather-maximize-2"></i></button>
                        <a href="<?php echo $url?>post_list.php" class="btn btn-outline-secondary"><i class="feather-list"></i></a>
                    </div>
                </div>
                <hr>
                <h2>
                    <?php echo $current['title'] ?>
                </h2>
                <div class="">
                    <i class="feather-user text-primary"></i>
                    <?php echo user($current['user_id'])['name'] ?>
                    <i class="feather-layers text-info"></i>
                    <?php echo category($current['category_id'])['title'] ?>
                </div>
                <div class="mb-3">
                    <i class="feather-calendar"></i>
                    <?php echo showTime(post($id)['created_at'],"j M Y") ?> |
                    <?php echo date("g:i a",strtotime(post($id)['created_at'])) ?>

                </div>
                <h4 class="fw-normal">
                <?php echo html_entity_decode($current['description'],ENT_QUOTES) ?>
                </h4>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card">
            <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="feather-users"></i>Post Viewers</h4>
                    <div>
                        <button class="btn btn-outline-secondary fullscreen-btn"><i class="feather-maximize-2"></i></button>
                    </div>
                </div>
                <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Device</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach(viewerCounts($id) as $key => $value){ ?>
                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php
                             if($value['user_id']==0){
                                echo "Guest";
                             }else{
                                echo user($value['user_id'])['name'] ;
                             }
                             ?></td>
                            <td><?php echo $value['device'] ?></td>
                            <td class="text-nowrap"><?php echo showTime($value['created_at']) ?></td>

                        </tr>
                    <?php  } ?>

                </tbody>
            </table>
            </div>
            
        </div>
    </div>
</div>
<!-- <?php include "template/footer.php"; ?> -->
<script src="<?php echo $url; ?>assets/vendor/jquery-3.3.1.min.js"></script>
<script src="<?php echo $url; ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script>
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
