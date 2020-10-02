<!-- content header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    New product
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
                        New product
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
                    <form action="<?=ADMIN;?>/product/add" method="post" data-toggle="validator">

                        <div class="box-body">

                            <div class="form-group has-feedback">
                                <label for="title">Product title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Product title"
                                       value="<?php isset($_SESSION['form-data']['title']) ?
                                           h($_SESSION['form-data']['title']) : null ;?>" required>
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
                                    ],
                                    'prepend' => '<option>Choose a category</option>'
                                ]); ?>
                            </div>

                            <div class="form-group">
                                <label for="keywords">Key words</label>
                                <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Key words"
                                       value="<?php isset($_SESSION['form-data']['keywords']) ? h($_SESSION['form-data']['keywords']) : null ;?>">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Description"
                                       value="<?php isset($_SESSION['form-data']['description']) ? h($_SESSION['form-data']['description']) : null ;?>">
                            </div>

                            <div class="form-group has-feedback">
                                <label for="price">Price</label>
                                <input type="text" name="price" class="form-control" id="price" placeholder="Price" pattern="^[0-9.]{1,}$"
                                       value="<?php isset($_SESSION['form-data']['price']) ? h($_SESSION['form-data']['price']) : null ;?>"
                                       required data-error="Digits and decimal point allowed">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="old_price">Old price</label>
                                <input type="text" name="old_price" class="form-control" id="old_price" placeholder="Old price" pattern="^[0-9.]{1,}$"
                                       value="<?php isset($_SESSION['form-data']['old_price']) ? h($_SESSION['form-data']['old_price']) : null ;?>"
                                       data-error="Digits and decimal point allowed">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group has-feedback">

                                <label for="content">Content</label>
                                <textarea class="textarea" name="content" id="editor1" cols="80" rows="10"
                                          value="<?php isset($_SESSION['form-data']['content']) ? $_SESSION['form-data']['content'] : null ;?>"></textarea>
                            </div>

                            <div class="form-group">
                                <label><input type="checkbox" name="status" checked> Status</label>
                            </div>

                            <div class="form-group">
                                <label><input type="checkbox" name="hit"> Hit</label>
                            </div>

                            <div class="form-group">
                                <label for="related">Related products</label>
                                <select name="related[]" class="form-control select2" id="related" multiple></select>
                            </div>

                            <?php new \app\widgets\filter\Filter(null, WWW . '/filter/admin_filter_tpl.php'); ?>

                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="card card-primary file-upload">
                                        <div class="card-header">
                                            <h3 class="card-title">Upload image</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="single" class="btn btn-success" data-url="product/add-image" data-name="single">Choose file</div>
                                            <p><small>Recommended sizes: 125x200 </small></p>
                                            <div class="single"></div>
                                        </div>
                                        <div class="overlay">
                                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="card card-primary file-upload">
                                        <div class="card-header">
                                            <h3 class="card-title">Upload images</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="multi" class="btn btn-success" data-url="product/add-image" data-name="multi">Choose files</div>
                                            <p><small>Recommended sizes: 700x1000 </small></p>
                                            <div class="multi"></div>
                                        </div>
                                        <div class="overlay">
                                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>

                    </form>

                    <?php if (isset($_SESSION['form-data'])) unset($_SESSION['form-data']) ;?>

                </div>
            </div>
        </div>
    </div>
</section>