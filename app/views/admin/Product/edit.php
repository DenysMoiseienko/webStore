<!-- content header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    Edit product: <?=$product->title;?> <?=$product->color;?>
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
                        Edit product: <?=$product->title;?> <?=$product->color;?>
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="<?=ADMIN;?>/product/edit" method="post" data-toggle="validator">

                        <div class="box-body">

                            <div class="card card-secondary collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Product info</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <div class="form-group has-feedback">
                                        <label for="title">Product title</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Product title"
                                               value="<?=h($product->title);?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <label for="title">Color</label>
                                        <input type="text" name="color" class="form-control" id="color" placeholder="Color"
                                               value="<?=h($product->color);?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="category_id">Parent category</label>
                                        <?php new \app\widgets\menu\Menu([
                                            'tpl' => WWW . '/menu/select.php',
                                            'container' => 'select',
                                            'cache' => 0,
                                            'cacheKey' => 'admin_select',
                                            'class' => 'form-control',
                                            'attrs' => [
                                                'name' => 'category_id',
                                                'id' => 'category_id'
                                            ]
                                        ]); ?>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" class="form-control" id="price" placeholder="Price" pattern="^[0-9.]{1,}$"
                                               value="<?=$product->price;?>"
                                               required data-error="Digits and decimal point allowed">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <label for="old_price">Old price</label>
                                        <input type="text" name="old_price" class="form-control" id="old_price" placeholder="Old price" pattern="^[0-9.]{1,}$"
                                               value="<?=$product->old_price;?>"
                                               data-error="Digits and decimal point allowed">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-secondary collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Status</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <div class="form-group">
                                        <label><input type="checkbox" name="status" <?=$product->status ? 'checked' : null;?>> Status</label>
                                    </div>

                                    <div class="form-group">
                                        <label><input type="checkbox" name="hit" <?=$product->hit ? 'checked' : null;?>> Hit</label>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-secondary collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Content</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <div class="form-group has-feedback">
                                        <textarea class="textarea" name="content" id="editor1" cols="80" rows="10"><?=$product->content;?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-secondary collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Filters</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <?php new \app\widgets\filter\Filter($filter, WWW . '/filter/admin_filter_tpl.php'); ?>
                                </div>
                            </div>

                            <div class="card card-secondary collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Related products</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <div class="form-group">
                                        <select name="related[]" class="form-control select2" id="related" multiple>
                                            <?php if (!empty($related_product)): ?>
                                                <?php foreach ($related_product as $item): ?>
                                                    <option value="<?=$item['related_id'];?>" selected>
                                                        <?=$item['title'];?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-secondary collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Upload images</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="card card-primary file-upload">
                                                <div class="card-header">
                                                    <h3 class="card-title">Base image</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div id="single" class="btn btn-success" data-url="product/add-image" data-name="single">Choose file</div>
                                                    <p><small>Recommended sizes: 700x1000 </small></p>
                                                    <div class="single">
                                                        <img src="images/<?=$product->img;?>" alt="" style="max-height: 150px;">
                                                    </div>
                                                </div>
                                                <div class="overlay">
                                                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="card card-primary file-upload">
                                                <div class="card-header">
                                                    <h3 class="card-title">Gallery images</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div id="multi" class="btn btn-success" data-url="product/add-image" data-name="multi">Choose files</div>
                                                    <p><small>Recommended sizes: 700x1000 </small></p>
                                                    <div class="multi">
                                                        <?php if (!empty($gallery)): ?>
                                                            <?php foreach ($gallery as $item): ?>
                                                                <img src="images/<?=$item;?>" alt=""
                                                                     style="max-height: 150px; cursor: pointer;"
                                                                     data-id="<?=$product->id;?>" data-src="<?=$item;?>" class="del-item">
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="overlay">
                                                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="box-footer text-right">
                            <input type="hidden" name="id" value="<?=$product->id;?>">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
