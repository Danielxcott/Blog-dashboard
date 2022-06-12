<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>

<div class="row">
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-4">
        <div class="card  status-card">
            <div class="card-body">
                <div class="row align-items-center ">
                    <div class="col-4">
                        <i class="feather-users h2"></i>
                    </div>
                    <div class="col-8">
                        <p class="mb-2 h2 fw-bolder"><span class="counter-up"><?php echo counts('viewers') ?></span></p>
                        <p class="mb-0 text-black-50">Total Visitors</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-4">
        <div class="card status-card" onclick="go('<?php echo $url ?>post_list.php')">
            <div class="card-body">
                <div class="row align-items-center ">
                    <div class="col-4">
                        <i class="feather-feather h2"></i>
                    </div>
                    <div class="col-8">
                        <p class="mb-2 h2 fw-bolder"><span class="counter-up"><?php echo counts('posts') ?></span></p>
                        <p class="mb-0 text-black-50">Total Posts</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-4 ">
        <div class="card status-card">
            <div class="card-body">
                <div class="row align-items-center ">
                    <div class="col-4">
                        <i class="feather-file h2"></i>
                    </div>
                    <div class="col-8">
                        <p class="mb-2 h2 fw-bolder"><span class="counter-up"><?php echo counts('category') ?></span></p>
                        <p class="mb-0 text-black-50">Total Categories</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-4 ">
        <div class="card status-card">
            <div class="card-body">
                <div class="row align-items-center ">
                    <div class="col-4">
                        <i class="feather-users h2"></i>
                    </div>
                    <div class="col-8">
                        <p class="mb-2 h2 fw-bolder"><span class="counter-up"><?php echo counts('users') ?></span></p>
                        <p class="mb-0 text-black-50">Total Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-12 mb-4 col-xl-7 mb-xl-4">
        <div class="card shadow-sm overflow-hidden">
            <div class="">
                <div class="d-flex justify-content-lg-between align-items-center p-4">
                    <h4 class="ov">Visitors</h4>
                    <div class="text-center">
                        <?php foreach (viewers(5) as $v){ ?>
                            <img class="user-img user-img-2" src="<?php echo $url ?>assets/img/profile/<?php echo user($v['user_id'])['photo'] ? user($v['user_id'])['photo'] : "gust.png";  ?>" alt="">
                        <?php }?>
                    </div>
                </div>
               

                <canvas id="ov" height="124"></canvas>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-5 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div>
                    <div class="">
                        <h4 class="ov">Categories and Posts</h4>
                        <div class="">
                        </div>
                        <canvas id="op" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        $totalpost = counts('posts');
        $currentID = $_SESSION['user']['id'];
        $userPosts = counts('posts',"user_id='$currentID'");
        $totalPercent = ($userPosts/$totalpost)*100;
        $finalResult = floor($totalPercent);
    ?>
    <div class="col-12 col-xl-12 mb-4 mb-xl-4">
        <div class="card table-content">
            <div class="card-content d-flex justify-content-between align-items-center">
                <h4 class="mb-0 p-3 card-title" style="font-size: 18px;">Recent Posts</h4>
                <div class="mx-3">
                <small>Your posts : <?php echo $userPosts ?></small>
                <div class="progress" style="width: 200px;">
                 <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $finalResult ?>%"></div>
                    </div>  
                </div>
                          
                </div>

            <div class="">
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
                            foreach (dPosts(5) as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $key + 1  ?></td>
                                    <td><?php echo short($value['title'],5)  ?></td>
                                    <td><?php echo short(strip_tags(html_entity_decode($value['description'])),10)  ?></td>
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


<?php include "template/footer.php"; ?>
<script>
    <?php
    $cateName = [];
    $countPostByCateName = [];
    $color = [];
    $dateArr=[];
    $visitorRate=[];
    $tranRate=[];
    foreach (categories() as $c) {
        array_push($cateName, $c['title']);
        //SELECT COUNT(id) FROM posts WHERE category_id=1; 1 or any nums come from $c['id'];
        array_push($countPostByCateName, counts('posts', "category_id={$c['id']}"));
        array_push($color, $c['color']);
    }
    $todayDate = date('Y-m-d');
    for($i=0;$i<10;$i++){
        $date = date_create($todayDate);
        date_sub($date,date_interval_create_from_date_string("$i days"));
        $current = date_format($date,"Y-m-d");
        array_push($dateArr,$current);
        $result = counts("viewers","CAST(created_at AS DATE)='$current'");
        array_push($visitorRate,$result);
        $currentID = $_SESSION['user']['id'];
        if($_SESSION['user']['id']>1){
            $result2 = countTransition("payment","CAST(created_at AS DATE)='$current'");
        }else{
            $result2 = counts("payment","CAST(created_at AS DATE)='$current'");
        }
        array_push($tranRate,$result2);
    }
    ?>;

    let currentPage = location.href
    console.log(currentPage)
    $(".nav-item-link").each(function() {
        let links = $(this).attr("href");
        if (links == currentPage) {
            $(this).addClass("active");
        }
    })

    let dateArr =<?php echo json_encode($dateArr) ?>;
    let orderCounterArr = <?php echo json_encode($visitorRate) ?>;
    let viewcounter = <?php echo json_encode($tranRate) ?>;

    let ctx = document.getElementById('ov').getContext('2d');

    $(function() {
        let myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dateArr,
                datasets: [{
                        label: 'Views',
                        data: orderCounterArr,
                        backgroundColor: [
                            " #0d6efd30",
                        ],
                        borderColor: [
                            "#0d6efd30",
                        ],
                        borderWidth: 2,
                        tension: 0,
                        fill: false,
                        borderColor: '#0d6efd30',
                        animations: {
                            borderColor: {
                                type: "color",
                                duration: 1000,
                                easing: 'linear',
                                from: "green",
                                to: "red",
                                loop: true
                            }
                        },
                    },
                    {
                        label: 'Transition',
                        data: viewcounter,
                        backgroundColor: [
                            " #198754",
                        ],
                        borderColor: [
                            "#198754",
                        ],
                        borderWidth: 1,
                        tension: 0,
                        fill: false,
                        borderColor: '#198754',
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        display: false,
                        ticks: {
                            beginAtZero: true,
                        }
                    }],
                    xAxes: [{
                        display: false,
                        gridLines: false,
                    }]

                },
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 5,
                        loop: true
                    }
                },
                legend: {
                    labels: {
                        usePointStyle: true,
                    }
                },


            }
        });

    })



    let countArr = <?php echo json_encode($countPostByCateName) ?>;
    let cateArr = <?php echo json_encode($cateName) ?>;

    const op = document.getElementById('op').getContext('2d');
    $(function() {
        let myChart = new Chart(op, {
            type: 'doughnut',
            data: {
                labels: cateArr,
                datasets: [{
                    label: '# of Votes',
                    data: countArr,
                    backgroundColor: <?php echo json_encode($color) ?>,
                    borderColor: <?php echo json_encode($color) ?>,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        display: false,
                    }],
                    xAxes: [{
                        display: false,
                    }],
                    y: {
                        beginAtZero: true
                    }
                },
                legend: {
                    position: "bottom",
                    label: {
                        usePointStyle: true,
                    }
                }
            }
        });
    })
</script>