<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    Images
                </h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        Images
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div>
            <div>
                <p>Quantity in /images/: <?=$quantityInDir; ?></p>
                <p>Quantity in database: <?=$quantityInDb; ?></p>
            </div>

            <a href="<?=ADMIN;?>/image/sync" class="btn btn-danger">Synchronize quantity</a>
        </div>
    </div>
</section>