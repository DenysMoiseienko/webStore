<div class="container-fluid bg-container mb-3">
    <div class="row">
        <div class="col-12 col-md-8">
            <!--start-breadcrumbs-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <?=$breadcrumbs; ?>
                </ol>
            </nav>
            <!--end-breadcrumbs-->
        </div>
        <div class="col-12 col-md-4">
            <div class=" container-fluid d-flex justify-content-end align-items-center">
                <a class="btn btn-default toggle-filtres" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2"><i class="fa fa-filter"></i><span class="ml-3 mr-5">Filters</span></a>
                <div class="sort">
                        <label class="sort-label m-0" for="sort-select"><span class="ml-2">Sort by price:</span></label>
                        <?php $selected = !empty($_GET['sort']) ? $_GET['sort'] : 'desc'; ?>
                        <select class="custom-select" id="sort-select" name="sort">
                            <option data-desc="desc" <?php if($selected == 'desc') echo("selected");?>>desc</option>
                            <option data-asc="asc" <?php if($selected == 'asc') echo("selected"); ?>>asc</option>
                        </select>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid clearfix">    
        <?php if(!empty($products)): ?>
            <div id="filters" class="filters">
                <div class="filters-wrapper">
                    <button class="filters-close-btn btn"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                    <p class="filters-title">Filters</p>
                    <div class="filter_bar">
                        <?php new \app\widgets\filter\Filter(); ?>
                    </div>
                </div>
            </div>
            <div class="products-container">
                <div class="product-one row m-0">
                    <?php $curr = \store\App::$app->getProperty('currency') ; ?>
                    <?php foreach($products as $product): ?>
                        <div class="col-sm-6 col-md-3 col-lg-2 mb-3">
                            <div class="card h-100">
                                <a href="product/<?=$product->alias;?>" class="mask">
                                    <img class="card-img-top" src="images/<?=$product->img;?>" alt="" />
                                </a>
                                <div class="card-body">
                                    <a class="card-link" href="product/<?=$product->alias;?>"><?=$product->title;?> <?=$product->color;?></a>
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
    </div>

