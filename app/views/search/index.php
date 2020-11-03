
<!--start-breadcrumbs-->
<div class="container-fluid p-0">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="<?=PATH;?>">Home</a></li>
            <li class="breadcrumb-item">Search by "<?=h($query);?>"</li>
        </ol>
    </nav>
</div>
<!--end-breadcrumbs-->

<div class="container-fluid">
    <div class="row">
        <?php if(!empty($products)): ?>
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
                            <div class="srch">
                                <span>-<?= round(100 - ($product->price * 100) / $product->old_price, 1);?>%</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="text-center col-12">
                <?php if ($pagination->countPages > 1): ?>
                    <?=$pagination;?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

