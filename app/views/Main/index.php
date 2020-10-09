<?php if($hits): ?>
<?php  $curr = \store\App::$app->getProperty('currency'); ?>
<div class="product">
    <div class="container">
        <div class="product-top">
            <div class="product-one">
             <?php foreach($hits as $hit): ?>
                    <div class="col-md-3 product-left">
                    <div class="product-main simpleCart_shelfItem">
                        <a href="product/<?=$hit->alias;?>" class="mask"><img
                                    class="img-responsive zoom-img" src="images/<?=$hit->img;?>" alt="" /></a>
                        <div class="product-bottom">
                            <h3><a href="product/<?=$hit->alias;?>"><?=$hit->title;?></a></h3>
                            <h4>
                                <span class=" item_price">
                                    <?=$curr['symbol_left'];?><?=$hit->price * $curr['value'];?><?=$curr['symbol_right'];?>
                                </span>
                                <?php if($hit->old_price): ?>
                                    <small>
                                        <del>
                                            <?=$curr['symbol_left'];?><?=$hit->old_price * $curr['value'];?><?=$curr['symbol_right'];?>
                                        </del>
                                    </small>
                                <?php endif; ?>
                            </h4>
                        </div>
                            <?php if($hit->old_price): ?>
                                <div class="srch">
                                <span>-<?= round(100 - ($hit->price * 100) / $hit->old_price, 1);?>%</span>
                                </div>
                            <?php endif; ?>
                    </div>
                </div>
             <?php endforeach; ?>
              <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
