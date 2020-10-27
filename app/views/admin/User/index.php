<!-- content header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    Users list
                </h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        Users list
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

                        <div class="container-fluid">
                            <div class="row">
                                <div class="text-left">
                                    <p>Showing <?=$start + 1;?> to <?=(($page * $perPage) > $count)? $count : ($page * $perPage);?> of <?=$count;?> products</p>
                                </div>
                                <div class="ml-auto">
                                    <?php if ($pagination->countPages > 1): ?>
                                        <?=$pagination;?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Login</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?=$user->id;?></td>
                                        <td><?=$user->login;?></td>
                                        <td><?=$user->name;?></td>
                                        <td><?=$user->email;?></td>
                                        <td><?=$user->role;?></td>
                                        <td><a href="<?=ADMIN;?>/user/view?id=<?=$user->id;?>">
                                                <i class="fa fa-fw fa-eye text-black-50"></i></a>
                                        </td>
                                        <td><a href="<?=ADMIN;?>/user/edit?id=<?=$user->id;?>">
                                                <i class="fa fa-pen text-black-50"></i></a>
                                        </td>
                                        <td>
                                            <a class="delete" href="<?=ADMIN;?>/user/delete?id=<?=$user->id;?>">
                                                <i class="fa fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="ml-auto">
                                    <?php if ($pagination->countPages > 1): ?>
                                        <?=$pagination;?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
