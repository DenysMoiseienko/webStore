<!-- content header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    Edit profile: <?=h($user->name);?>
                </h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>/user">Users list</a>
                    </li>
                    <li class="breadcrumb-item">
                        Edit profile: <?=h($user->name);?>
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

                    <form action="<?=ADMIN;?>/user/edit" method="post" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="login">Login</label>
                                <input type="text" class="form-control" name="login" id="login" value="<?=h($user->login);?>" required>
                                <span class="glyphicon-form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                            </div>

                            <div class="form-group has-feedback">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="<?=h($user->name);?>" required>
                                <span class="glyphicon-form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?=h($user->email);?>" required>
                                <span class="glyphicon-form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address" value="<?=h($user->address);?>" required>
                                <span class="glyphicon-form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="user" <?php  if ($user->role == 'user') echo 'selected'?>>User</option>
                                    <option value="admin" <?php  if ($user->role == 'admin') echo 'selected'?>>Admin</option>
                                </select>
                            </div>

                        </div>

                        <div class="box-footer text-right">
                            <input type="hidden" name="id" value="<?=$user->id;?>">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>