<!-- content header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    New user
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
                        New user
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

                    <form action="user/signup" method="post" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="login">Login</label>
                                <input type="text" class="form-control" name="login" id="login"
                                       value="<?=isset($_SESSION['form-data']['login']) ? $_SESSION['form-data']['login'] : '' ;?>" required>

                            </div>

                            <div class="form-group has-feedback">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password"
                                       data-minLength="6" data-error="Minimum of 6 characters" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                       value="<?=isset($_SESSION['form-data']['name']) ? $_SESSION['form-data']['name'] : '' ;?>" required>

                            </div>

                            <div class="form-group has-feedback">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                       value="<?=isset($_SESSION['form-data']['email']) ? $_SESSION['form-data']['email'] : '' ;?>" required>

                            </div>

                            <div class="form-group has-feedback">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address"
                                       value="<?=isset($_SESSION['form-data']['address']) ? $_SESSION['form-data']['address'] : '' ;?>" required>

                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>

                        </div>

                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>

                    <?php if (isset($_SESSION['form-data'])) unset($_SESSION['form-data']); ?>

                </div>
            </div>
        </div>
    </div>
</section>
