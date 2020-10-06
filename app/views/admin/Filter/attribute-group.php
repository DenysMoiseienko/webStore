<!-- content header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    Filter groups
                </h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        Filter groups
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

                            <a href="<?=ADMIN;?>/filter/group-add?" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Add group</a>

                            <table class="table table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($attrs_group as $item): ?>
                                    <tr>
                                        <td><?=$item->title; ?></td>

                                        <td>
                                            <a href="<?=ADMIN;?>/filter/group-edit?id=<?=$item->id;?>">
                                                <i class="fa fa-pen text-black-50"></i></a>
                                        </td>
                                        <td>
                                            <a class="delete" href="<?=ADMIN;?>/filter/group-delete?id=<?=$item->id;?>">
                                                <i class="fa fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


