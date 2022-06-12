<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo $url ?>dashboard.php"><i class="feather-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Payment</li>
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
                    <h4 class="mb-0"><i class="feather-dollar-sign"></i> Payment Transfer</h4>
                    <div class="btn btn-outline-secondary"><i class="feather-user"></i>Your money : $ <?php echo user($_SESSION['user']['id'])['money'] ?></div>
                </div>
                <?php
                if (isset($_POST['payNow'])) {
                    return payNow();
                }
                ?>
                <hr>
                <form action="" method="post" class="g-3 row">
                    <div class="col-3">
                        <label for=""><b>Pay amount</b></label>
                        <input class="form-control " type="number" min="100" max="<?php echo user($_SESSION['user']['id'])['money'] ?>" name="amount" autofocus required>
                    </div>
                    <div class="col-3">
                        <label for=""><b>Description</b></label>
                        <input class="form-control " type="text" name="description" autofocus required>
                    </div>
                    <div class="col-3">
                        <label for=""><b>To user</b></label>
                        <select name="to_user" class="form-select" id="">
                            <option value="" selected disabled>Select user name</option>
                            <?php foreach (users() as $value) { ?>
                                <?php if($value['id'] != $_SESSION['user']['id']){ ?>
                                <option value="<?php echo $value['id']?>" ><?php echo $value['name'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary w-100 mt-4" name="payNow">Transfer</button>
                    </div>
                    </form>
                    <hr>
                    <table id="table" class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Date / Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     foreach( transitions() as $key => $value){
                    ?>
                    <tr>
                        <td><?php echo $key+1 ?></td>
                        <td><?php echo user($value['from_user'])['name'] ?></td>
                        <td><?php echo user($value['to_user'])['name'] ?></td>
                        <td><?php echo $value['amount']?></td>
                        <td><?php echo $value['description'] ?></td>
                        <td>
                            <?php echo date('d-M-Y | g:i a',strtotime($value['created_at']))?> 
                    </td>

                    </tr>
                                    
                    <?php } ?>
                </tbody>
            </table>
            </div>

           
            
            
        </div>
    </div>
</div>

</div>
<script src="<?php echo $url; ?>assets/vendor/jquery-3.3.1.min.js"></script>
<script src="<?php echo $url; ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="<?php echo $url; ?>assets/vendor/data_table/dataTables.min.js"></script>
<script src="<?php echo $url; ?>assets/vendor/data_table/DataTables-1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $('#table').DataTable({
        "order": [
            [0, "asc"]
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