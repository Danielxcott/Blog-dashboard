<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo $url?>dashboard.php"><i class="feather-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add-Item</li>
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
                    <h4 class="mb-0"><i class="feather-plus-circle"></i> Add items</h4>
                    <a href="" class="btn btn-outline-secondary"><i class="feather-list"></i></a>
                </div>
                <hr>
                <form action="" method="post" >
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2">
                                <label for="photo">Add photo</label>
                                <i class="feather-alert-circle"  type="button" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="only png & jpg"></i>
                                <input type="file" name="photo" id="photo" class="form-control p-1" required >
                            </div>
                            <div class="form-group mb-2">
                                <label for="name">Item Name</label>
                                <input type="text" id="name" name="name" required class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="type">Item Type</label>
                                <select name="type" id="type" class="form-control custom-select">
                                    <option value="0" selected>Select the items</option>
                                    <option value="1">electronic</option>
                                    <option value="2">decorative</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="cate">Category</label>
                                <select name="type" id="cate" class="form-control custom-select">
                                    <option value="" selected disabled>"Select the Category"</option>

                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="sub">Sub Category</label>
                                <select name="type" id="sub" class="form-control custom-select">
                                    <option value="" selected disabled>"Select the Sub-Category"</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="quantity">Quantity</label>
                                        <input type="text" id="quantity" name="name" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="unit">Units</label>
                                        <select name="type" id="unit" class="form-control custom-select">
                                            <option value="0">"ကုန်စို"</option>
                                            <option value="0">"ကုန်ခြောက်"</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="price">Price</label>
                                <input type="number" id="price" required class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="des">Description</label>
                                <textarea name="" id="des"  rows="7" class="form-control">hello</textarea>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary float-end" id="submit">upload</button>
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
    let category = ["phone","plants","laptop"];
    let sub =[
        {name:"apple",category_id:0},
        {name:"googlepixel",category_id:0},
        {name:"huawei",category_id:0},
        {name:"samsung",category_id:0},
        {name:"Mi",category_id:0},
        {name:"oppo",category_id:0},
        {name:"potted faux",category_id:1},
        {name:"Bonsai tree",category_id:1},
        {name:"Monstera deliciosa",category_id:1},
        {name:"House plants",category_id:1},
        {name:"macbook",category_id:2},
        {name:"matebook",category_id:2},
        {name:"galaxybook",category_id:2},
        {name:"Hp",category_id:2},
        {name:"Acer",category_id:2},
    ]
    // category.map(function(el,index){
    //     $("#cate").append(`<option value="${index}">${el}</optiob>`)
    // })
    // sub.map(function(el,index){
    //     $("#sub").append(`<option value="${index}" data-category="${el.category_id}">${el.name}</optiob>`)

    // })
    // $("#cate").on("change",function(){
    //     let current = $(this).val();
    //     $("#sub option").hide();
    //     $(`[data-category=${current}]`).show();
    // })


    category.map(function(el,index){
        $("#cate").append(`<option value="${index}">${el}</option>`)
    })
    sub.map(function(el,index){
        $("#sub").append(`<option value="${index}" data-category="${el.category_id}">${el.name}</option>`)
    })
    $("#cate").on("change",function(el,index){
        let current = $(this).val();
        $("#sub option").hide();
        $(`[data-category="${current}"]`).show();
    })
</script>
