<?php require_once "front_panel/head.php"  ?>
<title>Home</title>
<?php require_once "front_panel/side.php"  ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="clearfix">
            <h4 class="float-start">Your Daily Blogs</h4>
            <div class="dropdown mb-2 float-end">
                <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Sort
                    </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="index.php">Default</a></li>
                    <li><a class="dropdown-item" href="?order_by=created_at&orderType=asc">Old posts</a></li>
                    <li><a class="dropdown-item" href="?order_by=created_at&orderType=desc">New posts</a></li>
                </ul>
            </div>
            </div>
            <div>
            
                <?php 
                if(isset($_GET['order_by']) && isset($_GET['orderType'])){
                     $order_by=$_GET['order_by'];
                    $orderType=strtoupper($_GET['orderType']);
                    $frontposts = fPosts($order_by,$orderType);
                }else{
                    $frontposts = fPosts();
                }
                foreach ($frontposts as $key => $value) { 
                    ?>
                    <div class="card shadow-sm mb-3 post">
                        <div class="card-body">
                            <a href="detail.php?id=<?php echo $value['id'] ?>" class="text-black text-decoration-none">
                                <h2><?php echo $value['title'] ?></h2>
                            </a>
                            <div class="my-3">
                                <i class="feather-user text-primary"></i>
                                <?php echo user($value['user_id'])['name'] ?>
                                <i class="feather-layers text-info"></i>
                                <?php echo category($value['category_id'])['title'] ?>
                                <i class="feather-calendar"></i>
                                <?php echo showTime($value['created_at'], "j M Y") ?> |
                                <?php echo date("g:i a", strtotime($value['created_at'])) ?>
                            </div>
                            <p class="text-secondary">
                                <?php echo short(strip_tags(html_entity_decode($value['description'])), 200) ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php include "frontSideBar.php" ?>

    </div>
</div>





<?php require_once "front_panel/foot.php"  ?>