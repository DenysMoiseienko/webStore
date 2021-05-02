<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    Filter attributes
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>/filter/attribute-group">Filter groups</a>
                    </li>
                    <li class="breadcrumb-item">
                        Filter attributes
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

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
                                    <th>Group</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($attrs as $id => $item): ?>
                                    <tr>
                                        <td><?=$item['value']; ?></td>
                                        <td><?=$item['title']; ?></td>

                                        <td>
                                            <a href="<?=ADMIN;?>/filter/attribute-edit?id=<?=$id;?>">
                                                <i class="fa fa-pencil text-black-50"></i></a>
                                        </td>
                                        <td>
                                            <a class="delete" href="<?=ADMIN;?>/filter/attribute-delete?id=<?=$id;?>">
                                                <i class="fa fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <a href="<?=ADMIN;?>/filter/attribute-add?" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add attribute</a>
            </div>
        </div>
    </div>
</section>