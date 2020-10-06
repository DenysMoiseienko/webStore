<!-- content header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    Clear cache
                </h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        Clear cache
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Category cache</td>
                                        <td>Category menu: 1 hour</td>
                                        <td>
                                            <a class="delete" href="<?=ADMIN;?>/cache/delete?key=category">
                                                <i class="fa fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Filter cache</td>
                                        <td>Filters and filter groups cache: 1 hour</td>
                                        <td>
                                            <a class="delete" href="<?=ADMIN;?>/cache/delete?key=filter">
                                                <i class="fa fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

