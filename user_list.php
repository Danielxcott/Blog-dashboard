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
                <hr>
                <div class="overflow-scroll">
                    <table id="list" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Money</th>
                            <th>Views</th>
                            <th>Created</th>
                            <th>Control</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        <?php 
                            foreach(users() as $key => $value){
                        ?>
                        <tr>
                            <td><?php echo $key+1  ?></td>
                            <td><?php echo $value['name']  ?></td>
                            <td><?php echo $value['email']  ?></td>
                            <td><?php echo $role[$value['role']]  ?></td>
                            <td>$<?php echo $value['money']  ?></td>
                            <td><?php echo count(viewerCountByUsers($value['id'])) ?></td>
                            <td><?php echo showTime($value['created_at'])?></td>
                            <td>
                                <a href="post_delete.php?id=<?php echo $value['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete.')" ><i class="feather-trash fa-fw"></i></a>
                                <a href="user_update.php?id=<?php echo $value['id'] ?>" class="btn btn-sm btn-outline-warning"><i class="feather-edit-2 fa-fw"></i></a>
                        </td>
                        </tr>
                        <?php 
                            }
                        ?>
                        </tbody>
                        <!-- <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot> -->
                    </table>
                </div>

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