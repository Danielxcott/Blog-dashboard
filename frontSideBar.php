<div class="col-12 col-md-4">
            <div class="front-panel">
            <div class="card clearfix">
                <div class="card-body rounded-3" id="fsideBar">
                 <?php if(isset($_SESSION['user']['id'])){ ?>

                    <div class="float-start">
                 <p class="mb-0 text-light text-capitalize text-center"> Hi <b><?php echo $_SESSION['user']['name'] ?></b> </p>
                 </div>
                 <a href="<?php echo $url?>dashboard.php" class="float-end">
                 <img  src="<?php echo $url?>assets/img/profile/<?php echo $_SESSION['user']['photo']?>" alt="" class="user-img ">
                </a>

                 <?php }else{?>

                    <div class="float-start">
                    <p class="mb-0 text-light text-center"> Hi <b>Guest</b> </p>
                    </div>
                    <a href="<?php echo $url?>register.php" class="float-end">
                    <img  src="<?php echo $url?>assets/img/profile/gust.png" alt="" class="user-img ">
                   </a>

                 <?php }?>
                </div>
            </div>
            <h4>Category Lists</h4>
            <div class="list-group mb-4">
            <a href="index.php" class="list-group-item list-group-item-action <?php echo isset($_GET['category_id'])?'':'active' ?>">All Categories</a>
                <?php foreach(fCategories() as $key=>$value){ ?>
                <a href="categoryBase_post.php?category_id=<?php echo $value['id']?>" class="list-group-item list-group-item-action <?php echo isset($_GET['category_id'])? ($_GET['category_id']==$value['id']?'active':''):'' ?>">
                <?php if($value['ordering']==1){
                    ?>
                <i class="feather-paperclip text-info"></i>
                <?php
                }
                ?>
                <?php echo $value['title'] ?></a>
                <?php } ?>
            </div>
            <div class="mb-4">
            <h4>Advertisements</h4>
            <!-- <?php foreach(ads() as $value){ ?>
           <a href="<?php echo $value['link'] ?>">
           <img src="<?php echo $url ?>assets/img/ads/<?php echo $value['photo'] ?>" alt="" class="w-100 rounded">
           </a>
            <?php }?> --> 
            <?php foreach(ads() as $value){ ?>
                <a href="<?php echo $value['link'] ?>">
           <img src="<?php echo $value['photo'] ?>" alt="" class="w-100 rounded">
           </a>
            <?php }?>
            </div>
            <div class="mb-4">
                <h4>Search By Date</h4>
                <div class="card">
                    <div class="card-body">
                    <form action="searchByDate.php" method="post" >
                        <div class="form-group mb-2">
                        <label for="">Start date</label>
                        <input type="date" class="form-control" name="start">
                        </div>
                        <div class="form-group mb-2">
                        <label for="">End date</label>
                        <input type="date" class="form-control" name="end">
                        </div>
                        <button class="btn btn-primary">
                            <i class="feather-calendar"></i>
                            Search
                        </button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="mb-4">
            <h4>Advertisements</h4>
            <?php foreach(ads() as $value){ ?>
                <a href="<?php echo $value['link'] ?>">
           <img src="<?php echo $value['photo'] ?>" alt="" class="w-100 rounded">
           </a>
            <?php }?>
            </div>
            </div>
        </div>