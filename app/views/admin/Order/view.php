<!-- content header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

                <h1 class="m-0 text-dark">
                    Order: <?=$order['id'];?>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>/order">Orders list</a>
                    </li>
                    <li class="breadcrumb-item">
                        Order: <?=$order['id'];?>
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
                                <tbody>
                                    <tr>
                                        <td>Order date</td>
                                        <td><?=$order['date'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td><?=$order['status'] ? 'completed' : 'new';?></td>
                                    </tr>
                                    <tr>
                                        <td>Amount</td>
                                        <td><?=$order['sum'];?> <?=$order['currency'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Customer</td>
                                        <td><?=$order['name'];?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <h3>Order details</h3>
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Title</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $qty = 0; foreach ($order_products as $product): ?>
                                    <tr>
                                        <td><?=$product->id; ?></td>
                                        <td><?=$product->title; ?></td>
                                        <td><?=$product->qty;   $qty += $product->qty ?></td>
                                        <td><?=$product->size?></td>
                                        <td><?=$product->price * $product->qty; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                    <tr class="active">
                                        <td colspan="3">
                                            <b>Total: </b>
                                        </td>
                                        <td>
                                            <b><?=$qty;?></b>
                                        </td>
                                        <td>
                                            <b><?=$order['sum'];?> <?=$order['currency'];?></b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <?php if (!$order['status']): ?>
                        <a href="<?=ADMIN;?>/order/edit?id=<?=$order['id'];?>&status=1"
                           class="btn btn-success">Approve</a>
                    <?php else: ?>
                        <a href="<?=ADMIN;?>/order/edit?id=<?=$order['id'];?>&status=0"
                           class="btn btn-default">Return for revision</a>
                    <?php endif; ?>
                    <a href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>"
                       class="delete btn btn-danger ml-3">Delete</a>
                </div>

            </div>
        </div>
    </div>
</section>

