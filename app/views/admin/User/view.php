<!-- content header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <?=$user->name;?>
                </h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>/user">Users list</a>
                    </li>
                    <li class="breadcrumb-item">
                        <?=$user->name;?>
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
                    <div class="boxbody">
                        <p>Login: <?=h($user->login);?></p>
                        <p>Email: <?=h($user->email);?></p>
                        <p>Address: <?=h($user->address);?></p>
                        <p>Role: <?=h($user->role);?></p>
                    </div>
                </div>

                <h3>User orders</h3>

                <div class="box">
                    <div class="box-body">
                        <?php if ($orders): ?>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">

                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Create date</th>
                                        <th>Edit date</th>
                                        <th>View</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php foreach ($orders as $order): ?>
                                        <?php $class = $order['status'] ? 'alert alert-secondary' : '' ;?>
                                        <tr class="<?=$class?>">
                                            <td><?=$order['id'];?></td>
                                            <td><?=$order['status'] ? 'completed' : 'new';?></td>
                                            <td><?=$order['sum'];?> <?=$order['currency'];?></td>
                                            <td><?=$order['date'];?></td>
                                            <td><?=$order['update_at'];?></td>
                                            <td><a href="<?=ADMIN;?>/order/view?id=<?=$order['id'];?>">
                                                    <i class="fa fa-fw fa-eye text-black-50"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        <?php else: ?>
                            <p class="text-danger">User has not ordered anything yet...</p>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
