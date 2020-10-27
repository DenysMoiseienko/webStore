<!-- content header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    Orders list
                </h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        Orders list
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

                        <div class="container-fluid">
                            <div class="row">
                                <div class="text-left">
                                    <p>Showing <?=$start + 1;?> to <?=(($page * $perPage) > $count)? $count : ($page * $perPage);?> of <?=$count;?> products</p>
                                </div>
                                <div class="ml-auto">
                                    <?php if ($pagination->countPages > 1): ?>
                                        <?=$pagination;?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Create date</th>
                                        <th>Edit date</th>
                                        <th>View</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($orders as $order): ?>
                                    <?php $class = $order['status'] ? 'alert alert-secondary' : '' ;?>
                                    <tr class="<?=$class?>">
                                        <td><?=$order['id'];?></td>
                                        <td><?=$order['name'];?></td>
                                        <td><?=$order['status'] ? 'completed' : 'new';?></td>
                                        <td><?=$order['sum'];?> <?=$order['currency'];?></td>
                                        <td><?=$order['date'];?></td>
                                        <td><?=$order['update_at'];?></td>
                                        <td><a href="<?=ADMIN;?>/order/view?id=<?=$order['id'];?>">
                                                <i class="fa fa-fw fa-eye text-black-50"></i></a>
                                        </td>
                                        <td>
                                            <a class="delete" href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>">
                                                <i class="fa fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="ml-auto">
                                    <?php if ($pagination->countPages > 1): ?>
                                        <?=$pagination;?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
