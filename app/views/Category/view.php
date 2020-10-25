<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <?=$breadcrumbs; ?>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->

<div id="filters" class="col-md-4 filters">
    <h4><a rel="nofollow" href="#">Filters</a></h4>
    <div class="filter_bar">
        <?php new \app\widgets\filter\Filter(); ?>
    </div>
</div>

<div class="col-md-4 sort">
    <?php $selected= $_GET['sort'] ;?>
    <h4>Sort</h4>
    <select class="form-control" name="sort">
        <option data-desc="desc" <?php if($selected == 'desc') echo("selected");?>>desc</option>
        <option data-asc="asc" <?php if($selected == 'asc') echo("selected"); ?>>asc</option>
    </select>
</div>

<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12 prdt-left">
                <?php if(!empty($products)): ?>
                    <div class="product-one">
                        <?php $curr = \store\App::$app->getProperty('currency') ; ?>
                        <?php foreach($products as $product): ?>
                            <div class="col-md-3 product-left p-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="product/<?=$product->alias;?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$product->img;?>" alt="" /></a>
                                    <div class="product-bottom">
                                        <h3><?=$product->title;?></h3>
                                        <h4>
                                            <span class=" item_price"><?=$curr['symbol_left'];?><?=$product->price * $curr['value'];?><?=$curr['symbol_right'];?></span>
                                            <?php if($product->old_price): ?>
                                                <small><del><?=$curr['symbol_left'];?><?=$product->old_price * $curr['value'];?><?=$curr['symbol_right'];?></del></small>
                                            <?php endif; ?>
                                        </h4>
                                    </div>

                                    <?php if($product['old_price']): ?>
                                        <div class="srch srch1">
                                            <span>-<?= round(100 - ($product['price'] * 100) / $product['old_price'], 1);?>%</span>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                        <div class="text-center">
                            <?php if ($pagination->countPages > 1): ?>
                            <?=$pagination;?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <h3>No products in this category yet</h3>
                <?php endif; ?>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
