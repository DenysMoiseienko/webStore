<!--start-breadcrumbs-->
<div class="container-fluid p-0">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= PATH ?>">Home</a></li>
            <li class="breadcrumb-item">My account</li>
        </ol>
    </nav>
</div>
<!--end-breadcrumbs-->

<div class="container py-3">
    <div class="col-md-12">
        <h2>My account</h2>
        <hr>
        <div class="my-2">
            <span class="pt-2">You can update your information: </span><br>
            <a href="user/edit" class="btn custom-btn-secondary">Update my info</a>
        </div>
        <div class="my-2">
            <span class="pt-2">You can view your order history or find your order: </span><br>
            <a href="user/orders" class="btn custom-btn-secondary">Orders history</a>
        </div>
        <hr>
        <div class="my-4">
            <a href="user/logout" class="btn btn-danger">Logout</a>
        </div>
    </div>
</div>