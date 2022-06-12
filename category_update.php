<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo $url ?>dashboard.html"><i class="feather-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                    <h4 class="mb-0"><i class="feather-plus-circle"></i> Category Manager</h4>
                    <a href="" class="btn btn-outline-secondary"><i class="feather-list"></i></a>
                </div>
                <?php
                $id = $_GET['id'];
                $current = category($id);

                if (isset($_POST['updateBtn'])) {
                    return categoryUpdate();
                }
                ?>
                <hr>
                <form action="" method="post">
                    <div class="form-group col-6">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" name="id" value="<?php echo $id ?>" hidden>
                                <input class="form-control " type="text" name="title" value="<?php echo $current['title']; ?>" autofocus required>
                            </div>
                            <button class="btn btn-primary col-3" name="updateBtn">Update</button>
                        </div>
                    </div>
                </form>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>User</th>
                            <th>Created</th>
                            <th>Control</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach (categories() as $key => $value) {

                        ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $value['title']; ?></td>
                                <td><?php echo user($value['user_id'])['name']; ?></td>
                                <td><?php echo showTime($value['created_at']) ?></td>
                                <td>
                                    <a href="category_delete.php?id=<?php echo $value['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete.')"><i class="feather-trash fa-fw"></i></a>
                                    <a href="category_update.php?id=<?php echo $value['id'] ?>" class="btn btn-sm btn-outline-warning"><i class="feather-edit-2 fa-fw"></i></a>
                                    <a href="category_pinToTop.php" class="btn btn-sm btn-outline-info"><i class="feather-flag fa-fw"></i></a>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "template/footer.php"; ?>