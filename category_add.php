<?php require_once "core/auth.php"; ?>
<?php require_once "core/isEditor&Admin.php"; ?>
<?php include "template/header.php"; ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo $url?>dashboard.php"><i class="feather-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="feather-plus-circle"></i> Category Manager</h4>
                    <a href="" class="btn btn-outline-secondary"><i class="feather-list"></i></a>
                </div>
                <?php 
                if(isset($_POST['addBtn'])){
                    return categoryAdd();
                }
                ?>
                <hr>
                <form action="" method="post" class="mb-3 g-3 row">
        
                    <div class="col-auto">
                    <label for="catename">Category Name</label>
                    <input id="catename" class="form-control mt-2 " type="text" name="title" autofocus required>
                    </div>
                    <div class="col-auto">
                    <label for="exampleColorInput" class="form-label">Choose color</label>
                    <input type="color" name="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color" required>
                    </div>
                    <div class="col-auto">
                    <button class="btn btn-primary" style="margin-top: 34px;" name="addBtn">Add</button>
                    </div>

                </form>
                <table  class="table mt-3 table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>User</th>
                            <th>Created</th>
                            <th>Control</th>
                        </tr>
                    </thead>
                    <tbody>
 
                            <?php
                                foreach(categories() as $key => $value){
                                
                            ?>
                            <tr class="<?php echo $value['ordering'] == 1? 'table-primary' : '' ?>">
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $value['title']; ?></td>
                            <td><?php echo user($value['user_id'])['name']; ?></td>
                            <td><?php echo showTime($value['created_at']) ?></td>
                            <td >
                                <a href="category_delete.php?id=<?php echo $value['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete.')" ><i class="feather-trash fa-fw"></i></a>
                                <a href="category_update.php?id=<?php echo $value['id'] ?>" class="btn btn-sm btn-outline-warning"><i class="feather-edit-2 fa-fw"></i></a>
                                <?php 
                                if($value['ordering'] != 1){
                                ?>
                                <a href="category_pinToTop.php?id=<?php echo $value['id'] ?>" class="btn btn-sm btn-outline-info"><i class="feather-flag fa-fw"></i></a>
                                <?php 
                                }else{
                                ?>
                                <a href="category_removePin.php?id=<?php echo $value['id'] ?>" class="btn btn-sm btn-outline-info"><i class="feather-x fa-fw"></i></a>
                                <?php 
                                }
                                ?>
                        </td>
                            </tr>
                            <?php
                                }
                            ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-6">
        <div class="card">
            <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="feather-plus-circle"></i> Ads Manager</h4>
                    <a href="" class="btn btn-outline-secondary"><i class="feather-list"></i></a>
                </div>
                <?php 
                if(isset($_POST['adsBtn'])){
                    return adsMaker();
                }
                ?>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="">Owner Name</label>
                    <input type="text" class="form-control" name="oname" required>
                    </div>
                    <div class="form-group">
                    <label for="">Ads Image </label>
                    <input type="text" class="form-control" name="adsimage" required>
                    </div>
                    <div class="form-group">
                    <label for="">Ads Website Link</label>
                    <input type="text" class="form-control" name="adslink" required>
                    </div>
                    <div class="form-group">
                    <label for="">Start Date</label>
                    <input type="date" class="form-control" name="adsdatestart" required>
                    </div>
                    <div class="form-group">
                    <label for="">End Date</label>
                    <input type="date" class="form-control" name="adsdateend" required>
                    </div>
                    <button class="btn btn-primary btn-sm my-3" name="adsBtn">Add</button>
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
    });
</script>



