<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    Details: <?=$product->title;?> <?=$product->color;?>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>/product">Products list</a>
                    </li>
                    <li class="breadcrumb-item">
                        Details: <?=$product->title;?> <?=$product->color;?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

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
                                    <th>image</th>
                                    <th>Title</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><img src="images/<?=$product->img;?>" alt="" /></td>
                                    <td><?=$product->title;?> <?=$product->color;?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card card-secondary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Available sizes</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="card-body" style="display: none;">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Size</th>
                                        <th>Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($product_sizes as $size): ?>
                                        <tr>
                                            <td><?=$size['value'];?></td>
                                            <td><?=$size['qty'];?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <form action="<?=ADMIN;?>/product-size/view?id=<?=$product['id'];?>" method="post" id="details">
                            <div class="card card-secondary collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Size and quantity</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <div class="size" id="reset">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <select class="custom-select" name="size" id="size">
                                                        <option value="" selected disabled hidden>Size</option>
                                                        <?php foreach ($all_sizes as $size): ?>
                                                            <option><?=$size->value;?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <select class="custom-select" name="quantity" id="quantity">
                                                        <option value="" selected disabled hidden>Quantity</option>
                                                        <?php for ($i = 0; $i <= 10; $i++): ?>
                                                            <option><?=$i;?></option>
                                                        <?php endfor; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <button id="reset-size" class="btn btn-danger">Reset</button>
                                            </div>
                                            <div>
                                                <input type="submit" id="reset-size" class="btn btn-success" value="Add">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>