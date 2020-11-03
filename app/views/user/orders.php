<!--start-breadcrumbs-->
<div class="container-fluid p-0">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= PATH ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= PATH ?>/user/myaccount">My account</a></li>
            <li class="breadcrumb-item">Order history</li>
        </ol>
    </nav>
</div>
<!--end-breadcrumbs-->

<div class="container">
    <div class="col-md-12">
        <hr>
        <?php if ($orders): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10%">ID</th>
                            <th style="width: 20%">Status</th>
                            <th style="width: 20%">Amount</th>
                            <th style="width: 10%">Currency</th>
                            <th style="width: 20%">Create date</th>
                            <th style="width: 20%">Update date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                        <?php
                        if ($order['status'] == '1') {
                            $class = 'success';
                            $status = 'completed';
                        } elseif ($order['status'] == '2') {
                            $class = 'info';
                            $status = 'paid';
                        } else {
                            $class = '';
                            $status = 'new';
                        }
                        ?>
                            <tr class="<?=$class?>">
                                <td><?=$order->id;?></td>
                                <td><?=$status?></td>
                                <td><?=$order->sum;?></td>
                                <td><?=$order->currency;?></td>
                                <td><?=$order->date;?></td>
                                <td><?=$order->update_date;?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-danger"></p>
        <?php endif; ?>
    </div>
</div>
