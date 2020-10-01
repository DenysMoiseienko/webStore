<!-- content header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    Products list
                </h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        Products list
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($products as $product): ?>

                                    <tr>
                                        <td><?=$product['id'];?></td>
                                        <td><?=$product['cat'];?></td>
                                        <td><?=$product['title'];?></td>
                                        <td><?=$product['price'];?></td>
                                        <td><?=$product['status'] ? 'on' : 'off';?></td>
                                        <td><a href="<?=ADMIN;?>/product/edit?id=<?=$product['id'];?>">
                                                <i class="fa fa-fw fa-eye text-black-50"></i></a>
                                        </td>
                                        <td>
                                            <a class="delete" href="<?=ADMIN;?>/product/delete?id=<?=$product['id'];?>">
                                                <i class="fa fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                        <div class="text-left">
                            <p>Showing <?=$start + 1;?> to <?=(($page * $perPage) > $count)? $count : ($page * $perPage);?> of <?=$count;?> products</p>
                            <?php if ($pagination->countPages > 1): ?>
                                <?=$pagination;?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>