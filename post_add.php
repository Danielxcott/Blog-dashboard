<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo $url?>dashboard.php"><i class="feather-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add-Post</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    <?php
    if(isset($_POST['addPostBtn'])){
        return postAdd();
        }
    ?>
<form class="row" method="post">
    <div class="col-12 col-xl-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="feather-plus-circle"></i> Create New Posts</h4>
                </div>
                <hr>
                <div class="row">
                <div class="form-group">
                    <div class="form-group">
                    <label for="">Title</label>
                    <input  class="form-control " type="text" name="title" autofocus required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <textarea name="description" id="snote" type="text" class="form-control" cols="10" rows="10"></textarea>
                </div>         
                </div>
              
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="card">
            <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="feather-layers"></i> Select Categories</h4>
                    <a href="" class="btn btn-outline-secondary"><i class="feather-list"></i></a>
                </div>
                <hr>
            <div class="form-group ">
                    <label for="" class="mb-2">Category</label>
                        <?php
                        foreach(categories() as $key => $value){
                        ?>
                        <div class="form-check">
                        <input class="form-check-input" value="<?php echo $value['id']; ?>" type="radio" name="category_id" id="category_id" required>
                        <label class="form-check-label" for="category_id">
                         <?php echo $value['title']; ?>
                        </label>
                        </div>
                        <?php
                        }
                        ?>
                </div>
                <div>
                        <button class="btn btn-primary" name="addPostBtn">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="<?php echo $url; ?>assets/vendor/jquery-3.3.1.min.js"></script>
<script src="<?php echo $url; ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    let currentPage = location.href
    console.log(currentPage)
    $(".nav-item-link").each(function (){
        let links = $(this).attr("href");
        if(links == currentPage){
            $(this).addClass("active");
        }
    });
    $('#snote').summernote({
    placeholder: 'Text here',
        tabsize: 2,
        height: 500
});
</script>