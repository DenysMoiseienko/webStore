<!-- content header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    Category list
                </h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>">Home</a>
                    </li>
                    <li class="active">
                        Category list
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
                    <div class="box-body">

                        <?php new \app\widgets\menu\Menu([
                            'tpl' => WWW . '/menu/category_admin.php',
                            'container' => 'div',
                            'cache' => 0,
                            'cacheKey' => 'admin_categories',
                            'class' => 'list-group list-group-root well'

                        ]); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
