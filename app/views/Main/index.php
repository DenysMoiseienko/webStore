<?php if($hits): ?>
<?php  $curr = \store\App::$app->getProperty('currency'); ?>
<div class="product my-3">
    <div class="container-fluid">
        <div class="row align-items-stretch">
             <?php foreach($hits as $hit): ?>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                    <div class="card h-100">
                        <a href="product/<?=$hit->alias;?>" class="mask">
                            <img class="card-img-top" src="images/<?=$hit->img;?>" alt="" />
                        </a>
                        <div class="card-body">
                            <a class="card-link" href="product/<?=$hit->alias;?>"><?=$hit->title;?> <?=$hit->color;?></a>
                        </div>
                        <div class="card-footer">
                            <?php if($hit->old_price): ?>
                                <small>
                                    <del>
                                        <?=$curr['symbol_left'];?><?=$hit->old_price * $curr['value'];?><?=$curr['symbol_right'];?>
                                    </del>
                                </small>
                            <?php endif; ?>
                            <span class="item_price">
                                <?=$curr['symbol_left'];?><?=$hit->price * $curr['value'];?><?=$curr['symbol_right'];?>
                            </span>
                        </div>
                        <?php if($hit->old_price): ?>
                            <div class="srch">
                            <span>-<?= round(100 - ($hit->price * 100) / $hit->old_price, 1);?>%</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
             <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>