<?php require_once "front_panel/head.php"  ?>
<title>Home</title>
<?php require_once "front_panel/side.php"  ?>
<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $current = post($id);
}else{
    redirect("index.php");
}

if(!$current){ //if it doesn't have a current id or a user types id doesn't includes in the DB , it will takes you back to the index page.
    redirect("index.php");
}   

$currentCate = $current['category_id'];
if (isset($_SESSION['user']['id'])) {
    $userId = $_SESSION['user']['id'];
} else {
    $userId = 0;
}
viewerRecord($userId, $id, $_SERVER['HTTP_USER_AGENT']);
?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="d-flex">
                <h4 class="mx-3">
                    <a href="index.php" class="text-decoration-none text-black"><i class="feather-arrow-left"></i></a>
                </h4>
                <h4>Blog Details</h4>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <h2>
                        <?php echo $current['title'] ?>
                    </h2>
                    <div class="">
                        <i class="feather-user text-primary"></i>
                        <?php echo user($current['user_id'])['name'] ?>
                        <i class="feather-layers text-info"></i>
                        <?php echo category($current['category_id'])['title'] ?>
                    </div>
                    <div class="mb-3">
                        <i class="feather-calendar"></i>
                        <?php echo showTime(post($id)['created_at'], "j M Y") ?> |
                        <?php echo date("g:i a", strtotime(post($id)['created_at'])) ?>
                    </div>
                    <h4 class="fw-normal">
                        <?php echo html_entity_decode($current['description'], ENT_QUOTES) ?>
                    </h4>
                </div>
            </div>
            <div class="row">
                <?php foreach (fPostsByCate($currentCate, 2, $id) as $key => $value) { ?>
                    <div class="col-12 col-md-6">
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
                    </div>

                <?php } ?>

            </div>
        </div>
        <?php include "frontSideBar.php" ?>

    </div>
</div>





<?php require_once "front_panel/foot.php"  ?>