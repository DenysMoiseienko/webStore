<!--start-breadcrumbs-->
<div class="container-fluid p-0">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?=$breadcrumbs; ?>
        </ol>
    </nav>
</div>
<!--end-breadcrumbs-->

<!--start-single-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 single-top-left">
                <!--start gallery-->
                <?php if($gallery): ?>
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <div id="slider" class="slider-nav">
                                <?php foreach($gallery as $item): ?>
                                <div>
                                    <img src="images/<?=$item->img;?>" data-imagezoom="true" class="img-responsive" alt=""/>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-9">
                            <div id="carousel" class="slider-for">
                                <?php foreach($gallery as $item): ?>
                                <div>
                                    <img src="images/<?=$item->img;?>" data-imagezoom="true" class="img-responsive" alt=""/>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
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

                    <!-- <?php if ($mods): ?>
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
                    <?php endif; ?> -->

                    <?php if ($sizes): ?>
                        <div class="available">
                            <ul>
                                <li>Size
                                    <select>
                                        <option>Choose size</option>
                                        <?php foreach($sizes as $size): ?>
                                            <option data-id="<?=$size['id'];?>" data-qty="<?=$size['qty'];?>" value="<?=$size['value'];?>">
                                                <?=$size['value'];?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </li>
                                <div class="clearfix"> </div>
                            </ul>
                        </div>

                        <div class="quantity">
                            <input type="number" size="4" value="1" name="quantity" min="1" step="1">
                        </div>

                        <a id="productAdd" data-id="<?=$product->id?>" href="cart/add?id=<?=$product->id?>" class="add-cart item_add add-to-cart-link">
                            ADD TO CART</a>
                    <?php else: ?>
                        <div>
                            <h3>Out of stock</h3>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <!--end product-->
        </div>
    </div>
    <!--start related products-->
    <?php if($related):?>
    <div class="container-fluid">
        <h3 class="mt-3">With this product also bought:</h3>
        <div class="row">
            <?php foreach($related as $product): ?>
            <div class="col-sm-6 col-md-3 col-lg-2 mb-3">
                <div class="card h-100">
                    <a href="product/<?=$product['alias'];?>" class="mask">
                        <img class="card-img-top" src="images/<?=$product['img'];?>" alt="" />
                    </a>
                    <div class="card-body">
                        <a class="card-link" href="product/<?=$product['alias'];?>"><?=$product['title'];?></a>
                    </div>
                    <div class="card-footer">
                        <?php if($product['old_price']): ?>
                            <small>
                                <del>
                                    <?=$curr['symbol_left'];?><?=$product['old_price'] * $curr['value'];?><?=$curr['symbol_right'];?>
                                </del>
                            </small>
                        <?php endif; ?>
                        <span class="item_price">
                            <?=$curr['symbol_left'];?><?=$product['price'] * $curr['value'];?><?=$curr['symbol_right'];?>
                        </span>
                    </div>
                    <?php if($product['old_price']): ?>
                        <div class="srch srch1">
                        <span>-<?= round(100 - ($product['price'] * 100) / $product['old_price'], 1);?>%</span>
                        </div>
                    <?php endif; ?>
                </div><!--/.card-->
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
    <!--end related products-->
    <!--start recently viewed products-->
    <?php if($recentlyViewed):?>
    <div class="container-fluid">
        <h3 class="mt-3">Recently viewed products:</h3>
        <div class="row">
            <?php foreach($recentlyViewed as $product): ?>
            <div class="col-sm-6 col-md-3 col-lg-2 mb-3">
                <div class="card h-100">
                    <a href="product/<?=$product['alias'];?>" class="mask">
                        <img class="card-img-top" src="images/<?=$product['img'];?>" alt="" />
                    </a>
                    <div class="card-body">
                        <a class="card-link" href="product/<?=$product['alias'];?>"><?=$product['title'];?></a>
                    </div>
                    <div class="card-footer">
                        <?php if($product['old_price']): ?>
                            <small>
                                <del>
                                    <?=$curr['symbol_left'];?><?=$product['old_price'] * $curr['value'];?><?=$curr['symbol_right'];?>
                                </del>
                            </small>
                        <?php endif; ?>
                        <span class="item_price">
                            <?=$curr['symbol_left'];?><?=$product['price'] * $curr['value'];?><?=$curr['symbol_right'];?>
                        </span>
                    </div>
                    <?php if($product['old_price']): ?>
                        <div class="srch srch1">
                        <span>-<?= round(100 - ($product['price'] * 100) / $product['old_price'], 1);?>%</span>
                        </div>
                    <?php endif; ?>
                </div><!--/.card-->
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
    <!--end recently viewed products-->
</div>
