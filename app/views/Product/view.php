<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <?=$breadcrumbs;?>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->

<!--start-single-->
<div class="single contact">
    <div class="container">
        <div class="single-main">
            <div class="col-md-9 single-main-left">
                <div class="sngl-top">
                    <div class="col-md-5 single-top-left">

                        <!--start gallery-->
                        <?php if($gallery): ?>
                        <div class="flexslider">
                            <ul class="slides">
                                <?php foreach($gallery as $item): ?>
                                <li data-thumb="images/<?=$item->img;?>">
                                    <div class="thumb-image">
                                        <img src="images/<?=$item->img;?>" data-imagezoom="true" class="img-responsive" alt=""/>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php else: ?>
                            <img src="images/<?=$product->img;?>"/>
                        <?php endif; ?>
                        <!--end gallery-->

                    </div>

                    <!--start product-->
                    <?php $curr = \store\App::$app->getProperty('currency'); ?>

                    <div class="col-md-7 single-top-right">
                        <div class="single-para simpleCart_shelfItem">
                            <h2><?=$product->title?></h2>

                            <h5 class="item_price" id="base-price" data-base="<?=$product->price * $curr['value'];?>">
                                <?=$curr['symbol_left'];?><?=$product->price * $curr['value'];?><?=$curr['symbol_right'];?>
                            </h5>

                            <?php if($product->old_price): ?>
                                <del>
                                    <?=$curr['symbol_left'];?><?=$product->old_price * $curr['value'];?><?=$curr['symbol_right'];?>
                                </del>
                            <?php endif; ?>

                            <?=$product->content;?>

                            <?php if ($mods): ?>
                            <div class="available">
                                <ul>
                                    <li>Color
                                        <select>
                                            <option>Choose color</option>
                                            <?php foreach($mods as $mod): ?>
                                                <option data-title="<?=$mod->title;?>" data-price="<?=$mod->price * $curr['value'];?>" value="<?=$mod->id;?>">
                                                    <?=$mod->title;?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </li>
                                    <div class="clearfix"> </div>
                                </ul>
                            </div>
                            <?php endif; ?>

<!--                            <div class="quantity">-->
<!--                                <input type="number" size="4" value="1" name="quantity" min="1" step="1">-->
<!--                            </div>-->

                            <a id="productAdd" data-id="<?=$product->id?>" href="cart/add?id=<?=$product->id?>" class="add-cart item_add add-to-cart-link">
                                ADD TO CART</a>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    <!--end product-->

                </div>

                <!--start related products-->
                <?php if($related):?>
                <div class="latestproducts">
                    <div class="product-one">
                        <h3>With this product also bought:</h3>
                        <?php foreach($related as $item): ?>
                        <div class="col-md-4 product-left p-left">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="product/<?=$item['alias'];?>" class="mask">
                                    <img class="img-responsive zoom-img" src="images/<?=$item['img'];?>" alt="" />
                                </a>
                                <div class="product-bottom">
                                    <h3>
                                        <a href="product/<?=$item['alias'];?>">
                                            <?=$item['title'];?>
                                        </a>
                                    </h3>
                                    <h4>
                                        <span class="item_price"><?=$curr['symbol_left'];?><?=$item['price'] * $curr['value'];?><?=$curr['symbol_right'];?></span>

                                        <?php if($item['old_price']): ?>
                                            <del>
                                                <?=$curr['symbol_left'];?><?=$item['old_price'] * $curr['value'];?><?=$curr['symbol_right'];?>
                                            </del>
                                        <?php endif; ?>
                                    </h4>
                                </div>

                                <?php if($item['old_price']): ?>
                                    <div class="srch">
                                        <span>-<?= round(100 - ($item['price'] * 100) / $item['old_price'], 1);?>%</span>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php endif; ?>
                <!--end related products-->

                <!--start recently viewed products-->
                <?php if($recentlyViewed):?>
                    <div class="latestproducts">
                        <div class="product-one">
                            <h3>Recently viewed products:</h3>
                            <?php foreach($recentlyViewed as $item): ?>
                                <div class="col-md-4 product-left p-left">
                                    <div class="product-main simpleCart_shelfItem">
                                        <a href="product/<?=$item['alias'];?>" class="mask">
                                            <img class="img-responsive zoom-img" src="images/<?=$item['img'];?>" alt="" />
                                        </a>
                                        <div class="product-bottom">
                                            <h3>
                                                <a href="product/<?=$item['alias'];?>">
                                                    <?=$item['title'];?>
                                                </a>
                                            </h3>
                                            <h4>
                                                <span class="item_price"><?=$curr['symbol_left'];?><?=$item['price'] * $curr['value'];?><?=$curr['symbol_right'];?></span>

                                                <?php if($item['old_price']): ?>
                                                    <del>
                                                        <?=$curr['symbol_left'];?><?=$item['old_price'] * $curr['value'];?><?=$curr['symbol_right'];?>
                                                    </del>
                                                <?php endif; ?>
                                            </h4>
                                        </div>

                                        <?php if($item['old_price']): ?>
                                            <div class="srch">
                                                <span>-<?= round(100 - ($item['price'] * 100) / $item['old_price'], 1);?>%</span>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php endif; ?>
                <!--end recently viewed products-->
            </div>

            <div class="clearfix"> </div>
        </div>
    </div>
</div>
