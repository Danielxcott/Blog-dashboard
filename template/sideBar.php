
        <!-- navbar -->
        <div class="col-12 col-lg-3 col-xl-2 vh-100 aside">
            <div class=" py-3 mt-3 d-flex justify-content-between align-items-center brand-logo">
                <div class="d-flex justify-content-between align-items-center">
                    <span><i class="feather-moon bg-secondary rounded-circle h4"></i></span>
                    <span style="margin-left: 5px;">
                            <p class="mb-0 h4">MOON</p>
                        </span>
                </div>
                <button class="close-btn btn btn-light d-block d-lg-none">
                    <i class="feather-x text-secondary"></i>
                </button>
            </div>
            <div class="nav-menu">
                <ul>
                    <li class="nav-item">
                        <a href="<?php echo $url?>dashboard.php" class="nav-item-link">
                               <span>
                                <i class="feather-home"></i>
                                Dashboard
                               </span>
                        </a>
                    </li>
                    <li class="nav-divider"></li>
                    <li class="nav-item">
                        <a href="<?php echo $url?>add-item.php" class="nav-item-link">
                                <span>
                                    <i class="feather-plus-circle"></i>
                                    Add Item
                                </span>
                        </a>
                        <a href="<?php echo $url?>items-list.php" class="nav-item-link ">
                                <span>
                                    <i class="feather-list"></i>
                                    Item list
                                </span>
                            <Span class="badge badge-pill bg-light shadow-sm text-black-50">12</Span>
                        </a>
                    </li>
                    <li class="nav-divider"></li>
                    <li class="nav-title">Manage item</li>
                   
                    <li class="nav-item">
                    <a href="<?php echo $url?>post_add.php" class="nav-item-link ">
                                <span>
                                <i class="feather-plus-circle"></i>
                                    Post add
                                </span>
                        </a>
                    <a href="<?php echo $url?>post_list.php" class="nav-item-link ">
                                <span>
                                    <i class="feather-list"></i>
                                    Post list
                                </span>
                                
                            <Span class="badge badge-pill bg-light shadow-sm text-black-50"><?php echo countTableWithId('posts')?></Span>
                        </a>
                       
                    </li>

                    <?php
                     if($_SESSION['user']['role']<=1){
                    ?>

                    <li class="nav-item">
                        
                        <a href="<?php echo $url?>category_add.php" class="nav-item-link" >
                        <!-- style="display:<?php echo $_SESSION['user']['role']>1?"none":"block"; ?>" -->
                                <span>
                                    <i class="feather-plus-circle"></i>
                                   Category
                                </span>
                        </a>
                        <?php if($_SESSION['user']['role']==0){ ?>
                     
                        <a href="<?php echo $url?>user_list.php" class="nav-item-link " >
                        <!-- style="display:<?php echo $_SESSION['user']['role']==0?"block":"none"; ?>" -->
                                <span>
                                    <i class="feather-users"></i>
                                    User Manager
                                </span>
                                
                            <Span class="badge badge-pill bg-light shadow-sm text-black-50"><?php echo counts('users')?></Span>
                        </a>
                    </li>
                    
                    <?php
                    }
                    ?>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        
                        <a href="<?php echo $url?>payment_transfer.php" class="nav-item-link" >

                                <span>
                                    <i class="feather-dollar-sign"></i>
                                   Payment
                                </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

