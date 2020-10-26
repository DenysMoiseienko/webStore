<!--start-breadcrumbs-->
<div class="container-fluid p-0">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?=$breadcrumbs; ?>
        </ol>
    </nav>
</div>
<!--end-breadcrumbs-->

<div id="filters" class="col-md-4 filters">
    <h4>Filters</h4>
    <div class="filter_bar">
        <?php new \app\widgets\filter\Filter(); ?>
    </div>
</div>

<div class="col-md-4 sort">
    <?php $selected = !empty($_GET['sort']) ? $_GET['sort'] : 'desc'; ?>
    <h4>Sort</h4>
    <select class="form-control" name="sort">
        <option data-desc="desc" <?php if($selected == 'desc') echo("selected");?>>desc</option>
        <option data-asc="asc" <?php if($selected == 'asc') echo("selected"); ?>>asc</option>
    </select>
</div>
<div class="container-fluid">
        <?php if(!empty($products)): ?>
            <div class="product-one row">
                <?php $curr = \store\App::$app->getProperty('currency') ; ?>
                <?php foreach($products as $product): ?>
                    <div class="col-sm-6 col-md-3 col-lg-2 mb-3">
                        <div class="card h-100">
                            <a href="product/<?=$product->alias;?>" class="mask">
                                <img class="card-img-top" src="images/<?=$product->img;?>" alt="" />
                            </a>
                            <div class="card-body">
                                <a class="card-link" href="product/<?=$product->alias;?>"><?=$product->title;?></a>
                            </div>
                            <div class="card-footer">
                                <?php if($product->old_price): ?>
                                    <small>
                                        <del>
                                            <?=$curr['symbol_left'];?><?=$product->old_price * $curr['value'];?><?=$curr['symbol_right'];?>
                                        </del>
                                    </small>
                                <?php endif; ?>
                                <span class="item_price">
                                    <?=$curr['symbol_left'];?><?=$product->price * $curr['value'];?><?=$curr['symbol_right'];?>
                                </span>
                            </div>
                            <?php if($product->old_price): ?>
                                <div class="srch srch1">
                                <span>-<?= round(100 - ($product['price'] * 100) / $product['old_price'], 1);?>%</span>
                                </div>
                            <?php endif; ?>
                        </div><!--/.card-->
                    </div>
                <?php endforeach; ?>
                <div class="text-center col-12">
                    <?php if ($pagination->countPages > 1): ?>
                    <?=$pagination;?>
                    <?php endif; ?>
                </div>
            </div>
         <?php else: ?>
            <h3>No products in this category yet</h3>
         <?php endif; ?>
    </div>

