<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo $url ?>dashboard.php"><i class="feather-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo $url ?>post_add.php">Add-Posts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Item-List</li>
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
                    <h4 class="mb-0"><i class="feather-plus-circle"></i>Post-Lists</h4>
                    <div>
                        <button class="btn btn-outline-secondary fullscreen-btn"><i class="feather-maximize-2"></i></button>
                        <a href="<?php echo $url ?>add-item.php" class="btn btn-outline-secondary"><i class="feather-list"></i></a>
                    </div>
                </div>
                <hr>
                <div class="overflow-scroll">
                    <table id="table" class="table table-striped " style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <?php
                                if ($_SESSION['user']['role'] == 0) {
                                ?>
                                <th>User</th>
                                <?php
                                }
                                ?>
                                <th>Viewers</th>
                                <th>Category_id</th>
                                <th>Created</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php
                            foreach (posts() as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $key + 1  ?></td>
                                    <td><?php echo $value['title']  ?></td>
                                    <td><?php echo short(strip_tags(html_entity_decode($value['description'])))  ?></td>
                                    <?php
                                    if ($_SESSION['user']['role'] == 0) {
                                    ?>

                                        <td><?php echo user($value['user_id'])['name']  ?></td>
                                    <?php
                                    }
                                    ?>
                                    <td><?php echo count(viewerCounts($value['id'])) ?></td>
                                    <td><?php echo category($value['category_id'])['title'] ?></td>
                                    <td><?php echo showTime($value['created_at']) ?></td>
                                    <td class="text-nowrap">
                                        <a href="post_delete.php?id=<?php echo $value['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete.')"><i class="feather-trash fa-fw"></i></a>
                                        <a href="post_detail.php?id=<?php echo $value['id'] ?>" class="btn btn-sm btn-outline-info"><i class="feather-info fa-fw"></i></a>
                                        <a href="post_update.php?id=<?php echo $value['id'] ?>" class="btn btn-sm btn-outline-warning"><i class="feather-edit-2 fa-fw"></i></a>
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
<script src="<?php echo $url; ?>assets/vendor/jquery-3.3.1.min.js"></script>
<script src="<?php echo $url; ?>assets/vendor/data_table/dataTables.min.js"></script>
<script src="<?php echo $url; ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="<?php echo $url; ?>assets/vendor/data_table/DataTables-1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $('#table').DataTable({
        "order": [
            [0, "desc"]
        ]
    });
    let currentPage = location.href
    console.log(currentPage)
    $(".nav-item-link").each(function (){
        let links = $(this).attr("href");
        if(links == currentPage){
            $(this).addClass("active");
        }
    });
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