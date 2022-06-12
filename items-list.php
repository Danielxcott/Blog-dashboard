<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo $url?>dashboard.php"><i class="feather-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo $url?>add-item.php">Add-Item</a></li>
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
                    <h4 class="mb-0"><i class="feather-plus-circle"></i>Items-List</h4>
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

                            <th>ItemName</th>
                            <th>ItemType</th>
                            <th>Category</th>
                            <th>Sub-Category</th>
                            <th>Quantity</th>
                            <th>Units</th>
                            <th>Price</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        <tr>

                            <td>House plants</td>
                            <td>decorative</td>
                            <td>Plants</td>
                            <td>House plant</td>
                            <td>2</td>
                            <td>1</td>
                            <td>23000MMK</td>
                            <td>get this and decorate your house with house plants! </td>
                        </tr>
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

