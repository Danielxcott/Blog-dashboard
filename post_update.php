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
<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="feather-plus-circle"></i> Post Manage</h4>
                    <a href="" class="btn btn-outline-secondary"><i class="feather-list"></i></a>
                </div>
                <?php
                $id = $_GET['id'];
                $current =post($id);

                if(isset($_POST['updatePostBtn'])){
                    return postUpdate();
                }
                ?>
                <hr>
                <form action="" method="post" >
                <div class="row">
                <div class="form-group">
                <input type="text" name="id" value="<?php echo $id;?>" hidden>
                    <div class="form-group">
                    <label for="">Title</label>
                    <input  class="form-control " type="text" name="title" value="<?php echo $current['title']?>" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control" id="">
                        <?php
                        foreach(categories() as $key => $value){
                        ?>
                        <option value="<?php echo $value['id']?>" <?php echo $value['id'] == $current['category_id']?"selected":"" ?>><?php echo $value['title'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <textarea name="description" id="snote"  type="text" class="form-control" cols="10" rows="10"><?php echo $current['description'] ?></textarea>
                    
                </div>
                        <div>
                        <button class="btn btn-primary" name="updatePostBtn">update</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "template/footer.php"; ?>
<script>
    $('#snote').summernote({
    placeholder: 'Text here',
        tabsize: 2,
        height: 100
});
</script>